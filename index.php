<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path,PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('advertisements', 'ProjectController');
Routing::get('register', 'DefaultController');
Routing::get('addcar', 'DefaultController');
//Routing::get('search', 'DefaultController');


Routing::post('search', 'ProjectController');
Routing::post('login', 'SecurityController');
Routing::post('addProject', 'ProjectController');
Routing::post('register', 'SecurityController');
Routing::post('deleteProject', 'ProjectController');

Routing::run($path);
