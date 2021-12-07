<?php


namespace src\backend\controllers;


use src\Helper;
use src\models\Film;
use src\models\Horaire;
use src\models\Salle;

class HoraireController
{
    public function list() {
        $horaire = new Horaire();
        $horaires = $horaire->getAll();

        Helper::ViewRender('backend', 'horaires/list', [
            'title' => 'List des horaires',
            'horaires' => $horaires
        ]);
    }

    public function create(){
        $film = new Film();
        $films = $film->getAll();

        $salle= new Salle();
        $salles = $salle->getAll();
        Helper::ViewRender('backend', 'horaires/create', [
            'title' => 'Ajouter horaire',
            'films' => $films,
            'salles'=>$salles
        ]);
    }

    public function save(){
        if (isset($_POST['film_id'],$_POST['salle_id'])) {

            if ( !empty($_POST['film_id']) && !empty($_POST['salle_id']) && !empty($_POST['date']) && !empty($_POST['prix']) ) {
                $film = new Horaire();
                $affectedLines = $film->insert([$_POST['film_id'],$_POST['salle_id'],$_POST['date'],$_POST['prix']]);

                if ($affectedLines === false) {
                    $_SESSION['flash_status'] = 'Erreur';
                    header('Location: '. Helper::base_url().'backend/horaire/create');
                }
                else {
                    $_SESSION['flash_status'] = 'l\'ajout a été effectué avec succès';
                    header('Location: '. Helper::base_url().'backend/horaire/list');
                }
            }
            else {
                $_SESSION['flash_status'] = 'Tous les champs doivent être remplis';
                foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                header('Location: '. Helper::base_url().'backend/horaire/create');
            }
        }
        else {
            $_SESSION['flash_status'] = 'Aucun identifiant de film envoyé';
            foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
            header('Location: '. Helper::base_url().'backend/horaire/create');
        }

    }

    public function edit(){

        if (isset($_GET['id'])) {
            if (!empty($_GET['id'])) {
                $horaire = new Horaire();
                $horaire = $horaire->getById($_GET['id']);
                if(!empty($horaire)){
                    $film = new Film();
                    $films = $film->getAll();

                    $salle= new Salle();
                    $salles = $salle->getAll();

                    Helper::ViewRender('backend', 'horaires/edit', [
                        'title' => 'Modifier Horaire',
                        'films' => $films,
                        'salles' => $salles,
                        'horaire' => $horaire
                    ]);
                }else{
                    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);

                }
            }

        }
    }

    public function update(){
        if (isset($_POST['id'],$_POST['film_id'],$_POST['salle_id'],$_POST['date'],$_POST['prix'])) {
            if (!empty($_POST['id']) && !empty($_POST['film_id']) && !empty($_POST['salle_id']) && !empty($_POST['date']) && !empty($_POST['prix'])) {
                $horaire = new Horaire();
                $horaire->update($_POST['id'],$_POST['film_id'], $_POST['salle_id'],$_POST['date'],$_POST['prix']);
                $_SESSION['flash_status'] = 'Modification a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/horaire/list');
            }
        }
    }

    public function delete(){
        if(isset($_POST['id'])){
            if(!empty($_POST['id'])){
                $horaire = new Horaire();
                $horaire->delete($_POST['id']);
                $_SESSION['flash_status'] = 'Suppression a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/horaire/list');
            }
        }
    }
}