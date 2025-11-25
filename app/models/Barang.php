<?php
require_once __DIR__ . '/../config/Database.php';

class BarangModel
{
    private $db;
    private $table = 'items';

    public function __construct()
    {
        $this->db = new Database();
    }

    // Helper UUID Generator
    private function uuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    // --- READ ---
    public function getAll()
    {
        $query = "SELECT items.*, categories.nama_kategori
                  FROM " . $this->table . "
                  LEFT JOIN categories ON items.kategori_id = categories.id
                  ORDER BY items.created_at DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getStats()
    {
        // Hapus perhitungan 'harga' karena kolom tidak ada
        $this->db->query("SELECT COUNT(*) as total FROM " . $this->table);
        $totalItem = $this->db->single()->total;

        $this->db->query("SELECT COUNT(*) as total FROM " . $this->table . " WHERE stok < 5");
        $stokKritis = $this->db->single()->total;

        return [
            'total_item'  => $totalItem ?? 0,
            'stok_kritis' => $stokKritis ?? 0,
        ];
    }

    // Helper Dropdown
    public function getKategori()
    {
        $this->db->query("SELECT * FROM categories ORDER BY nama_kategori ASC");
        return $this->db->resultSet();
    }

    public function getSuppliers()
    {
        $this->db->query("SELECT * FROM suppliers ORDER BY nama_supplier ASC");
        return $this->db->resultSet();
    }

    // --- CREATE ---
    public function create($data)
    {
        $id = $this->uuid();
        // Hapus kolom harga dari query
        $query = "INSERT INTO " . $this->table . "
                  (id, kode_barang, nama_barang, kategori_id, supplier_id, stok, kondisi, status)
                  VALUES (:id, :kode, :nama, :kategori, :supplier, :stok, :kondisi, 1)";

        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':kode', $data['kode_barang']);
        $this->db->bind(':nama', $data['nama_barang']);
        $this->db->bind(':kategori', $data['kategori_id']);
        $this->db->bind(':supplier', $data['supplier_id']);
        $this->db->bind(':stok', $data['stok']);
        $this->db->bind(':kondisi', $data['kondisi']);

        return $this->db->execute();
    }

    // --- UPDATE ---
    public function update($id, $data)
    {
        // Hapus kolom harga dari query
        $query = "UPDATE " . $this->table . " SET
                  nama_barang = :nama,
                  kategori_id = :kategori,
                  supplier_id = :supplier,
                  stok = :stok,
                  kondisi = :kondisi
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':nama', $data['nama_barang']);
        $this->db->bind(':kategori', $data['kategori_id']);
        $this->db->bind(':supplier', $data['supplier_id']);
        $this->db->bind(':stok', $data['stok']);
        $this->db->bind(':kondisi', $data['kondisi']);

        return $this->db->execute();
    }

    // --- DELETE ---
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
