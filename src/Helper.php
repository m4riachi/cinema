<?php
namespace src;

class Helper
{
    public static function ViewRender($module, $view, $param) {
       // print_r($module);exit;
        foreach ($param as $key => $value) {
            $$key = $value;
        }

        $view = "src/$module/views/$view.php";

   // print_r(1);exit;
    ob_start();
        if($view == 'src/backend/views/login/auth.php'){
            require_once "src/$module/views/login/auth.php";
        }else{
            require_once "src/$module/views/layouts/template.php";
        }
    $page = ob_get_contents();
    ob_end_clean();



        echo $page;
    }

    public static function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }

    public static function showSession($index) {
        if (!isset($_SESSION[$index])) return null;

        $msg = $_SESSION[$index];
        unset($_SESSION[$index]);
        return $msg;
    }
}
