<?php


namespace src\models;


class Newsletter
{
    private $db;

    public function __construct()
    {
        $instance = ConnectDb::getInstance();
        $this->db = $instance->getConnection();
    }

    public function getAll()
    {
        return $this->db->query('SELECT id, email FROM newsletters ORDER BY id DESC');
    }

    public function insert($email){
        $genres = $this->db->prepare('INSERT INTO newsletters (email) VALUES (?)');
        return $genres->execute([$email]);
    }
}