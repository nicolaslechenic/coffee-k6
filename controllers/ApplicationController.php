<?php

class ApplicationController {
  protected function loadPage() {
    $folder = strtolower(explode("Controller", get_called_class())[0]);
    $file = debug_backtrace()[1]['function'];

    return "./views/{$folder}/{$file}.php";
  }
}