<?php 


/**
* URL: http://barnacle/koushikjay66
*/
class other_user extends controller
{
	
	
	function __construct($user_id=null)
	{

		parent::__construct(__CLASS__);
		$this->user_posts();
		$this->profile_info();
		$this->propic();
		$this->static_things();


	}// End of constructor function

	/*
	* Input:
	* Output: show view of that user's posts
	*/
	public static function user_posts()
	{
		# code...
	}// End of function trending

	/*
	* Input:
	* Output: show profile infos like name, dob, bio 
	*/
	public static function profile_info()
	{
		# code...
	}// End of function profile_info

	/*
	* Input: 
	* Output: show profile pic
	*/
	public static function propic(){


	}// End function propic

	/*
	* Input: 
	* Output: show home page static designs
	*/
	private function static_things()
	{
		# code...
	}// End function static_things

}// End of class