<?php
class Articulo{
    
    private $db;

    public function __construct(){
        $this->db = new DataBase();
    }

    public function findAll(){
        $this->db->query('select * from articulos');
        return $this->db->rows();
    }
}