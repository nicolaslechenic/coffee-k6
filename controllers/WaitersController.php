<?php

class WaitersController extends ApplicationController {

  public function all() {
    $waiters = Waiter::all();

    require $this->loadPage();
  }

  public function show($id) {
    $waiter = Waiter::find($id);

    require $this->loadPage();
  }
}