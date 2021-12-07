<?php


namespace src\models;


use src\Helper;

class Gallery
{
    private $db;

    public function __construct()
    {
        $instance = ConnectDb::getInstance();
        $this->db = $instance->getConnection();
    }

    public function getAll()
    {
        return $this->db->query('SELECT gallery.id,gallery.film_id,gallery.photo,films.titre as film_titre FROM gallery INNER JOIN films on gallery.film_id = films.id ORDER BY gallery.id DESC');
    }
    public function getByFilmId($id)
    {
        return $this->db->query('SELECT gallery.id,gallery.film_id,gallery.photo FROM gallery WHERE gallery.film_id ='.$id.' ORDER BY id DESC');

    }

    public function getById($id){
        $req = $this->db->prepare('SELECT gallery.id,gallery.film_id,gallery.photo,films.nom as nom FROM gallery INNER JOIN films on gallery.film_id = films.id WHERE gallery.id = (?)');
        $req->execute([$id]);
        return $req->fetch();
    }

    public function insert($film_id,$photos){
        // Count total files
        $countfiles = count($_FILES['files']['name']);

        $statement = $this->db->prepare('INSERT INTO gallery (film_id,photo) VALUES (?,?)');
        // Loop all files
        for($i = 0; $i < $countfiles; $i++) {
            // File name
            $filename = $_FILES['files']['name'][$i];

            // Location
            $target_file = 'upload/'.$filename;
            // file extension
            $file_extension = pathinfo(
                $target_file, PATHINFO_EXTENSION);

            $file_extension = strtolower($file_extension);

            // Valid image extension
            $valid_extension = array("png","jpeg","jpg");

            if(in_array($file_extension, $valid_extension)) {

                // Upload file
                if(move_uploaded_file(
                    $_FILES['files']['tmp_name'][$i],
                    $target_file)
                ) {

                    // Execute query
                    $statement->execute(
                        array($film_id,$target_file));
                }
            }
        }

        return true;
    }

    public function update($id, $film_id, $photo){
        $film = $this->db->prepare('UPDATE gallery SET  film_id = (?),photo = (?) WHERE id = (?)');
        return $film->execute(array($film_id, $photo, $id));
    }

    public function delete($id){
        $film = $this->db->prepare('DELETE FROM gallery WHERE id = (?)');
        return $film->execute([$id]);
    }
}