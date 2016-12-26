<?php
if (! defined('LANDING_PAGE')) exit('No direct script access allowed');

/**
* This is the Bootstrap Class where All the URL Construction Logic Works
*/

class bootstrap
{

	private $get_keys;
	public $client_ip;
	function __construct()
	{	
		$this->client_ip=(new annonymus_functions())->getRealIpAddr();
		echo "<h1>".annonymus_functions::is_asynchronous()."</h1>";
		
		if(isset($_GET['url'])){

			$url=explode("/", trim($_GET['url']));

			unset($_GET['url']);


			if($url[sizeof($url)-1]==""){

				unset($url[sizeof($url)-1]);

			}

			self::ignite($url);

		}else{
			if(isset($_SESSION['id'])){
				// Search and Load Default User Account Page
			}else{
				// Load Landing Page
				$landing_page=new index();
			}

		}

	}// End of constructor Function 

	private function ignite($url){
		//echo "Now Ready to call my method";


		if(file_exists("controllers/".$url[0].".php")){

			// Now Finally it is time to call the Class
			$c= new $url[0]($this->parse());
			if(isset($url[1])){
				if(method_exists($c, $url[1]) && (new ReflectionMethod($c, $url[1]))->isPublic()){

					$c->$url[1]();
				}
				else{
					echo "Error 404 Call. No Suitable method Found";

				}

			}

		}else{

			// Error 404 Call. No Suitable method Found
			echo "Error 404 Call. No Suitable class Found";
		}

	}// End of function ignite

	private function parse(){
		if(isset($_GET)){
			return $gets=$_GET;
		}
		return null;
	}
}//End of class