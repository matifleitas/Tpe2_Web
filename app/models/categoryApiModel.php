<?php

class categoryApiModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_paragliders;charset=utf8', 'root', '');
    } 
}