<?php

class CoffeeORM {
  protected static function connect() {
    $path = "mysql:host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";

    $pdo = 	
      new PDO(
        $path, 
        $_ENV['DB_USERNAME'], 
        $_ENV['DB_PASSWORD']
      );
	
    return $pdo;
  }

  public static function all() {
    $objects = [];

    $child = get_called_class();

    $sqlQuery = "SELECT * FROM `{$child}`";

    foreach (self::connect()->query($sqlQuery) as $data) {
      array_push(
        $objects, 
        new $child($data)
      );
    }
	
    return $objects;
  }
}
