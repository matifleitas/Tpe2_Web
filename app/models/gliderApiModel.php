<?php 

class gliderApiModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_paragliders;charset=utf8', 'root', '');
    }
    /**
     * Devuelve la lista de tareas completa.
    */
    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM paraglider");
        $query->execute();

        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }

    public function getGliderById($id) {
        $query = $this->db->prepare("SELECT * FROM paraglider WHERE id_parapente = ?");
        $query->execute([$id]);
        $task = $query->fetch(PDO::FETCH_OBJ);
        
        return $task;
    }


    public function insertGlider($name, $description, $difficulty, $price) {
        $query = $this->db->prepare("INSERT INTO paraglider (name, description, difficulty, price) VALUES (?, ?, ?, ?)");
        $query->execute([$name, $description, $difficulty, $price]);

        return $this->db->lastInsertId();
    }

    function delete($id) {
        $query = $this->db->prepare('DELETE FROM paraglider WHERE id_parapente = ?');
        $query->execute([$id]);
    }

}