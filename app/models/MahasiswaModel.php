<?php

class MahasiswaModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM mahasiswa");

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}