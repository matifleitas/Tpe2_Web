<?php
require_once'libs/Router.php';
require_once'app/controllers/paraglingApiController.php';

$router = new Router();

$router->addRoute('gliders', 'GET', 'gliderApiController', 'getGliderById');
$router->addRoute('gliders/:ID', 'GET', 'gliderApiController', 'getGlider');
$router->addRoute('gliders/:ID', 'DELETE', 'gliderApiController', 'deleteGlider');
$router->addRoute('gliders', 'POST', 'glidersApiController', 'insertGlider');

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
