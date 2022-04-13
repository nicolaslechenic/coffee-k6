<?php

class SlidesController extends ApplicationController {

  public function home() {
    $slides = Slide::all();

    require self::loadPage();
  }
}