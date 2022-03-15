<?php

class WaiterSanitizer {
  private $name;

  public function __construct($data) {
    $this->name = $data['name'];
  }

  public function call() {
    return [
      'name' => htmlentities($this->name)
    ];
  }
}

