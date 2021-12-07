<?php


namespace src\backend\controllers;


use src\Helper;
use src\models\Salle;

class SalleController
{
    public function list() {
        $salle = new Salle();
        $salles = $salle->getAll();
        Helper::ViewRender('backend', 'salles/list', [
            'title' => 'List des salles',
            'salles'=>$salles
        ]);
    }

    public function create(){
        Helper::ViewRender('backend', 'salles/create', [
            'title' => 'Ajouter salle',
        ]);
    }

    public function save(){
        if (isset($_POST['nom'],$_POST['adresse'])) {

            if (!empty($_POST['nom'])) {
                $salle = new Salle();
                $affectedLines = $salle->insert($_POST['nom'],$_POST['adresse']);
                if ($affectedLines === false) {
                    $_SESSION['flash_status'] = 'Impossible d\'ajouter le salle !';
                    foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                    header('Location: '. Helper::base_url().'backend/salle/create');
                }
                else {
                    $_SESSION['flash_status'] = 'l\'ajout a été effectué avec succès';
                    header('Location: '. Helper::base_url().'backend/salle/list');
                }
            }
            else {
                $_SESSION['flash_status'] = 'Tous les champs doivent être remplis';
                foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                header('Location: '. Helper::base_url().'backend/salle/create');
            }
        }
        else {
            $_SESSION['flash_status'] = 'Aucun identifiant de salle envoyé';
            foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
            header('Location: '. Helper::base_url().'backend/salle/create');
        }

    }

    public function edit(){
        if (isset($_GET['id'])) {

            if (!empty($_GET['id'])) {
                $salle = new Salle();
                $salle = $salle->getById($_GET['id']);
                Helper::ViewRender('backend', 'salles/edit', [
                    'title' => 'Modifier Genre',
                    'salle'=>$salle
                ]);
            }

        }
    }

    public function update(){

        if (isset($_POST['id'],$_POST['nom'],$_POST['adresse'])) {
            if (!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['adresse'])) {
                $salle = new Salle();
                $salle->update($_POST['id'], $_POST['nom'], $_POST['adresse']);
                $_SESSION['flash_status'] = 'Modification a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/salle/list');
            }

        }
    }

    public function delete(){
        if(isset($_POST['id'])){
            if(!empty($_POST['id'])){
                $salle = new Salle();
                $salle->delete($_POST['id']);
                $_SESSION['flash_status'] = 'Suppression a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/salle/list');
            }
        }
    }
}