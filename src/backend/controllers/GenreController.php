<?php


namespace src\backend\controllers;
use Exception;
use src\models\Genre;
use src\Helper;

class GenreController
{
    public function list() {
        $genre = new Genre();
        $genres = $genre->getAll();
        Helper::ViewRender('backend', 'genres/list', [
            'title' => 'List des genres',
            'genres'=>$genres
        ]);
    }

    public function create(){
        Helper::ViewRender('backend', 'genres/create', [
            'title' => 'Ajouter Genre',
        ]);
    }

    public function save(){
        if (isset($_POST['nom'])) {

            if (!empty($_POST['nom'])) {
                $genre = new Genre();
                $affectedLines = $genre->insert($_POST['nom']);
                if ($affectedLines === false) {
                    $_SESSION['flash_status'] = 'Impossible d\'ajouter le genre !';
                    foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                    header('Location: '. Helper::base_url().'backend/genre/create');
                }
                else {
                    $_SESSION['flash_status'] = 'l\'ajout a été effectué avec succès';
                    header('Location: '. Helper::base_url().'backend/genre/list');
                }
            }
            else {
                $_SESSION['flash_status'] = 'Tous les champs doivent être remplis';
                foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                header('Location: '. Helper::base_url().'backend/genre/create');
            }
        }
        else {
            $_SESSION['flash_status'] = 'Aucun identifiant de genre envoyé';
            foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
            header('Location: '. Helper::base_url().'backend/genre/create');
        }

    }

    public function edit(){
        if (isset($_GET['id'])) {

            if (!empty($_GET['id'])) {
                $genre = new Genre();
                $genre = $genre->getById($_GET['id']);
                Helper::ViewRender('backend', 'genres/edit', [
                    'title' => 'Modifier Genre',
                    'genre'=>$genre
                ]);
            }

            }
    }

    public function update(){

        if (isset($_POST['id']) && isset($_POST['nom'])) {
            if (!empty($_POST['id']) && !empty($_POST['nom'])) {
                $genre = new Genre();
                $genre->update($_POST['id'], $_POST['nom']);
                $_SESSION['flash_status'] = 'Modification a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/genre/list');
            }

        }
    }

    public function delete(){
        if(isset($_POST['id'])){
            if(!empty($_POST['id'])){
                $genre = new Genre();
                $genre->delete($_POST['id']);
                $_SESSION['flash_status'] = 'Suppression a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/genre/list');
            }
        }
    }
}