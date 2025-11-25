<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../models/Supplier.php';

class SupplierController
{
    private $model;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (! isset($_SESSION['user_id'])) {header("Location: /auth/login");exit;}
        $this->model = new SupplierModel();
    }

    public function index()
    {
        $data = $this->model->getAll();
        View::render("suppliers/index", ["title" => "Data Supplier", "suppliers" => $data]);
    }

    public function create()
    {
        View::render("suppliers/create", ["title" => "Tambah Supplier"]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model->create($_POST)) {
                header("Location: /supplier");
            }
        }
    }

    public function edit($id)
    {
        $data = $this->model->getById($id);
        View::render("suppliers/edit", ["title" => "Edit Supplier", "supplier" => $data]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model->update($id, $_POST)) {
                header("Location: /supplier");
            }
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: /supplier");
    }
}
