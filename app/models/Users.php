<?php
require_once "../app/config/Database.php";

class UserModel
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        // Asumsi class Database Anda mengembalikan koneksi PDO
        $this->db = new Database();
    }

    // Helper untuk generate UUID v4
    private function uuid()
    {
        $data    = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    // Fungsi Register
    public function register($data)
    {
        $id           = $this->uuid();
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO " . $this->table . "
                  (id, nama_lengkap, username, password, role, status)
                  VALUES (:id, :nama, :username, :password, 'user', 1)";

        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $passwordHash);

        return $this->db->execute();
    }

    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        return $this->db->single();
    }
}
