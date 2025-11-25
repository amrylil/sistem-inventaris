<?php
require_once "../core/View.php";
require_once "../app/models/Users.php";

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: /");
            exit;
        }

        View::render("auth/login", ["title" => "Login"], 'auth');
    }

    public function register()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: /");
            exit;
        }
        View::render("auth/register", ["title" => "Daftar Akun"], 'auth');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama'             => htmlspecialchars($_POST['nama']),
                'username'         => htmlspecialchars($_POST['username']),
                'password'         => $_POST['password'],
                'confirm_password' => $_POST['confirm_password'],
            ];

            if ($data['password'] !== $data['confirm_password']) {
                header("Location: /auth/register?error=password_mismatch");
                exit;
            }

            if ($this->userModel->getUserByUsername($data['username'])) {
                header("Location: /auth/register?error=username_taken");
                exit;
            }

            if ($this->userModel->register($data)) {
                header("Location: /auth/login?success=registered");
            } else {
                header("Location: /auth/register?error=failed");
            }
        }
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = $_POST['password'];

            $user = $this->userModel->getUserByUsername($username);

            if ($user) {
                $dbPassword = is_object($user) ? $user->password : $user['password'];
                $dbId       = is_object($user) ? $user->id : $user['id'];
                $dbName     = is_object($user) ? $user->nama_lengkap : $user['nama_lengkap'];
                $dbRole     = is_object($user) ? $user->role : $user['role'];

                if (password_verify($password, $dbPassword)) {
                    // Set Session
                    $_SESSION['user_id']   = $dbId;
                    $_SESSION['user_name'] = $dbName;
                    $_SESSION['user_role'] = $dbRole;

                    header("Location: /");
                    exit;
                }
            }

            header("Location: /auth/login?error=invalid_credentials");
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /auth/login");
        exit;
    }
}
