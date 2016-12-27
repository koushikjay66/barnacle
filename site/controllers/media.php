<?php 

/**
* 
*/
class media extends controller
{
	
	function __construct()
	{
		parent::__construct(__CLASS__);
		echo "ami constructor media";
	}


	public static function load_propic(){


	}// End function load_propic


	/**
	* Input : upload Media Form
	* Output : Sends Media link in view Format to ajax
	*/
	public static function upload(){
		echo "Hi, I am upload from Media class";

	}// Upload all the files here

	public static function media_view(){


	}// End of function upload_view

	// Only called by media_view
	private function get_list(){


	}// End of function get_list

	private function get_media_uri($media_id){


	}// End of get_media_uri

		/**
	*This must be present in all the things.
	*/
	public function view_loader(){

		parent::view_loader();
	}
}