<?php 

class commentsApiModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=eagle;charset=utf8', 'root', '');
    }

    public function getCommentById($id) {
        $query = $this->db->prepare("SELECT parapentes.name, comments_products.name_user, comments_products.comments
        FROM comments_products JOIN parapentes WHERE id_parapente_fk = ?");
        $query->execute([$id]);
        $gliderComment = $query->fetch(PDO::FETCH_OBJ);
        
        return $gliderComment;
    }
}