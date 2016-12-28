<?php 


/**
* URL: http://barnacle/koushikjay66
*/
class home extends controller
{
	private $user_name;
	
	function __construct($user_name=null)
	{
		$this->user_name=$user_name;

		if($this->user_name==session::user_name){
			// Then I know He wants to view his profile 
			$this->_load_self();

		}else{

			// He wants to view others profile
		}


	}// End of constructor function

	private function _load_self(){
		parent::__construct(__CLASS__);
		$this->post_new();
		$this->pinned();
		$this->trending();
		$this->newsfeed();
		$this->profile_info();
		$this->propic();
		$this->static_things();

	}

	private function _load_others(){

		// First Check the user it user_name Exists
		//If not redirect to Error Page

		// If user Exis load public Profile


	}// End of function 



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
	* Output: show home page static designs
	*/
	private function static_things()
	{
		# code...
	}// End function static_things


	/**
	*This must be present in all the things.
	*/
	public function view_loader(){

		parent::view_loader();
	}
}

}// End of class