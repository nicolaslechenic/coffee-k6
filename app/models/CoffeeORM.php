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

  public static function clean() {
    $db = self::connect();
    $kls = get_called_class();
    $db->query("DELETE FROM {$kls}");
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

  private $table;

  protected function __construct() {
    $this->table = get_called_class();
  }

  public function save() {
    $db = self::connect();
    $data = get_object_vars($this);
    unset($data['table']);
    unset($data['id']);

    $v = array_values($data);
    $values = join("','", $v);
    
    $keys = array_keys($data);
    $columns = join(",", $keys);

    $db->query("INSERT INTO {$this->table}({$columns}) VALUES('{$values}')");
  }
}
