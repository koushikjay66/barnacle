<?php 


/**
* URL: http://barnacle/koushikjay66
*/
class home extends controller
{
	
	
	function __construct($user_id=null)
	{

		parent::__construct(__CLASS__);
		$this->post_new();
		$this->pinned();
		$this->trending();
		$this->newsfeed();
		$this->profile_info();
		$this->propic();
		$this->static_things();


	}// End of constructor function

	/*
	* Input:
	* Output: show view of post a new story
	*/
	public static function post_new()
	{
		# code...
	}// End of function post_new

	/*
	* Input:
	* Output: show view of pinned posts
	*/
	public static function pinned()
	{
		# code...
	}// End of function pinned

	/*
	* Input:
	* Output: show view of trending posts
	*/
	public static function trending()
	{
		# code...
	}// End of function trending

	/*
	* Input:
	* Output: show view of newsfeed
	*/
	public static function newsfeed()
	{
		# code...
	}// End of function newsfeed

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