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
				$c = new home(session::user_id);
				$c->view_loader();
			}else{
				// Load Landing Page

				$landing_page=new index(self::parse());
				$landing_page->view_loader();
			}

		}

	}// End of constructor Function 

	private function ignite($url){
		//echo "Now Ready to call my method";
		if(isset($url[1])){
			$ajax_class=$url[0]."/".$url[1];
			define("IF_AJAX",if_ajax($ajax_class));
		}
		
		
		if(IF_AJAX){
			global $ROUTEAjax;
			require 'controllers/'.$url[0].'.php';
			call_user_func($ROUTEAjax[$ajax_class]);
			
		}
		else if(file_exists("controllers/".$url[0].".php")){

			// Now Finally it is time to call the Class
			$c= new $url[0]($this->parse());
			if(isset($url[1])){
				if(method_exists($c, $url[1]) && (new ReflectionMethod($c, $url[1]))->isPublic()){

					$c->$url[1]();
					$c->view_loader();
				}
				else{
					echo "Error 404 Call. No Suitable method Found";

				}

			}

			$c->view_loader();

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