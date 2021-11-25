<?php

namespace src\front\controllers;

use src\Helper;

class HomeController
{
    public function index() {
        Helper::ViewRender('front', 'index', [
            'title' => 'Hello World'
        ]);
    }
}
