<?php


namespace src\models;


class Salle
{
    private $db;

    public function __construct()
    {
        $instance = ConnectDb::getInstance();
        $this->db = $instance->getConnection();
    }

    public function getAll()
    {
        return $this->db->query('SELECT id,nom,adresse FROM salles ORDER BY id DESC');
    }

    public function getById($id){
        $req = $this->db->prepare('SELECT id,nom,adresse FROM salles WHERE id = (?)');
        $req->execute([$id]);
        return  $req->fetch();
    }

    public function insert($nom, $adresse){
        $genres = $this->db->prepare('INSERT INTO salles (nom, adresse) VALUES (?,?)');
        return $genres->execute([$nom,$adresse]);
    }

    public function update($id, $nom, $adresse){
        $genres = $this->db->prepare('UPDATE salles SET  nom = (?),adresse = (?) WHERE id = (?)');
        return $genres->execute([$nom,$adresse,$id]);
    }

    public function delete($id){
        $film = $this->db->prepare('DELETE FROM salles WHERE id = (?)');
        return $film->execute([$id]);
    }
}