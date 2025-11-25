<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../core/Router.php";

// 1. Ambil URL langsung dari Server Request, bukan $_GET
// parse_url() digunakan agar query string (?id=1) tidak ikut terbaca sebagai nama controller
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// 2. Masukkan ke variabel $url
$url = $path;

$router = new Router();
$router->handle($url);
