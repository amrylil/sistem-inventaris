<?php
require_once __DIR__ . '/../config/Database.php';

class CategoryModel
{
    private $db;
    private $table = 'categories';

    public function __construct()
    {
        $this->db = new Database();
    }

    // Generate ID Unik: CAT-1234
    private function generateId()
    {
        return 'CAT-' . mt_rand(1000, 9999);
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $id    = $this->generateId();
        $query = "INSERT INTO " . $this->table . " (id, nama_kategori, deskripsi, lokasi_rak, status)
                  VALUES (:id, :nama, :desk, :rak, 1)";

        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':nama', $data['nama_kategori']);
        $this->db->bind(':desk', $data['deskripsi']);
        $this->db->bind(':rak', $data['lokasi_rak']);

        return $this->db->execute();
    }

    public function update($id, $data)
    {
        $query = "UPDATE " . $this->table . " SET
                  nama_kategori = :nama, deskripsi = :desk, lokasi_rak = :rak
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':nama', $data['nama_kategori']);
        $this->db->bind(':desk', $data['deskripsi']);
        $this->db->bind(':rak', $data['lokasi_rak']);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
