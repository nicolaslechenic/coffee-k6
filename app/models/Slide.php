<?php	

class Slide extends CoffeeORM {	
  protected $id;
  protected $path;
	
  public function __construct($data) {
    parent::__construct();
    $this->id = $data["id"] ?? false;
    $this->path = $data["path"];
  }

  public function getFullPath() {
    return "./app/assets/slides/{$this->path}";
  }
}
