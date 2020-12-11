<?php

$route = explode("/", $_GET['url'] ?? 'home');

// var_dump($route);

if (file_exists("pages/{$route[0]}.php")) {
  include "pages/{$route[0]}.php";
} else echo 'erro';
