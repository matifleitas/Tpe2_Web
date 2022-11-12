<?php
require_once'app/models/commentsApiModel.php';
require_once'app/views/commentsApiView.php';

class commentsApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new commentsApiModel();
        $this->view = new commentsApiView();

        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getCommentById($params = null) {
        $id = $params[':ID'];
        
        $gliderComment = $this->model->getCommentById($id);

        if ($gliderComment)
            $this->view->response($gliderComment);
        else 
            $this->view->response("El comentario seleccionado no existe", 404);
    }
    
}