<?php 

class gliderApiModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=eagle;charset=utf8', 'root', '');
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT parapentes.id_parapente, parapentes.name, parapentes.description, parapentes.image, parapentes.difficulty, parapentes.price, categoria.type_paraglider
        FROM parapentes JOIN categoria
        ON parapentes.id_category_fk = categoria.id_category");
        $query->execute();

        $gliders = $query->fetchAll(PDO::FETCH_OBJ);

        return $gliders;
    }

    public function getGliderByOrder($sortedby, $order, $order_query) {

        $query = $this->db->prepare("SELECT parapentes.id_parapente, parapentes.name, parapentes.description, parapentes.image, parapentes.difficulty, parapentes.price, categoria.type_paraglider
        FROM parapentes JOIN categoria
        ON parapentes.id_category_fk = categoria.id_category $order_query $order");
        $query->execute();
        $glidersByorder = $query->fetchAll(PDO::FETCH_OBJ);

        return $glidersByorder;
    }

    public function getGliderById($id) {
        $query = $this->db->prepare("SELECT parapentes.id_parapente, parapentes.name, parapentes.description, parapentes.image, parapentes.difficulty, parapentes.price, categoria.type_paraglider
        FROM parapentes JOIN categoria WHERE id_parapente = ?");
        $query->execute([$id]);
        $glider = $query->fetch(PDO::FETCH_OBJ);
        
        return $glider;
    }

    public function getGlidersByCategory($categoryby) {

        $query = $this->db->prepare("SELECT parapentes.id_parapente, parapentes.name, parapentes.description, parapentes.image, parapentes.difficulty, parapentes.price, categoria.type_paraglider
        FROM parapentes JOIN categoria 
        ON parapentes.id_category_fk = categoria.id_category WHERE categoria.type_paraglider = ?");
        $query->execute([$categoryby]);
        $glidersbyCategory = $query->fetchAll(PDO::FETCH_OBJ);

        return $glidersbyCategory;
    }

    public function getGlidersByPagination($end, $start_query) {

        $query = $this->db->prepare("SELECT parapentes.id_parapente, parapentes.name, parapentes.description, parapentes.image, parapentes.difficulty, parapentes.price, categoria.type_paraglider
        FROM parapentes JOIN categoria 
        ON parapentes.id_category_fk = categoria.id_category LIMIT $end $start_query");

        $query->execute([]);
        $glidersByPagination = $query->fetchAll(PDO::FETCH_OBJ);

        return $glidersByPagination;  
        } 
    

    public function insertGlider($name, $description, $image = NULL, $difficulty, $price, $id_category_fk) {
        $query = $this->db->prepare("INSERT INTO parapentes (name, description, image, difficulty, price, id_category_fk) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$name, $description, $image, $difficulty, $price, $id_category_fk]);

        return $this->db->lastInsertId();
    }

    function delete($id) {
        $query = $this->db->prepare('DELETE FROM parapentes WHERE id_parapente = ?');
        $query->execute([$id]);
    }

}