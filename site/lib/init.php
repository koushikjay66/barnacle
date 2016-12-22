<?php 
spl_autoload_register(function($class){

	if (file_exists("lib/{$class}.php")) {

		require_once "lib/{$class}.php";

	}else if(file_exists("controllers/{$class}.php")){
		
		require_once "controllers/{$class}.php";

	}else if(file_exists("models/{$class}.php")){
		
		require_once "models/{$class}.php";
	}else {
		return false;
	}
	
	});