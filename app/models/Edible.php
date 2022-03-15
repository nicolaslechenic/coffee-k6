<?php	

class Edible extends CoffeeORM {	
  private $id;
  private $name;
	
  public function __construct($data) {
    parent::__construct();
    $this->id = $data["id"] ?? false;;
    $this->name = $data["name"];
  }

  public function getName() {
    return $this->name;
  }
}
