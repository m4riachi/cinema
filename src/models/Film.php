<?php

namespace src\models;
use PDO;
class Film
{
    private $db;

    public function __construct()
    {
        $instance = ConnectDb::getInstance();
        $this->db = $instance->getConnection();
    }

    public function getAll()
    {
        return $this->db->query('SELECT * FROM films ORDER BY films.id DESC');
    }

    public function getAllByGenre()
    {
        $films = $this->db->query('
            SELECT films.id,film_genre.genre_id,films.titre,films.description,films.annee,films.bande_annonce_url,gallery.photo,genres.nom as nom 
            FROM films 
                LEFT JOIN gallery on films.id = gallery.film_id
                LEFT JOIN film_genre on films.id = film_genre.film_id
                LEFT JOIN genres on genres.id = film_genre.genre_id 
            ORDER BY films.id 
            DESC');

        $ar_film = [];
        while ($film = $films->fetch()) {
            if (!isset($ar_film[$film['id']]))
                $ar_film[$film['id']] = ['id' => $film['id'], 'titre' => $film['titre'], 'description' => $film['description'], 'annee' => $film['annee'],'bande_annonce_url' => $film['bande_annonce_url'], 'genres' => []];
                $ar_film[$film['id']]['genres'][$film['genre_id']] = ['id' => $film['genre_id'], 'nom' => $film['nom']];
        }

        return $ar_film;
    }

    public function getAllBetweenDates($date1, $date2){
        $films = $this->db->query("SELECT films.id,film_genre.genre_id,films.titre,films.description,films.annee,films.bande_annonce_url,horaires.id as horaire_id,gallery.photo as photo,genres.nom as nom, horaires.date as date
            FROM films 
                INNER JOIN horaires on films.id = horaires.film_id
                INNER JOIN gallery on films.id = gallery.film_id
                INNER JOIN film_genre on films.id = film_genre.film_id
                INNER JOIN genres on genres.id = film_genre.genre_id 
            where date >= '$date1' AND date <= '$date2'
            ORDER BY films.id 
            DESC");

        $ar_film = [];
        while ($film = $films->fetch()) {
            if (!isset($ar_film[$film['id']])){
                $ar_film[$film['id']] = [
                    'id' => $film['id'],
                    'titre' => $film['titre'],
                    'description' => $film['description'],
                    'annee' => $film['annee'],
                    'bande_annonce_url'=> $film['bande_annonce_url'],
                    'photo' => $film['photo'],
                    'genres' => [],
                    'horaires' => [],
                ];
            }
            $ar_film[$film['id']]['genres'][$film['genre_id']] = ['id' => $film['genre_id'], 'nom' => $film['nom']];
            $ar_film[$film['id']]['horaires'][$film['horaire_id']] = ['id' => $film['horaire_id'], 'date' => $film['date']];
        }

        return $ar_film;
    }

    public function getAllBySearch(){

        $query = "SELECT films.id,film_genre.genre_id,films.titre,films.description,films.annee,films.bande_annonce_url,horaires.id as horaire_id,gallery.photo as photo,genres.nom as nom, horaires.date as date
            FROM films 
                INNER JOIN horaires on films.id = horaires.film_id
                INNER JOIN gallery on films.id = gallery.film_id
                INNER JOIN film_genre on films.id = film_genre.film_id
                INNER JOIN genres on genres.id = film_genre.genre_id";
        if(isset($_SESSION['date']) && $_SESSION['date'] != null){
            $query = $query. " WHERE date like '".$_SESSION["date"]."%'";
        }else{
            $query = $query. " WHERE date >= '".date("Y-m-d")."'";
        }
        if(isset($_SESSION['genre']) && $_SESSION['genre']!= 'null')
            $query = $query." AND genres.nom = '".$_SESSION['genre']."'";


        if(isset($_SESSION['keyword']) && $_SESSION['keyword'] != null)
            $query = $query. " AND films.titre like '".$_SESSION["keyword"]."%'";

        $query = $query." ORDER BY films.id DESC";

        $films = $this->db->query($query);
        $ar_film = [];
        while ($film = $films->fetch()) {
            if (!isset($ar_film[$film['id']])){
                $ar_film[$film['id']] = [
                    'id' => $film['id'],
                    'titre' => $film['titre'],
                    'description' => $film['description'],
                    'annee' => $film['annee'],
                    'bande_annonce_url'=> $film['bande_annonce_url'],
                    'photo' => $film['photo'],
                    'genres' => [],
                    'horaires' => [],
                ];
            }
            $ar_film[$film['id']]['genres'][$film['genre_id']] = ['id' => $film['genre_id'], 'nom' => $film['nom']];
            $ar_film[$film['id']]['horaires'][$film['horaire_id']] = ['id' => $film['horaire_id'], 'date' => $film['date']];
        }

        return $ar_film;
    }
    public function getAllsoon(){
        $date = date("Y-m-d h:i:sa",strtotime(date("Y-m-d h:i:sa").' + 1 Month'));
        $films = $this->db->query("SELECT films.id,film_genre.genre_id,films.titre,films.description,films.annee,films.bande_annonce_url,horaires.id as horaire_id,gallery.photo as photo,genres.nom as nom, horaires.date as date
            FROM films 
                INNER JOIN horaires on films.id = horaires.film_id
                INNER JOIN gallery on films.id = gallery.film_id
                INNER JOIN film_genre on films.id = film_genre.film_id
                INNER JOIN genres on genres.id = film_genre.genre_id 
            where date >= '$date' 
            ORDER BY films.id 
            DESC");
        $ar_film = [];
        while ($film = $films->fetch()) {
            if (!isset($ar_film[$film['id']])){
                $ar_film[$film['id']] = [
                    'id' => $film['id'],
                    'titre' => $film['titre'],
                    'description' => $film['description'],
                    'annee' => $film['annee'],
                    'bande_annonce_url'=> $film['bande_annonce_url'],
                    'photo' => $film['photo'],
                    'genres' => [],
                    'horaires' => [],
                ];
            }
            $ar_film[$film['id']]['photo'] = $film['photo'];
            $ar_film[$film['id']]['genres'][$film['genre_id']] = ['id' => $film['genre_id'], 'nom' => $film['nom']];
            $ar_film[$film['id']]['horaires'][] = ['id' => $film['horaire_id'], 'date' => $film['date']];
        }

        return $ar_film;
    }


    public function getById($id){
        $films = $this->db->query('SELECT films.id,films.titre,films.description,films.annee ,films.bande_annonce_url, genres.nom as nom, film_genre.genre_id as genre_id
            FROM films 
            LEFT JOIN film_genre on films.id = film_genre.film_id
            LEFT JOIN genres on genres.id = film_genre.genre_id 
            WHERE films.id = '.$id);
        $ar_film = [];
        while ($film = $films->fetch()) {
            if (!isset($ar_film[$film['id']])){
                $ar_film[$film['id']] = [
                    'id' => $film['id'],
                    'titre' => $film['titre'],
                    'description' => $film['description'],
                    'annee' => $film['annee'],
                    'bande_annonce_url'=> $film['bande_annonce_url'],
                    'genres' => [],
                ];
            }
            $ar_film[$film['id']]['genres'][$film['genre_id']] = ['id' => $film['genre_id']];
        }
        return $ar_film;
    }
    public function getFilmDetailsById($id){
        $films = $this->db->query("SELECT films.id,film_genre.genre_id,films.titre,films.description,films.annee,films.bande_annonce_url,gallery.id as gallery_id,horaires.id as horaire_id,gallery.photo as photo,genres.nom as nom, horaires.date as date
            FROM films 
                INNER JOIN horaires on films.id = horaires.film_id
                INNER JOIN gallery on films.id = gallery.film_id
                INNER JOIN film_genre on films.id = film_genre.film_id
                INNER JOIN genres on genres.id = film_genre.genre_id 
            where films.id = ".$id);
        $ar_film = [];
        while ($film = $films->fetch()) {
            if (!isset($ar_film[$film['id']])){
                $ar_film[$film['id']] = [
                    'id' => $film['id'],
                    'titre' => $film['titre'],
                    'description' => $film['description'],
                    'annee' => $film['annee'],
                    'bande_annonce_url'=> $film['bande_annonce_url'],
                    'photos' => [],
                    'genres' => [],
                    'horaires' => [],
                ];
            }
            $ar_film[$film['id']]['photos'][$film['gallery_id']]= ['id' => $film['gallery_id'], 'photo' => $film['photo']];
            $ar_film[$film['id']]['genres'][$film['genre_id']] = ['id' => $film['genre_id'], 'nom' => $film['nom']];
            $ar_film[$film['id']]['horaires'][] = ['id' => $film['horaire_id'], 'date' => $film['date']];
        }

        return $ar_film;
    }

    public function insert($genres,$titre,$description,$annee,$bande_annonce_url ){

        $film = $this->db->prepare('INSERT INTO films (titre,description,annee,bande_annonce_url) VALUES (?,?,?,?)');
        $film = $film->execute([$titre,$description,$annee,$bande_annonce_url]);
        $genre_film =  $this->db->prepare('INSERT INTO film_genre (film_id ,genre_id) VALUES (?,?)');
        if($film)
        $film_id = $this->db->lastInsertId();
        foreach ( $genres as $key=>$val){
            $genre_film->execute([$film_id,$val]);
        }

    }

    public function update($id, $genres, $titre, $description, $annee, $bande_annonce_url){
        $film = $this->db->prepare('UPDATE films SET titre = (?),description = (?),annee = (?), bande_annonce_url = (?) WHERE id = (?)');
        $film->execute([$titre,$description,$annee,$bande_annonce_url,$id]);
        $genre_film =  $this->db->prepare('DELETE FROM film_genre WHERE film_id = (?)');
        $genre_film->execute([$id]);
        $genre_film =  $this->db->prepare('INSERT INTO film_genre (film_id ,genre_id) VALUES (?,?)');
        foreach ( $genres as $key=>$val){
            $genre_film->execute([$id,$val]);
        }
    }

    public function delete($id){
        $genre_film =  $this->db->prepare('DELETE FROM film_genre WHERE film_id = (?)');
        $genre_film->execute([$id]);
        if($genre_film){
            $film = $this->db->prepare('DELETE FROM films WHERE id = (?)');
            return $film->execute([$id]);
        }else{
            return false;
        }

    }
}