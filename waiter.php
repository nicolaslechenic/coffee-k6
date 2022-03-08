<?php	

require_once("./CoffeeORM.php");

class Waiter extends CoffeeORM{
  public static function find($id) {
    $req = self::connect()->prepare('SELECT id, name FROM Waiter WHERE id = :id');
    $req->execute(array(':id' => $id));

    return new self($req->fetch());
  }
	
  private $id;
  private $name;
	
  public function __construct($data) {
    $this->id = $data["id"];
    $this->name = $data["name"];
  }
	
  public function getName() {	
    return $this->name;
  }

  public function getFormatedName() {
    return ucwords($this->name) . " | id : " . $this->id;
  }
}
