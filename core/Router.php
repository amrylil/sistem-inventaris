<?php

class Router {

    public function handle($url) {

        $url = trim($url, "/");
        $parts = explode("/", $url);

        $controller = !empty($parts[0]) ? ucfirst($parts[0]) . "Controller" : "HomeController";
        $method     = $parts[1] ?? "index";
        $param      = $parts[2] ?? null;

        $controllerFile = "../app/controllers/$controller.php";

        if (!file_exists($controllerFile)) {
            http_response_code(404);
            echo "Controller Not Found.";
            return;
        }

        require_once $controllerFile;
        $ctrl = new $controller;

        if (!method_exists($ctrl, $method)) {
            http_response_code(404);
            echo "Method Not Found.";
            return;
        }

        $param ? $ctrl->$method($param) : $ctrl->$method();
    }
}
