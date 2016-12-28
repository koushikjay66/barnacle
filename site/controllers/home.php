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

		if($this->user_name==session::$user_name){
			// Then I know He wants to view his profile 
			$this->_load_self();

		}else{

			// He wants to view others profile
			$this->_load_others();
		}


	}// End of constructor function

	private function _load_self(){
		parent::__construct(__CLASS__);
		$this->user_posts();
		$this->post_new();
		$this->pinned();
		$this->trending();
		$this->newsfeed();
		$this->self_profile_info();
		$this->propic();
		$this->static_things();


	}

	private function _load_others(){

		// First Check the user it user_name Exists
		//If not redirect to Error Page

		// If user Exist load public Profile
		$this->user_posts();
		$this->other_profile_info();
		$this->static_things();


	}// End of function 



	/*
	* Input:
	* Output: show view of post a new story
	*/
	public static function()
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
	public static function self_profile_info()
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
	public static function other_profile_info()
	{
		# code...
	}// End of function profile_info

	public static function update_profile(){

		//input : fields needed to be updated
		// ouput :

	} //end of function update_profile



	/**
	*This must be present in all the things.
	*/
	public function view_loader(){

		parent::view_loader();
	}


}// End of class