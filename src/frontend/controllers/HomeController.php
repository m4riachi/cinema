<?php

namespace src\frontend\controllers;

use src\Helper;
use src\models\Film;
use src\models\Genre;
use src\models\Newsletter;

class HomeController
{
    public function index() {
        $film = new Film();
        $date = date("Y-m-d");
        $date_8 = date("Y-m-d h:i:sa",strtotime($date.' + 8 days'));
        $films = $film->getAllBetweenDates($date ,$date_8);
        $films_search = $film->getAllBySearch();
        $films_soon = $film->getAllsoon();
        $genre = new Genre();
        $genres = $genre->getAll();
        Helper::ViewRender('frontend', 'home', [
            'title' => 'ACCUEIL',
            'films'=>$films,
            'films_search'=>$films_search,
            'films_soon'=> $films_soon,
            'genres'=>$genres,
        ]);
    }
    public function newsletter(){
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $newsletter = new Newsletter();
            $newsletter->insert($_POST['email']);
        }

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

        header('Location: '. Helper::base_url().'frontend/home/index');
    }
}
