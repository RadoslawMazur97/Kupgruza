<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path,PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('advertisement', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('addcar', 'DefaultController');
Routing::get('homepage', 'DefaultController');

Routing::run($path);
