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
        $categoryby = null;
        $sortedby = null;
        $order = null;
        $start = null;
        $end = null; 
        
        if (array_key_exists('sort', $_GET)) {
            $sortedby = $_GET['sort'];
            if (array_key_exists('order', $_GET)) {
                $order = $_GET['order'];
                
                $querrysByOrder = [
                    "id" => "ORDER BY id_parapente",
                    "nombre" => "ORDER BY name",
                    "descripcion" => "ORDER BY description",
                    "dificultad" => "ORDER BY difficulty",
                    "precio" => "ORDER BY price",
                    "categoria" => "ORDER BY type_paraglider"
                ];
                if (isset($querrysByOrder[$sortedby])&&$order) {
                    $order_query = $querrysByOrder[$sortedby];

                    $glidersByorder = $this->model->getGliderByOrder($sortedby, $order, $order_query);
                    $this->view->response($glidersByorder, 200);
                    die();
                }
                else 
                    $order_query = $this->view->response("Este campo del producto no existe", 404);
                    die();
            }
        }

        if (array_key_exists('category', $_GET)) {
            $categoryby = $_GET['category'];
            
                $glidersbyCategory = $this->model->getGlidersByCategory($categoryby);
                $this->view->response($glidersbyCategory, 200);   
                die();  
        }

        if (array_key_exists('start', $_GET)) {
            $start = $_GET['start'];
           if (array_key_exists('end', $_GET))
               $end = $_GET['end']; 
        
            $querryStart = [
                $start => "OFFSET $start"
            ];
    
            if (isset($querryStart[$start]) && $end) {
                $start_query = $querryStart[$start];
                
               $glidersByPagination = $this->model->getGlidersByPagination($end, $start_query);
               $this->view->response($glidersByPagination, 200);
        } else 
            $this->view->response("Error al completar los campos", 400);
        }

        else {
            $gliders = $this->model->getAll();
            $this->view->response($gliders, 200);
        } 
    
}
        
    public function getGlider($params = null) {
        $id = $params[':ID'];
        $glider = $this->model->getGliderById($id);

        if ($glider)
            $this->view->response($glider, 200);
        else 
            $this->view->response("El parapente con el id: $id no existe", 404);
    }

    public function deleteGlider($params = null) {
        $id = $params[':ID'];

        $glider = $this->model->getGliderById($id);
        if ($glider) {
            $this->model->delete($id);
            $this->view->response($glider, 200);
        } else 
            $this->view->response("El parapente con el id: $id no existe", 404);
    }

    public function insertGlider($params = null) {
        $glider = $this->getData();
        
        if (empty($glider->name) || empty($glider->description) || empty($glider->difficulty) || empty($glider->price) || empty($glider->id_category_fk))  {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertGlider($glider->name, $glider->description, $glider->image, $glider->difficulty, $glider->price, $glider->id_category_fk);
            $glider = $this->model->getGliderById($id);
            $this->view->response($glider, 201);
        }
    }
}