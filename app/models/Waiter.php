<?php	

class Waiter extends CoffeeORM {	
  protected $id;
  protected $name;
	
  public function __construct($data) {
    parent::__construct();
    $this->id = $data["id"] ?? false;
    $this->name = $data["name"];
  }
	
  public function getName() {	
    return $this->name;
  }

  public function getFormatedName() {
    return ucwords($this->name) . " | id : " . $this->id;
  }
}
