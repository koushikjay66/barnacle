<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

use lib\new_bootstrap as new_bootstrap;

require_once 'config/server_paths.php';
require_once 'config/db_config.php';
require_once 'config/init.php';
require_once 'config/routes.php';

$session = new lib\session();
$bootstrap = new new_bootstrap();