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

}