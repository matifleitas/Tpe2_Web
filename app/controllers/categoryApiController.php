<?php
require_once'app/models/categoryApiModel.php';
require_once'app/views/categoryApiView.php';

class categoryApiController {
    private $model;
    private $view;

    private $data;

    public function __construct()   {
        $this->model = new categoryApiModel();
        $this->view = new categoryApiView();

        $this->data = file_get_contents("php://input");
    }

    public function getData() {
        return json_decode($this->data);
    }

    public function getCategories($params = null) {
        $categories = $this->model->getAllcategories();
        $this->view->response($glideres);
    }

    public function getCategory($params = null) {
        $id = $params[':ID'];
        $category = $this->model->getCategoryById($id);

        if($category) 
            $this->view->response($category);
        else 
            $this->view->response("La categoria con el id: $id no existe", 404);
            
    }
}
