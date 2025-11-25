<?php
require_once "../app/config/Database.php";

$db = new Database();
$conn = $db->connect();

if ($conn) {
    echo "Koneksi berhasil!";
}