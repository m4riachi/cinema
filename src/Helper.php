<?php
namespace src;

class Helper
{
    public static function ViewRender($module, $view, $param) {
        foreach ($param as $key => $value) {
            $$key = $value;
        }

        $view = "src/$module/views/$view.php";

        ob_start();
            require_once "src/layouts/$module.php";
        $page = ob_get_contents();
        ob_end_clean();

        echo $page;
    }
}
