<?php

/**
* This is the main view class 
*/
class view
{
	
	function __construct()
	{
		
	}

	public function render($name){

		require $name;
	}
}