<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path,PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('advertisements', 'ProjectController');
Routing::get('register', 'DefaultController');
Routing::get('addcar', 'DefaultController');
//Routing::get('search', 'DefaultController');
Routing::get('logout', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('addProject', 'ProjectController');
Routing::post('register', 'SecurityController');
Routing::post('search', 'ProjectController');

Routing::run($path);
