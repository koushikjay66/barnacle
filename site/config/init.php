<?php
spl_autoload_register(function($class) {
    if (file_exists("{$class}.php")) {
        echo $class;
        require_once $class . '.php';
    }
});
