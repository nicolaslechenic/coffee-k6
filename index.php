<?php

require('vendor/autoload.php');

if($_SERVER['HTTP_HOST'] !=  "coffee-k6-nlc.herokuapp.com") {
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
}

require('./models/Waiter.php');
require('./models/Edible.php');
require('./controllers/ApplicationController.php');
require('./controllers/WaitersController.php');
require('./controllers/EdiblesController.php');

$route = $_SERVER['REQUEST_URI'];

$params = explode('/', $route);
$controllerName = ucfirst("{$params[1]}Controller") ?? false;
$method = $params[2] ?? false;
$id = $params[3] ?? false;

if(isset($controller) && isset($method)) {
  $controller = new $controllerName();

  if(isset($id)) {
    $controller->$method($id);
  } else {
    $controller->$method();
  }
}