<?php

/**
* The Main Controller Loader Class . 

*/
class bootstrap
{
	
	function __construct()
	{
		//echo "Hello From Bootstrap Class";

		if(isset($_GET['url'])){

			$url=explode("/", trim($_GET['url']));

			self::ignite($url);
			
		}else{
			// If not logged in or didnont type anything send user to the default index.php page
			if(!isset($_SESSION['id'])){

				header("Location: ".tuni."login/");
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