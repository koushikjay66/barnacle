<?php

/**
* The Main Controller Loader Class . 

*/
class bootstrap13
{
	
	function __construct()
	{

		/*
			Constructor Checks for a if a GET is set.
			If  GET['url'] is set then it removes all the spaces and parse by "/"
		*/

		if(isset($_GET['url'])){

			$url=explode("/", trim($_GET['url']));

			self::ignite($url);
			
		}else{
			// If not logged in or didnont type anything send user to the default index.php page
			if(!isset($_SESSION['id'])){
				echo "Got Here";
				//header("Location: ".LANDING_PAGE."/");
			}else{
				// Do the things you want to do
				$index=new admin();
			}
			
		}
	}// End of contructor Function 

	private function ignite($url){

		if(file_exists("controllers/".$url[0].".php")){
			if(isset($url[1]) && $url[1]!=null){
				$c=new $url[0]($url[1]);
			}else {

				$c=new $url[0]();
			}
		}// if file exists
		else{

			$err=new error();;
		}// if file not exists
	}
}