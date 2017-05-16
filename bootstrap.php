<?php

require_once __DIR__.'/app/helpers.php';

/**
 * Database connection
 */
define('DB_HOST', 'mysql:host=127.0.0.1;dbname=faq');
define('DB_USER', 'root');
define('DB_PASS', '');

/**
 * Path setup
 */
define('root_path', __DIR__);

session_start();

