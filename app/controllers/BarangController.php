<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../models/Barang.php';

class BarangController
{
    private $model;

    public function __construct()
    {
        // 1. Inisialisasi Model WAJIB di baris pertama
        $this->model = new BarangModel();

        // 2. Cek Session Login
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (! isset($_SESSION['user_id'])) {
            header("Location: /auth/login");
            exit;
        }
    }

    public function index()
    {
        $barang = $this->model->getAll();
        $stats  = $this->model->getStats();

        View::render("barang/index", [
            "title"  => "Manajemen Barang",
            "barang" => $barang,
            "stats"  => $stats,
        ]);
    }

    // --- CREATE ---
    public function create()
    {
        $kategori  = $this->model->getKategori();
        $suppliers = $this->model->getSuppliers();

        View::render("barang/create", [
            "title"     => "Tambah Barang",
            "kategori"  => $kategori,
            "suppliers" => $suppliers,
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'kode_barang' => $_POST['kode_barang'],
                'nama_barang' => $_POST['nama_barang'],
                'kategori_id' => $_POST['kategori_id'],
                'supplier_id' => $_POST['supplier_id'],
                'stok'        => $_POST['stok'],
                'kondisi'     => $_POST['kondisi'],
                // Hapus 'harga'
            ];

            if ($this->model->create($data)) {
                header("Location: /barang");
                exit;
            }
        }
    }

    // --- EDIT ---
    public function edit($id)
    {
        $item      = $this->model->getById($id);
        $kategori  = $this->model->getKategori();
        $suppliers = $this->model->getSuppliers();

        if (! $item) {echo "Data tidak ditemukan";exit;}

        View::render("barang/edit", [
            "title"     => "Edit Barang",
            "item"      => $item,
            "kategori"  => $kategori,
            "suppliers" => $suppliers,
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama_barang' => $_POST['nama_barang'],
                'kategori_id' => $_POST['kategori_id'],
                'supplier_id' => $_POST['supplier_id'],
                'stok'        => $_POST['stok'],
                'kondisi'     => $_POST['kondisi'],
                // Hapus 'harga'
            ];

            if ($this->model->update($id, $data)) {
                header("Location: /barang");
                exit;
            }
        }
    }

    // --- DELETE ---
    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: /barang");
        exit;
    }
}
