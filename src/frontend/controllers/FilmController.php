<?php


namespace src\frontend\controllers;


use src\Helper;
use src\models\Film;
use src\models\Genre;

class FilmController
{
    public function details(){
        if (isset($_GET['id'])) {
            if (!empty($_GET['id'])) {
                $film = new Film();
                $films = $film->getFilmDetailsById($_GET['id']);

                Helper::ViewRender('frontend', 'details', [
                    'title' => 'Galerie',
                    'film'=>$films[$_GET['id']],
                ]);
            }
        }

    }
}