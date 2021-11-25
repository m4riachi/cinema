<?php

use src\Helper;

class Route{
    public static function execute()
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link = str_replace(Helper::base_url(), '', $actual_link);
        $url_path = str_replace('?'.$_SERVER['QUERY_STRING'], '', $actual_link);
        
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
