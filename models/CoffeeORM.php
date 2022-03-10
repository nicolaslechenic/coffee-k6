<?php

class CoffeeORM {
  // Singleton
  private static $pdo = null;

  protected static function connect() {
    if(isset(self::$pdo)) {
      return self::$pdo;
    } else {
      
      $path = "mysql:host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";

      self::$pdo = 	
        new PDO(
          $path, 
          $_ENV['DB_USERNAME'], 
          $_ENV['DB_PASSWORD']
        );
	
      return self::$pdo;
    }
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

  public static function find($id) {
    $child = get_called_class();

    $req = self::connect()->prepare("SELECT * FROM `{$child}` WHERE id = :id");
    $req->execute(array(':id' => $id));

    return new $child($req->fetch());
  }
}
