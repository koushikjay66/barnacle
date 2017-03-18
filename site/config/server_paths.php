<?php
// This Section  of code defines the basic Links and file Structure


// Default Landing page Controller Name
define("LANDING_PAGE", "http://".$_SERVER['SERVER_NAME']."/barnacle/site");
define("BASE_URL", "http://".$_SERVER['SERVER_NAME']."/");
define("MEDIA", BASE_URL."/media/");
define("STORAGE", "../../../storage/media/");
define("JOIN", BASE_URL."join/");

/*
 * Our Default css/js/icons Storage links 
 */

define("STATIC_STORAGE", "http://http://designs-barnacle.azurewebsites.net/");
define("CSS", "http://http://designs-barnacle.azurewebsites.net/styles/");
define("JS", "http://http://designs-barnacle.azurewebsites.net/script/");
define("ICONS", "http://http://designs-barnacle.azurewebsites.net/icons/");