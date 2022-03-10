<?php

class EdiblesController extends ApplicationController {

  public function all() {
    $edibles = Edible::all();

    require $this->loadPage();
  }
}