<?php

namespace src\front\controllers;

use src\Helper;

class FicheController
{
    public function list() {
        Helper::ViewRender('front', 'fiche/list', [
            'title' => 'Hello World'
        ]);
    }
}
