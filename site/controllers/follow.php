<?php 

/**
* 
*/
class follow extends controller
{
	
	function __construct()
	{
		parent::__construct(__CLASS__);
	}

	public static function createFollower(){

	} //end of function createFollower

	public static function unfollow(){

	} //end of function unfollow

	public static function getFollowers(){

	} //end of function getFollowers

	public function view_loader(){

		parent::view_loader();
	}

    protected function _load_constroctor_details() {
        
    }

}