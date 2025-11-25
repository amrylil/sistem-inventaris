<?php
require_once __DIR__ . '/../config/Database.php';

class SupplierModel
{
    private $db;
    private $table = 'suppliers';

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
        $id    = $this->uuid();
        $query = "INSERT INTO " . $this->table . " (id, nama_supplier, kontak_person, telepon, alamat, status)
                  VALUES (:id, :nama, :kontak, :telp, :alamat, 1)";

        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':nama', $data['nama_supplier']);
        $this->db->bind(':kontak', $data['kontak_person']);
        $this->db->bind(':telp', $data['telepon']);
        $this->db->bind(':alamat', $data['alamat']);

        return $this->db->execute();
    }

    public function update($id, $data)
    {
        $query = "UPDATE " . $this->table . " SET
                  nama_supplier = :nama, kontak_person = :kontak, telepon = :telp, alamat = :alamat
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':nama', $data['nama_supplier']);
        $this->db->bind(':kontak', $data['kontak_person']);
        $this->db->bind(':telp', $data['telepon']);
        $this->db->bind(':alamat', $data['alamat']);

        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
