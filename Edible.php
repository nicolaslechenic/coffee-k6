<?php	

require_once("./CoffeeORM.php");

class Edible extends CoffeeORM {	
  public static function find($id) {
    $sqlQuery = 'SELECT id, name FROM Edible WHERE id = :id';
    
    $req = self::connect()->prepare($sqlQuery);
    $req->execute(array(':id' => $id));


    return $req->fetch();
    //return new Edible($req->fetch());
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

}
