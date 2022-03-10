<?php

require('vendor/autoload.php');
use Carbon\Carbon;


if($_SERVER['HTTP_HOST'] !=  "coffee-k6-nlc.herokuapp.com") {
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
}

require('./Waiter.php');
require('./Edible.php');

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

$waiters = Waiter::all();
foreach ($waiters as $waiter) { print "<br/>" . $waiter->getFormatedName(); }

$edibles = Edible::all();
foreach ($edibles as $edible) { print "<br/>" . $edible->getName(); }



$jeanne = Waiter::find(1);
var_dump($jeanne);

$expresso = Edible::find(2);
var_dump($expresso);




die();



// Affichage des cafés à 1.3€
echo("<h2>Cafés</h2>");

$execCoffeeQuery = $pdo->query("SELECT name, price FROM Edible WHERE FORMAT(price, 1) = 1.3");
$coffees = $execCoffeeQuery->fetchAll();

foreach ($coffees as $coffee) {
  print "<br/>" . $coffee['name'] . " | " . $coffee['price'] . "€";
}

// Afficher le total de la première facture

echo("<h2>Total de la première facture</h2>");


$orderOne = "SELECT quantity, price FROM `OrderEdible` WHERE idOrder=1";
$execOrderOneQuery = $pdo->query($orderOne);
$orders = $execOrderOneQuery->fetchAll();

$total = 0;
foreach($orders as $order) {
  $total += ($order["price"] * $order["quantity"]);
}
print $total . "€";

echo("<br/>");


// Afficher le CA du serveur 2
echo "<h3>Afficher le CA du serveur 2 en PHP (beurk)</h3>";
$phpOrdersIdWaiter2 = "SELECT id FROM `Order` WHERE idWaiter=2";
$ids = $pdo->query($phpOrdersIdWaiter2)->fetchAll();

$phpTotal = 0;

foreach($ids as $id) {
  $oeWaiter2 = "SELECT price, quantity FROM `OrderEdible` WHERE idOrder=" . $id["id"];
  $execOeWaiter2 = $pdo->query($oeWaiter2);
  $orders2 = $execOeWaiter2->fetchAll();
  
  foreach($orders2 as $o2) {
    $phpTotal += ($o2["price"] * $o2["quantity"]);
  }
}
print $phpTotal . "€";

echo("<br/>");


// "INSERT INTO tablice(immat, idRadar, department) VALUES ('AZE 123 AB', 123546, 56);"

// "INSERT INTO tablice(immat, idRadar, department) VALUES ("ZU 0666", 0, 0); DROP DATABASE tablice;";

// Version SQL pure


echo "<h3>Afficher le CA du serveur 2 en SQL (good)</h3>";

$sqOrdersIdWaiter2 = 
  "SELECT w.name AS name, FORMAT(SUM(price * quantity), 2) AS turnover 
    FROM `Order` AS o 
    INNER JOIN `OrderEdible` AS oe
    INNER JOIN `Waiter` AS w  
    ON o.id = oe.idOrder 
    WHERE o.idWaiter = 2 
      AND w.id = o.idWaiter;";
              
$total = $pdo->query($sqOrdersIdWaiter2)->fetch(PDO::FETCH_OBJ);

print $total->name . " a un chiffre d'affaire de " . $total->turnover . "€";

echo("<br/>");


// Afficher le nombre de café servi sur la table 3
$ordersIdTable3 = "SELECT id FROM `Order` WHERE idRestaurantTable=3";
$execordersIdTable3Query = $pdo->query($ordersIdTable3);

$idsTable = $execordersIdTable3Query->fetchAll();

$total3 = 0;
foreach($idsTable as $idTable) {
  $oeTable3 = "SELECT quantity FROM `OrderEdible` WHERE idOrder=" . $idTable["id"];
  $execOeTable3 = $pdo->query($oeTable3);
  $orders3 = $execOeTable3->fetchAll();
  foreach($orders3 as $o3) {
    $total3 += $o3["quantity"];
  }
}
print $total3 . " cafés sur la table 3";


// Les serveurs qui ont servi la table 3

echo "<h3>Serveurs de la table 3 PHP (beurk)</h3>";

$table3IdWaitersReq = "SELECT idWaiter FROM `Order` WHERE idRestaurantTable=3";
$idWaiters = $pdo->query($table3IdWaitersReq)->fetchAll();

foreach($idWaiters as $idWaiter) {
  $currentWaiterReq = "SELECT name FROM `Waiter` WHERE id=" . $idWaiter["idWaiter"];
  
  $waiter = $pdo->query($currentWaiterReq)->fetch(PDO::FETCH_OBJ);
  echo $waiter->name . "</br>";
}

echo "<h3>Serveurs de la table 3 SQL (good)</h3>";

$table3IdWaitersReqSQL = 
  "SELECT w.name
    FROM `Waiter` AS w 
    INNER JOIN `Order` AS o
    ON o.idWaiter = w.id
    WHERE o.idRestaurantTable = 3;";

$waiters = $pdo->query($table3IdWaitersReqSQL)->fetchAll();
foreach($waiters as $waiter) {
  echo $waiter["name"] . "</br>";
}

// Commandes d'Alban :

echo "<h3>Commandes d'Alban</h3>";

$reqOrderAlban = 
  "SELECT w.name AS waiter, o.createdAt AS creationDate, FORMAT(SUM(oe.price * oe.quantity), 2) AS turnover 
  FROM `Order` AS o
  INNER JOIN `Waiter` AS w ON o.idWaiter = w.id
  INNER JOIN `OrderEdible` AS oe ON oe.idOrder = o.id
  WHERE w.id = 2 GROUP BY oe.idOrder;";

$albanOrders = $pdo->query($reqOrderAlban)->fetchAll();

foreach($albanOrders as $order) {
  // $dt = new DateTime($order["creationDate"]);
  // var_dump($dt);
  $carbon = Carbon::parse($order["creationDate"]);  
  ;

  echo $order["waiter"] . " | " . $carbon->locale('fr')->diffForHumans() . "   |   " .$order["turnover"] . "€</br>";
}
