<?php

require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo("Hello world !");

print "<br/>";

$path = "mysql:host=" . $_ENV["DB_HOST"] . ":" . $_ENV["DB_PORT"] . ";dbname=" . $_ENV["DB_NAME"] . ";charset=utf8";

// PDO : PHP Data Object
$pdo = 
  new PDO(
    $path, 
    $_ENV["DB_USERNAME"], 
    $_ENV["DB_PASSWORD"], 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
  );

$sqlQuery = 'SELECT name FROM Waiter';
$execQuery = $pdo->query($sqlQuery);

$waiters = $execQuery->fetchAll();

foreach ($waiters as $waiter) {
  print "<br/>" . $waiter['name'];
}
