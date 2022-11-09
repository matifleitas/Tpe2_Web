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

    public function getGliderByOrder($sortedby, $order) {
        $querrys = [
            "id_parapente" => "ORDER BY id_parapente",
            "nombre" => "ORDER BY name",
            "descripcion" => "ORDER BY description",
            "dificultad" => "ORDER BY difficulty",
            "precio" => "ORDER BY price"
        ];
        if (isset($querrys[$sortedby]))
            $order_query = $querrys[$sortedby];
        else 
            $order_query = '';

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

    // public function getGlidersByCategory($category) {

    //     $query = $this->db->prepare("SELECT parapentes.id_parapente, parapentes.name, parapentes.description, parapentes.image, parapentes.difficulty, parapentes.price, categoria.type_paraglider
    //     FROM parapentes JOIN categoria 
    //     ON parapentes.id_category_fk = categoria.id_category WHERE categoria.type_paraglider = ?");
    //     $query->execute([$category]);
    //     $glidersByCategory = $query->fetchAll(PDO::FETCH_OBJ);

    //     return $glidersByCategory;
    // }

    public function getGlidersByPagination($start, $limit) {
        $querry = [
            "$start" => "OFFSET $start"
        ];

        if (isset($querry[$start]) && $limit) {
            $start_query = $querry[$start];
            
        $query = $this->db->prepare("SELECT parapentes.id_parapente, parapentes.name, parapentes.description, parapentes.image, parapentes.difficulty, parapentes.price, categoria.type_paraglider
        FROM parapentes JOIN categoria 
        ON parapentes.id_category_fk = categoria.id_category LIMIT $limit $start_query");

        $query->execute([]);
        $glidersByPagination = $query->fetchAll(PDO::FETCH_OBJ);

        return $glidersByPagination;  
        } 
    }


    public function insertGlider($name, $description, $difficulty, $price, $id_category_fk, $image) {
        $query = $this->db->prepare("INSERT INTO parapentes (name, description, difficulty, price, id_category_fk, image) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$name, $description, $difficulty, $price, $id_category_fk, $image]);

        return $this->db->lastInsertId();
    }

    function delete($id) {
        $query = $this->db->prepare('DELETE FROM parapentes WHERE id_parapente = ?');
        $query->execute([$id]);
    }

}