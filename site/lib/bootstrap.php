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

			self::_ignite($url);

		}else{
			if(isset($_SESSION['id'])){
				// Search and Load Default User Account Page
				define("IF_AJAX",false);
				annonymus_functions::redirect(LANDING_PAGE."/".session::$user_name);
				die();
			}else{
				// Load Landing Page
				define("IF_AJAX",false);
				$landing_page=new index($this->parse());
				$landing_page->view_loader();
			}

		}

	}// End of constructor Function 

	private function _ignite($url){
		if(isset($url[1]) && $url[1]!=null){
			$ajax_class=$url[0]."/".$url[1];
			define("IF_AJAX",if_ajax($ajax_class));
			if(IF_AJAX){
				global $ROUTEAjax;
				require 'controllers/'.$url[0].'.php';
				call_user_func($ROUTEAjax[$ajax_class]);

			}
		}// End of isset($url[1]) && $url[1]!=null

		 if(file_exists("controllers/".$url[0].".php")){
		 	define("IF_AJAX",false);
		 	$c = new $url[0]();
			switch (TRUE) {
				case (isset($url[1]) && isset($url[2]) && isset($url[3])):
					if(method_exists($c, $url[1], $url[2], $url[3]) && (new ReflectionMethod($c, $url[1], $url[2], $url[3]))->isPublic()){

						$c->$url[1]($this->parse(), $url[2], $url[3]);
						$c->view_loader();
					}else{
						echo "Method Not Found";
					}
					break;
				case (isset($url[1]) && isset($url[2])):
					if(method_exists($c, $url[1], $url[2]) && (new ReflectionMethod($c, $url[1], $url[2]))->isPublic()){

						$c->$url[1]($this->parse(), $url[2]);
						$c->view_loader();
					}else{
						echo "Method Not Found";
					}
					
					break;
				case(isset($url[1])):

					if(method_exists($c, $url[1]) && (new ReflectionMethod($c, $url[1]))->isPublic()){

						$c->$url[1]($this->parse());
						$c->view_loader();
					}else{
						echo "Method Not Found";
					}

					break;
				default:
					$c->_load_constroctor_details();
					$c->view_loader();
					echo "Only Constructor ran";
					break;
			}

		}// End of 


	}

	private function parse(){
		if(isset($_GET)){
			return $gets=$_GET;
		}
		return null;
	}
}//End of class