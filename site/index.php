<?php

session_start();

use lib\bootstrap as bootstrap;

require_once 'config/server_paths.php';

require_once 'config/db_config.php';

require_once 'config/route.php';
require_once 'config/init.php';
require_once 'config/routes.php';

$session = new lib\session();
$bootstrap = new bootstrap();
