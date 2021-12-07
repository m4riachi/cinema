<?php

namespace src\backend\controllers;
use Exception;
use src\models\Film;
use src\models\Genre;
use src\Helper;

class filmController{

    public function list() {
        $film = new Film();
        $film->getAllByGenre();
        $films = $film->getAllByGenre();
        Helper::ViewRender('backend', 'films/list', [
            'title' => 'List des films',
            'films' => $films
        ]);
    }

    public function create(){
        $genre = new Genre();
        $genres = $genre->getAll();
        Helper::ViewRender('backend', 'films/create', [
            'title' => 'Ajouter Film',
            'genres' => $genres
        ]);
    }

    public function save(){
        if (isset($_POST['genres'])) {

            if (!empty($_POST['genres']) && !empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['annee']) ) {
                $film = new Film();
                $affectedLines = $film->insert($_POST['genres'],$_POST['titre'],$_POST['description'],$_POST['annee'],$_POST['bande_annonce_url']);

                if ($affectedLines === false) {
                    $_SESSION['flash_status'] = 'Erreur';
                    header('Location: '. Helper::base_url().'backend/film/create');
                }
                else {
                    $_SESSION['flash_status'] = 'l\'ajout a été effectué avec succès';
                    header('Location: '. Helper::base_url().'backend/film/list');
                }
            }
            else {
                $_SESSION['flash_status'] = 'Tous les champs doivent être remplis';
                foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                header('Location: '. Helper::base_url().'backend/film/create');
            }
        }
        else {
            $_SESSION['flash_status'] = 'Aucun identifiant de film envoyé';
            foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
            header('Location: '. Helper::base_url().'backend/film/create');
        }

    }

    public function edit(){

        if (isset($_GET['id'])) {
            if (!empty($_GET['id'])) {
                $genre = new Genre();
                $genres = $genre->getAll();
                $film = new Film();
                $film_ar = $film->getById($_GET['id']);

                Helper::ViewRender('backend', 'films/edit', [
                    'title' => 'Modifier Film',
                    'film' => $film_ar[$_GET['id']],
                    'genres' => $genres
                ]);
            }

        }
    }

    public function update(){

        if ( isset($_POST['id'],$_POST['genres'],$_POST['titre'],$_POST['description'],$_POST['annee'],$_POST['bande_annonce_url']) )
        {
            if (!empty($_POST['id']) && !empty($_POST['genres']) && !empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['annee']) && !empty($_POST['bande_annonce_url']) ) {

                $film = new Film();
                $film->update($_POST['id'],$_POST['genres'], $_POST['titre'],$_POST['description'],$_POST['annee'],$_POST['bande_annonce_url']);
                $_SESSION['flash_status'] = 'Modification a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/film/list');
            }else{
                $_SESSION['flash_status'] = 'Tous les champs doivent être remplis';
                foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                header('Location: '. Helper::base_url().'backend/film/edit/?id='.$_POST['id']);
            }
        }
        else{
            $_SESSION['flash_status'] = 'Tous les champs doivent être remplis';
            foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
            header('Location: '. Helper::base_url().'backend/film/edit/?id='.$_POST['id']);
        }
    }

    public function delete(){
        if(isset($_POST['id'])){
            if(!empty($_POST['id'])){
                $film = new Film();
                $film->delete($_POST['id']);
                $_SESSION['flash_status'] = 'Suppression a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/film/list');
            }
        }
    }


}
