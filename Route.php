<?php

class Route{
    public static function execute()
    {
        $url_path = str_replace('?'.$_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
        $url_path = substr($url_path, 1, strlen($url_path));
        $url_path_ar = explode('/', $url_path);

        $module = 'front';
        if (count($url_path_ar) == 1) {
            $controller = ucfirst($url_path_ar[0]) . 'Controller';
            $action = 'index';
        }
        else if (count($url_path_ar) == 2) {
            $controller = ucfirst($url_path_ar[0]) . 'Controller';
            $action = $url_path_ar[1];
        }
        else {
            $module = $url_path_ar[0];
            $controller = ucfirst($url_path_ar[1]) . 'Controller';
            $action = $url_path_ar[2];
        }

        $class = "src\\$module\\controllers\\" . $controller;
        (new $class)->$action();
    }
}
