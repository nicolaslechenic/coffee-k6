<?php

require('vendor/autoload.php');

require_once('./app/sanitizers/WaiterSanitizer.php');
require_once('./app/sanitizers/EdibleSanitizer.php');
require_once('./app/models/CoffeeORM.php');
require_once('./app/models/Waiter.php');
require_once('./app/models/Edible.php');
require_once('./app/controllers/ApplicationController.php');
require_once('./app/controllers/WaitersController.php');
require_once('./app/controllers/EdiblesController.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$_ENV['DB_NAME'] = 'abclight_test';

