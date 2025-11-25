<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../models/Loan.php';
require_once __DIR__ . '/../models/Barang.php';

class LoanController
{
    private $model;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (! isset($_SESSION['user_id'])) {
            header("Location: /auth/login");
            exit;
        }

        $this->model = new LoanModel();
    }

    public function index()
    {
        $userId = $_SESSION['user_id'];
        $role   = $_SESSION['user_role'];

        $loans = $this->model->getAll($userId, $role);

        View::render("loans/index", [
            "title" => "Riwayat Peminjaman",
            "loans" => $loans,
            "role"  => $role,
        ]);
    }

    // Detail Peminjaman (Struk)
    public function show($id)
    {
        $data = $this->model->getDetail($id);
        View::render("loans/detail", [
            "title" => "Detail Peminjaman",
            "loan"  => $data['loan'],
            "items" => $data['items'],
        ]);
    }

    public function create()
    {
        if ($_SESSION['user_role'] !== 'admin') {header("Location: /loan");exit;}

        $users = $this->model->getUsers();
        $items = $this->model->getAvailableItems();

        View::render("loans/create", [
            "title" => "Input Peminjaman",
            "users" => $users,
            "items" => $items,
        ]);
    }

    public function store()
    {
        if ($_SESSION['user_role'] !== 'admin') {exit;}

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $items   = [];
            $itemIds = $_POST['item_id'];
            $qtys    = $_POST['qty'];

            for ($i = 0; $i < count($itemIds); $i++) {
                if (! empty($itemIds[$i]) && $qtys[$i] > 0) {
                    $items[] = [
                        'item_id' => $itemIds[$i],
                        'qty'     => $qtys[$i],
                    ];
                }
            }

            $data = [
                'user_id'        => $_POST['user_id'],
                'tanggal_pinjam' => $_POST['tanggal_pinjam'],
                'catatan'        => $_POST['catatan'],
                'items'          => $items,
            ];

            if ($this->model->create($data)) {
                header("Location: /loan");
            } else {
                echo "Gagal membuat transaksi.";
            }
        }
    }

    public function request($itemId)
    {
        // Ambil detail barang
        $barangModel = new BarangModel();
        $item        = $barangModel->getById($itemId);

        if (! $item) {echo "Barang tidak ditemukan";exit;}

        // Tampilkan Form Konfirmasi
        View::render("loans/request", [
            "title" => "Konfirmasi Peminjaman",
            "item"  => $item,
        ]);
    }

    public function storeRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // 1. Validasi Stok
            $barangModel = new BarangModel();
            $item        = $barangModel->getById($_POST['item_id']);

            if (! $item || $item->stok < $_POST['qty']) {
                echo "<script>alert('Gagal: Stok tidak mencukupi!'); window.history.back();</script>";
                return;
            }

            // 2. Susun Data
            // User ID otomatis ambil dari sesi login (Aman)
            $data = [
                'user_id'        => $_SESSION['user_id'],
                'tanggal_pinjam' => $_POST['tanggal_pinjam'],
                'catatan'        => $_POST['catatan'],
                'items'          => [
                    [
                        'item_id' => $_POST['item_id'],
                        'qty'     => $_POST['qty'],
                    ],
                ],
            ];

            // 3. Simpan
            if ($this->model->create($data)) {
                header("Location: /loan"); // Redirect ke History Peminjaman
                exit;
            } else {
                echo "Gagal memproses peminjaman.";
            }
        }
    }

    public function return ($id)
    {
        if ($_SESSION['user_role'] !== 'admin') {exit;}

        $tglKembali = date('Y-m-d');
        if ($this->model->kembalikan($id, $tglKembali)) {
            header("Location: /loan");
        }
    }
}
