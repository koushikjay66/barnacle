<?php
// This Section  of code defines the basic Links and file Structure


// Default Landing page Controller Name
define("LANDING_PAGE", "http://".$_SERVER['SERVER_NAME']."/barnacle/site");
define("BASE_URL", "http://".$_SERVER['SERVER_NAME']."/");
define("MEDIA", BASE_URL."/media/");

// Here It notes down all the GET Request that we dont need to send to our controller class. 