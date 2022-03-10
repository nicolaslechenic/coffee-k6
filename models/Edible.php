<?php	

require_once(__DIR__ . "/CoffeeORM.php");

class Edible extends CoffeeORM {	
  private $id;
  private $name;
	
  public function __construct($data) {
    $this->id = $data["id"];
    $this->name = $data["name"];
  }

  public function getName() {
    return $this->name;
  }
}
