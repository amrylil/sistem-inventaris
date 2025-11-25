<?php
require_once __DIR__ . '/../config/Database.php';

class LoanModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    private function uuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    // --- READ ---
    public function getAll($userId = null, $role = 'admin')
    {
        $sql = "SELECT loans.*, users.nama_lengkap as peminjam
                FROM loans
                JOIN users ON loans.user_id = users.id";

        // Jika Role User, hanya tampilkan datanya sendiri
        if ($role == 'user' && $userId != null) {
            $sql .= " WHERE loans.user_id = :uid";
        }

        $sql .= " ORDER BY loans.created_at DESC";

        $this->db->query($sql);

        if ($role == 'user' && $userId != null) {
            $this->db->bind(':uid', $userId);
        }

        return $this->db->resultSet();
    }

    // Ambil Detail Peminjaman (Header + Items)
    public function getDetail($loanId)
    {
        // Ambil Header
        $this->db->query("SELECT loans.*, users.nama_lengkap FROM loans JOIN users ON loans.user_id = users.id WHERE loans.id = :id");
        $this->db->bind(':id', $loanId);
        $loan = $this->db->single();

        // Ambil Items
        $this->db->query("SELECT loan_items.*, items.nama_barang, items.kode_barang
                          FROM loan_items
                          JOIN items ON loan_items.item_id = items.id
                          WHERE loan_items.loan_id = :lid");
        $this->db->bind(':lid', $loanId);
        $items = $this->db->resultSet();

        return ['loan' => $loan, 'items' => $items];
    }

    // --- CREATE (PEMINJAMAN BARU) ---
    public function create($data)
    {
        // Mulai Transaksi Database (Penting!)
        // Note: Class Database Wrapper Anda perlu support beginTransaction().
        // Jika belum ada di wrapper, akses lewat $this->db->dbh->beginTransaction();
        // Asumsi kita akses properti public/getter atau tambahkan method di Database.php
        // Untuk native PDO sederhana, kita bisa query manual:

        try {
            $this->db->query("START TRANSACTION");
            $this->db->execute();

            $loanId = $this->uuid();

            // 1. Insert Header Loans
            $queryLoan = "INSERT INTO loans (id, user_id, tanggal_pinjam, status, catatan) VALUES (:id, :uid, :tgl, 'dipinjam', :cat)";
            $this->db->query($queryLoan);
            $this->db->bind(':id', $loanId);
            $this->db->bind(':uid', $data['user_id']);
            $this->db->bind(':tgl', $data['tanggal_pinjam']);
            $this->db->bind(':cat', $data['catatan']);
            $this->db->execute();

            // 2. Insert Items & Kurangi Stok
            foreach ($data['items'] as $item) {
                $itemId     = $item['item_id'];
                $qty        = $item['qty'];
                $loanItemId = $this->uuid();

                // Insert Detail
                $this->db->query("INSERT INTO loan_items (id, loan_id, item_id, qty, kondisi_pinjam) VALUES (:lid, :loanid, :itemid, :qty, :kondisi)");
                $this->db->bind(':lid', $loanItemId);
                $this->db->bind(':loanid', $loanId);
                $this->db->bind(':itemid', $itemId);
                $this->db->bind(':qty', $qty);
                $this->db->bind(':kondisi', 'Baik'); // Default
                $this->db->execute();

                // Update Stok Barang (Kurangi)
                $this->db->query("UPDATE items SET stok = stok - :qty WHERE id = :itemid");
                $this->db->bind(':qty', $qty);
                $this->db->bind(':itemid', $itemId);
                $this->db->execute();
            }

            // Commit Transaksi
            $this->db->query("COMMIT");
            $this->db->execute();
            return true;

        } catch (Exception $e) {
            // Rollback jika ada error
            $this->db->query("ROLLBACK");
            $this->db->execute();
            return false;
        }
    }

    // --- UPDATE (PENGEMBALIAN) ---
    public function kembalikan($loanId, $tglKembali)
    {
        try {
            $this->db->query("START TRANSACTION");
            $this->db->execute();

            // 1. Update Status Header
            $this->db->query("UPDATE loans SET status = 'dikembalikan', tanggal_kembali = :tgl WHERE id = :id");
            $this->db->bind(':tgl', $tglKembali);
            $this->db->bind(':id', $loanId);
            $this->db->execute();

            // 2. Ambil barang apa saja yg dipinjam
            $this->db->query("SELECT item_id, qty FROM loan_items WHERE loan_id = :lid");
            $this->db->bind(':lid', $loanId);
            $items = $this->db->resultSet();

            // 3. Kembalikan Stok
            foreach ($items as $item) {
                $this->db->query("UPDATE items SET stok = stok + :qty WHERE id = :itemid");
                $this->db->bind(':qty', $item->qty);
                $this->db->bind(':itemid', $item->item_id);
                $this->db->execute();
            }

            $this->db->query("COMMIT");
            $this->db->execute();
            return true;

        } catch (Exception $e) {
            $this->db->query("ROLLBACK");
            $this->db->execute();
            return false;
        }
    }

    // Helper untuk Form Select
    public function getUsers()
    {
        $this->db->query("SELECT * FROM users ORDER BY nama_lengkap ASC");
        return $this->db->resultSet();
    }
    public function getAvailableItems()
    {
        $this->db->query("SELECT * FROM items WHERE stok > 0 ORDER BY nama_barang ASC");
        return $this->db->resultSet();
    }
}
