<?php 
/**
* This route Array is for all the AJAX Request that Needs to be send. 
* Only for the AJAX Usage now on . Later I will add the extensibility
* @author Koushik Jay
*/
 




/**
* All the Ajax Request for media class
*/


 $ROUTEAjax['media/upload']="media::upload";
 $ROUTEAjax['media/load_propic']="media::load_propic";
 $ROUTEAjax['media/upload']="media::upload";
 $ROUTEAjax['media/media_view']="media::media_view";
 

 /**
 * All the Ajax Request will be made for notification class
 */
 $ROUTEAjax['notification']="notification::get_total";
 $ROUTEAjax['notification/get_current']="notification::get_current";


 /**
 * This particular method takes argument of 
 */

function if_ajax($requested_page){
	global $ROUTEAjax;

	if(isset($ROUTEAjax[strtolower($requested_page)])){
		return TRUE;
	}
	return FALSE;
}// End of function 
