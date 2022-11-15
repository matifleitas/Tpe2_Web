<?php
require_once'libs/Router.php';
require_once'app/controllers/gliderApiController.php';
require_once'app/controllers/commentsApiController.php';

$router = new Router();

$router->addRoute('gliders', 'GET', 'gliderApiController', 'getGliders');
$router->addRoute('gliders/:ID', 'GET', 'gliderApiController', 'getGlider');
$router->addRoute('gliders/:ID', 'DELETE', 'gliderApiController', 'deleteGlider');
$router->addRoute('gliders', 'POST', 'gliderApiController', 'insertGlider');
$router->addRoute('gliders/:ID/:comment', 'GET', 'commentsApiController', 'getCommentById');



$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
