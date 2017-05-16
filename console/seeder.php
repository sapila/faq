<?php
/**
 * Call the autoloader to easily use created classes through composer
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Call bootsrap to initialize application
 */
require_once __DIR__ . '/../bootstrap.php';

$seeder = new \App\Database\Seeders\UserSeeder();
$seeder->seed();