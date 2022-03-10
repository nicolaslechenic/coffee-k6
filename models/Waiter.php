<?php	

class Waiter extends CoffeeORM{	
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
