<?php
require_once "../core/View.php";

class HomeController {
    public function index() {
        View::render("home", ["title" => "Beranda"]);
    }
}
