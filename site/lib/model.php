<?php
namespace model;

/**
* This is the mother model class
*/
class model
{
	protected $database;
	function __construct()
	{
		$this->database=new database();
		
	}
}