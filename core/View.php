<?php

class View {

    public static function render($view, $data = [], $layout = "main") {
        extract($data);

        ob_start();
        require "../app/views/pages/$view.php";
        $content = ob_get_clean();

        require "../app/views/layouts/$layout.php";
    }

    public static function component($name, $props = []) {
        extract($props);
        require "../app/views/components/$name.php";
    }
}
