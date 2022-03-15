<?php

require('vendor/autoload.php');

if($_SERVER['HTTP_HOST'] !=  "coffee-k6-nlc.herokuapp.com") {
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
}


require_once('./app/sanitizers/WaiterSanitizer.php');
require_once('./app/sanitizers/EdibleSanitizer.php');
require_once('./app/models/CoffeeORM.php');
require_once('./app/models/Waiter.php');
require_once('./app/models/Edible.php');
require_once('./app/controllers/ApplicationController.php');
require_once('./app/controllers/WaitersController.php');
require_once('./app/controllers/EdiblesController.php');

$route = $_SERVER['REQUEST_URI'];

$params = explode('/', $route);
$controllerName = ucfirst("{$params[1]}Controller") ?? false;
$method = $params[2] ?? false;
$id = $params[3] ?? false;

if(isset($controllerName) && isset($method)) {
  $controller = new $controllerName();
  
  try {
    if(isset($id)) {
      $controller->$method($id);
    } else {
      $controller->$method();
    }
  } catch (Error $e) {
    require './app/views/templates/404.php';
  }
} 