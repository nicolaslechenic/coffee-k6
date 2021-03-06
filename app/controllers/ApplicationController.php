<?php

class ApplicationController {
  protected static function loadPage() {
    $folder = strtolower(explode("Controller", get_called_class())[0]);
    $file = debug_backtrace()[1]['function'];

    return "./app/views/{$folder}/{$file}.php";
  }

  protected static function redirect($path) {
    header("Location: {$path}");
  }
}