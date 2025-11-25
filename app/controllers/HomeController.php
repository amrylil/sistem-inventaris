<?php
require_once "../core/View.php";

class HomeController
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        View::render("home", ["title" => "Beranda"]);
    }
}
