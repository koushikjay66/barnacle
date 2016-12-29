<?php 


/**
* URL: http://barnacle/koushikjay66
*/
class home extends controller
{
	private $user_name;
	function __construct($user_name=null)
	{
		parent::__construct(__CLASS__);
		parent::set_view('header','header/index.php');

		$this->user_posts();
		// $this->user_name=$user_name;

		// if($this->user_name==session::$user_name){
		// 	// Then I know He wants to view his profile 
		// 	$this->_load_self();

		// }else{

		// 	// He wants to view others profile
		// 	$this->_load_others();
		// }


	}// End of constructor function

	/*
	*This is the abstract method where constructor is called directly
	*/
	public function _load_constroctor_details(){
		
	}// End of _load_constroctor_details function

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
	public  function post_new()
	{
		parent::set_view(__FUNCTION__, __CLASS__.'/'.__FUNCTION__.'/index.php');
	}// End of function post_new

	/*
	* Input:
	* Output: show view of pinned posts
	*/
	public  function pinned()
	{
		# code...
	}// End of function pinned

	/*
	* Input:
	* Output: show view of trending posts
	*/
	public  function trending()
	{
		# code...
	}// End of function trending

	/*
	* Input:
	* Output: show view of newsfeed
	*/
	public  function newsfeed()
	{
		# code...
	}// End of function newsfeed

	/*
	* Input:
	* Output: show profile infos like name, dob, bio 
	*/
	public  function self_profile_info()
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
	public  function user_posts()
	{
		parent::set_view(__FUNCTION__, __CLASS__.'/'.__FUNCTION__.'/index.php');
	}// End of function trending

	/*
	* Input:
	* Output: show profile infos like name, dob, bio 
	*/
	public  function other_profile_info()
	{
		# code...
	}// End of function profile_info

	public  function update_profile(){

		//input : fields needed to be updated
		// ouput :

	} //end of function update_profile




	/**
	*This must be present in all the things.
	*/
	public function view_loader(){

		parent::_view();
	}


}// End of class