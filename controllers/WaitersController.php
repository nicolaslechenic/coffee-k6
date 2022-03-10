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
}