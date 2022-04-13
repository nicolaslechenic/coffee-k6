<?php

class WaitersController extends ApplicationController {

  public function all() {
    $waiters = Waiter::all();

    require self::loadPage();
  }

  public function show($id) {
    $waiter = Waiter::find($id);
    
    require self::loadPage();
  }

  public function create() { require self::loadPage(); }
  public function insert() {

    var_dump($_FILES);die();

    $sanitizer = new WaiterSanitizer($_POST);
    $waiter = new Waiter($sanitizer->call());

    $waiter->save();

    self::redirect('/waiters/all');
  }
}