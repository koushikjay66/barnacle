<?php 

/**
* 
*/
class header extends controller
{
	
	function __construct()
	{
		parent::__construct(__CLASS__);
		parent::set_view("header.php");
		$this->search_bar();
		$this->static_things();
	}


	/*
	* Input:
	* Output: Show view of search bar
	*/
	private function search_bar()
	{

		# code...
	} // End of search_bar

	/*
	* Input: 
	* Output: show view of static things like logo, login/logout button 
	*/
	private function static_things()
	{

		# code...
	} // End of static_things

} 