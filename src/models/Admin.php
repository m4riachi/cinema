<?php


namespace src\models;


class Admin
{
    private $db;

    public function __construct()
    {
        $instance = ConnectDb::getInstance();
        $this->db = $instance->getConnection();
    }

    public function getAll()
    {
        return $this->db->query('SELECT id, username, password FROM admins ORDER BY id DESC');
    }

    public function getById($id){
        $req = $this->db->prepare('SELECT id, username, password FROM admins WHERE id = (?)');
        $req->execute([$id]);
        return  $req->fetch();
    }
    public function getAdmin($username,$password){
        $req = $this->db->prepare('SELECT id, username, password FROM admins WHERE username = (?) AND password = (?)');
        $req->execute([$username,$password]);
        return  $req->fetch();
    }
    public function insert($username, $password){
        $admins = $this->db->prepare('INSERT INTO admins (username, password) VALUES (?,?)');
        return $admins->execute([$username, $password]);
    }

    public function update($id, $username, $password){
        $genres = $this->db->prepare('UPDATE admins SET  username = (?),password = (?) WHERE id = (?)');
        return $genres->execute([$username, $password,$id]);
    }

    public function delete($id){
        $film = $this->db->prepare('DELETE FROM admins WHERE id = (?)');
        return $film->execute([$id]);
    }
}