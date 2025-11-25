<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../models/Category.php';

class CategoriesController
{
    private $model;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (! isset($_SESSION['user_id'])) {header("Location: /auth/login");exit;}
        $this->model = new CategoryModel();
    }

    public function index()
    {
        $data = $this->model->getAll();
        View::render("categories/index", ["title" => "Master Kategori", "categories" => $data]);
    }

    public function create()
    {
        View::render("categories/create", ["title" => "Tambah Kategori"]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model->create($_POST)) {
                header("Location: /category"); // Sesuaikan route di index.php jika pakai 'CategoryController' -> /category
            }
        }
    }

    public function edit($id)
    {
        $data = $this->model->getById($id);
        View::render("categories/edit", ["title" => "Edit Kategori", "category" => $data]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model->update($id, $_POST)) {
                header("Location: /category");
            }
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: /category");
    }
}
