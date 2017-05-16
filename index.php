<?php

/**
 * Call the autoloader to easily use created classes through composer
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Call bootsrap to initialize application
 */
require_once __DIR__ . '/bootstrap.php';




use App\Routing\Router;

$router = new Router();
$router->route($_SERVER["REQUEST_URI"]);
