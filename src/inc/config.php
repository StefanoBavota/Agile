<?php

define('ROOT_URL', 'http://localhost/agile/src/');
define('ROOT_PATH', __DIR__ . '/../');
define('AUTOLOAD_PATH', '../../vendor/autoload.php');
define('SITE_NAME', 'Eventi');

// define('DB_HOSTT', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'agile');
putenv('DB_HOST=localhost');
putenv('DB_USERNAME=root');
putenv('DB_PASSWORD=');
putenv('DB_DATABASE=agile');