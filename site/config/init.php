<?php

$replace_seperator=(DIRECTORY_SEPARATOR=="/")? "\\":"/";
spl_autoload_register(function($class) {
    global $replace_seperator;
    $str= str_replace( $replace_seperator, DIRECTORY_SEPARATOR, $class.".php");
   
    if (file_exists($str)) {
        
        require_once $str;
    }
});