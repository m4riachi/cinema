<?php


namespace src\models;

class Genre
{
    private $db;

    public function __construct()
    {
        $instance = ConnectDb::getInstance();
        $this->db = $instance->getConnection();
    }

    public function getAll()
    {
        return $this->db->query('SELECT id,nom FROM genres ORDER BY id DESC');
    }

    public function getById($id){
        $req = $this->db->prepare('SELECT id,nom FROM genres WHERE id = (?)');
        $req->execute([$id]);
        return  $req->fetch();
    }

    public function insert($nom){
        $genres = $this->db->prepare('INSERT INTO genres (nom) VALUES (?)');
        return $genres->execute([$nom]);
    }

    public function update($id, $nom){
        $genres = $this->db->prepare('UPDATE genres SET  nom = (?) WHERE id = (?)');
        return $genres->execute([$nom,$id]);
    }

    public function delete($id){
        $film = $this->db->prepare('DELETE FROM genres WHERE id = (?)');
        return $film->execute([$id]);
    }
}