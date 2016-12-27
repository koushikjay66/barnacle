<?php 
/**
* 
*/
class annonymus_functions
{
	public function getRealIpAddr()
	{
	  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	  {
	  	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	  }elseif (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	    	$ip=$_SERVER['HTTP_CLIENT_IP'];
	    }else{
    	$ip=$_SERVER['REMOTE_ADDR'];
   		 }
    return $ip;
}// End of getRealIpAddr

	public static function is_asynchronous(){
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==strtolower('xmlhttprequest')){
			//var_dump($_SERVER);
			// If this conditions are satisfied then we know that they are the Ajax Request.
			echo "Ajax found";
			echo "<br><br>";

		}
		
		//echo "Non Ajax Request";
	}// End of function check_for_ajax 

}// End of class annonymus Function 