<?php


namespace src\models;


class Horaire
{
    private $db;

    public function __construct()
    {
        $instance = ConnectDb::getInstance();
        $this->db = $instance->getConnection();
    }

    public function getAll()
    {
        return $this->db->query('SELECT horaires.id, horaires.film_id, horaires.salle_id, horaires.date, horaires.prix, films.titre as film_titre, salles.nom as salle_nom FROM horaires INNER JOIN films on horaires.film_id = films.id INNER JOIN salles on horaires.salle_id = salles.id ORDER BY horaires.id DESC');
    }

    public function getById($id){
        $req = $this->db->prepare('SELECT horaires.id, horaires.film_id, horaires.salle_id, horaires.date, horaires.prix, films.titre as film_titre, salles.nom as salle_nom FROM horaires INNER JOIN films on horaires.film_id = films.id INNER JOIN salles on horaires.salle_id = salles.id WHERE horaires.id = (?)');
        $req->execute([$id]);
        return $req->fetch();
    }

    public function insert($data){
        $horaire = $this->db->prepare('INSERT INTO horaires (film_id,salle_id,date,prix) VALUES (?,?,?,?)');
        return $horaire->execute($data);
    }

    public function update($id, $film_id, $salle_id, $date, $prix){
        $horaire = $this->db->prepare('UPDATE horaires SET  film_id = (?), salle_id = (?),date = (?),prix = (?) WHERE id = (?)');
        return $horaire->execute(array($film_id, $salle_id, $date, $prix,$id));
    }

    public function delete($id){
        $horaire = $this->db->prepare('DELETE FROM horaires WHERE id = (?)');
        return $horaire->execute([$id]);
    }
}