<?php
require_once 'app/models/gliderApiModel.php';
require_once 'app/views/gliderApiView.php';

class gliderApiController {
    private $model;
    private $view;

    private $data;

    public function __construct()   {
        $this->model = new gliderApiModel();
        $this->view = new gliderApiView();

        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getGliders($params = null) {
        // $fields = ['id_parapente', 'name', 'description', 'difficulty', 'id_category', 'image'];
    
        $category= '';
        $sortedby= '';
        $order= '';
        $start = '';
        $limit = ''; 
        

        if (array_key_exists('sort', $_GET)) {
            $sortedby = $_GET['sort'];
            if (array_key_exists('order', $_GET)) {
                $order = $_GET['order'];
                
                $glidersByorder = $this->model->getGliderByOrder($sortedby, $order);
                $this->view->response($glidersByorder);
            }
        } 
        // if (array_key_exists('category', $_GET)) {
        //     $category = $_GET['category'];
        
        //     $glidersByCategory = $this->model->getGlidersByCategory($category);
        //     $this->view->response($glidersByCategory);

        // } 
        if (array_key_exists('start', $_GET)) {
            $start = $_GET['start'];
            
           if (array_key_exists('limit', $_GET))
               $limit = $_GET['limit']; 

               $glidersByPagination = $this->model->getGlidersByPagination($start, $limit);
               $this->view->response($glidersByPagination);
        }

        else {

            $gliders = $this->model->getAll();
            $this->view->response($gliders);
        } 
    } 
        
    public function getGlider($params = null) {
        $id = $params[':ID'];
        $glider = $this->model->getGliderById($id);

        if ($glider)
            $this->view->response($glider);
        else 
            $this->view->response("El parapente con el id: $id no existe", 404);
    }
     
    // public function getGliderComments($params = null) {

    //     if (isset('comentarios', $_GET))
    //         $id_comment = $params[':ID'];
    //         $commentById = $this->model->getCommentById($id_comment);

    // if ($commentById)
    //     $this->view->response($commentById);
    // else 
    //     $this->view->response("El comentario con el id: $id_comment no existe", 404);

    // }


    public function deleteGlider($params = null) {
        $id = $params[':ID'];

        $glider = $this->model->getGliderById($id);
        if ($glider) {
            $this->model->delete($id);
            $this->view->response($glider);
        } else 
            $this->view->response("El parapente con el id: $id no existe", 404);
    }

    public function insertGlider($params = null) {
        $glider = $this->getData();

        if (empty($glider->name) || empty($glider->description) || empty($glider->difficulty) || empty($glider->price) || empty($glider->id_category_fk))  {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertGlider($glider->name, $glider->description, $glider->difficulty, $glider->price, $glider->id_category_fk, $glider->image);
            $glider = $this->model->getGliderById($id);
            $this->view->response($glider, 201);
        }
    }

}