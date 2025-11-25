<?php

class Database
{
    private $host     = "127.0.0.1";
    private $db_name  = "inventaris_db";
    private $username = "root";
    private $password = "rootpassword";

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};port=3306;charset=utf8mb4";

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            die("❌ Koneksi database gagal: " . $this->error);
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // 3. Eksekusi Query
    public function execute()
    {
        return $this->stmt->execute();
    }

    // 4. Ambil Banyak Data (Array of Objects)
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // 5. Ambil Satu Data (Single Object)
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // 6. Hitung Baris
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
