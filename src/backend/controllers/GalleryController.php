<?php


namespace src\backend\controllers;


use src\Helper;
use src\models\Film;
use src\models\Gallery;

class GalleryController
{

    public function list() {
        $gallery = new Gallery();
        $photos = $gallery->getAll();
        Helper::ViewRender('backend', 'gallery/list', [
            'title' => 'List des gallerys',
            'gallery' => $photos
        ]);
    }

    public function create(){
        if(isset($_GET['id'])){
            $film_id = $_GET['id'];
            $gallery = new Gallery();

            $photos = $gallery->getByFilmId($film_id);
            Helper::ViewRender('backend', 'gallery/create', [
                'title' => 'Ajouter Gallery',
                'film_id' => $film_id,
                'photos' => $photos
            ]);
        }

    }

    public function save(){
        if (isset($_POST['film_id'])) {
            if (!empty($_POST['film_id'])) {
                $gallery = new Gallery();
                $affectedLines = $gallery->insert($_POST['film_id'],$_FILES);


                if ($affectedLines === true) {
                    $_SESSION['flash_status'] = 'l\'ajout a été effectué avec succès';
                    header('Location: '. Helper::base_url().'backend/film/list');
                }

            }
            else {
                $_SESSION['flash_status'] = 'Tous les champs doivent être remplis';
                foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                header('Location: '. Helper::base_url().'backend/gallery/create');
            }
        }
        else {
            $_SESSION['flash_status'] = 'Aucun identifiant de gallery envoyé';
            foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
            header('Location: '. Helper::base_url().'backend/gallery/create');
        }

    }

    public function edit(){

        if (isset($_GET['id']) && !empty($_GET['id'])) {
                $film = new Film();
                $films = $film->getAll();
                $gallery = new Film();
                $gallery = $gallery->getById($_GET['id']);
                Helper::ViewRender('backend', 'films/edit', [
                    'title' => 'Modifier Gallery',
                    'gallery' => $gallery,
                    'films' => $films
                ]);
        }
    }

    public function update(){
        if (isset($_POST['id'],$_POST['film_id'],$_POST['photo'])) {
            if (!empty($_POST['id']) && !empty($_POST['film_id']) && !empty($_POST['photo'])) {
                $film = new Gallery();
                $film->update($_POST['id'],$_POST['film_id'], $_POST['photo']);
                $_SESSION['flash_status'] = 'Modification a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/gallery/list');
            }
        }
    }

    public function delete(){
        if(isset($_POST['id'],$_POST['f_id'])){
            if(!empty($_POST['id'])){

                $film = new Gallery();
                $film->delete($_POST['id']);
                $_SESSION['flash_status_1'] = 'Suppression a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/gallery/create/?id='.$_POST['f_id']);
            }
        }
    }


}