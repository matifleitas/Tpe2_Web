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
        $gliders = $this->model->getAll();
        $this->view->response($gliders);
    }

    public function getGlider($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $glider = $this->model->getGliderById($id);

        // si no existe devuelvo 404
        if ($glider)
            $this->view->response($glider);
        else 
            $this->view->response("El parapente con el id=$id no existe", 404);
    }

    public function deleteGlider($params = null) {
        $id = $params[':ID'];

        $glider = $this->model->getGliderById($id);
        if ($glider) {
            $this->model->delete($id);
            $this->view->response($glider);
        } else 
            $this->view->response("El parapente con el id=$id no existe", 404);
    }

    public function insertGlider($params = null) {
        $glider = $this->getData();

        if (empty($glider->name) || empty($glider->description) || empty($glider->difficulty) || empty($glider->price))  {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertGlider($glider->name, $glider->description, $glider->difficulty, $glider->price);
            $glider = $this->model->getGliderById($id);
            $this->view->response($glider, 201);
        }
    }


}