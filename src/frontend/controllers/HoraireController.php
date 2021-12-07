<?php


namespace src\frontend\controllers;


use src\Helper;
use src\models\Film;
use src\models\Genre;

class HoraireController
{
    public function index() {
        $film = new Film();
        $films = $film->getAllBySearch();
        $genre = new Genre();
        $genres = $genre->getAll();
        Helper::ViewRender('frontend', 'horaire', [
            'title' => 'Horaires',
            'films'=>$films,
            'films'=>$films,
            'genres'=>$genres,
        ]);
    }
    public function search()
    {
        unset($_SESSION['date']);unset($_SESSION['genre']);unset($_SESSION['keyword']);
        if (isset($_POST['genre']) && !empty($_POST['genre']))
            $_SESSION['genre'] = $_POST['genre'];
        if (isset($_POST['date']) && !empty($_POST['date']))
            $_SESSION['date'] = $_POST['date'];
        if (isset($_POST['keyword']) && !empty($_POST['keyword']))
            $_SESSION['keyword'] = $_POST['keyword'];

        header('Location: '. Helper::base_url().'frontend/horaire/index');
    }
}