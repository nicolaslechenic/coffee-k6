<?php

class StaticsController extends ApplicationController {

  public function menu() {
    require self::loadPage();
  }
}