<?php


namespace src\frontend\controllers;


use src\Helper;

class ContactController
{

    public function index()
    {
        Helper::ViewRender('frontend', 'contact', [
            'title' => 'Contactez nous',
        ]);
    }

    public function send(Request $request)
    {


    }
}