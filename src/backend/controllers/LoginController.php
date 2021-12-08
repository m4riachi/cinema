<?php


namespace src\backend\controllers;


use src\Helper;
use src\models\Admin;

class LoginController
{
    public function index()
    {
        Helper::ViewRender('backend', 'login/auth', [
            'title' => 'Login',
        ]);
    }

    public function auth()
    {
        $msg = "";
        if (isset($_POST['username'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            if ($username != "" && $password != "") {
                try {
                    $admin = new Admin();
                    $row = $admin->getAdmin($username, md5($password));
                    if ($row !== false) {
                        /******************** Your code ***********************/
                        $_SESSION['sess_user_id'] = $row['id'];
                        $_SESSION['sess_user_name'] = $row['username'];

                        header('Location:' . Helper::base_url() . 'backend/film/list');
                        exit;
                    } else {
                        $msg = "Invalid username and password!";
                    }
                } catch (PDOException $e) {
                    echo "Error : " . $e->getMessage();
                }
            } else {
                $msg = "Both fields are required!";
            }
        }
    }
    public function logout()
    {
        unset($_SESSION['sess_user_id']);
        unset($_SESSION['sess_user_name']);
        header('Location:' . Helper::base_url() . 'backend/login/index');

    }

}