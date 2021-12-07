<?php


namespace src\backend\controllers;
use Exception;
use src\Helper;
use src\models\Admin;

class AdminController
{
    public function list() {

        $admin = new Admin();
        $admins = $admin->getAll();
        Helper::ViewRender('backend', 'admins/list', [
            'title' => 'List des admins',
            'admins'=>$admins
        ]);
    }

    public function create(){
        Helper::ViewRender('backend', 'admins/create', [
            'title' => 'Ajouter Admin',
        ]);
    }

    public function save(){
        if (isset($_POST['username']) && isset($_POST['password'])) {

            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $admin = new Admin();
                $affectedLines = $admin->insert($_POST['username'], $_POST['password']);
                print_r($admin);
                if ($affectedLines === false) {
                    $_SESSION['flash_status'] = 'Impossible d\'ajouter le admin !';
                    foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                    header('Location: '. Helper::base_url().'backend/admin/create');
                }
                else {
                    header('Location: '. Helper::base_url().'backend/admin/list');
                }
            }
            else {
                $_SESSION['flash_status'] = 'Tous les champs doivent être remplis';
                foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
                header('Location: '. Helper::base_url().'backend/admin/create');
            }
        }
        else {
            $_SESSION['flash_status'] = 'Aucun identifiant de admin envoyé';
            foreach ($_POST as $k => $v) $_SESSION[$k] = $v;
            header('Location: '. Helper::base_url().'backend/admin/create');
        }

    }

    public function edit(){
        if (isset($_GET['id'])) {

            if (!empty($_GET['id'])) {
                $admin = new Admin();
                $admin = $admin->getById($_GET['id']);
                Helper::ViewRender('backend', 'admins/edit', [
                    'title' => 'Modifier Genre',
                    'admin'=>$admin
                ]);
            }

        }
    }

    public function update(){

        if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password'])) {
            print_r(11);
            if (!empty($_POST['id']) && !empty($_POST['username']) && !empty($_POST['password'])) {

                $admin = new Admin();
                $admin->update($_POST['id'], $_POST['username'], $_POST['password']);
                $_SESSION['flash_status'] = 'Modification a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/admin/list');
            }

        }
    }

    public function delete(){
        if(isset($_POST['id'])){
            if(!empty($_POST['id'])){
                $admin = new Admin();
                $admin->delete($_POST['id']);
                $_SESSION['flash_status'] = 'Suppression a été effectué avec succès';
                header('Location: '. Helper::base_url().'backend/admin/list');
            }
        }
    }
}