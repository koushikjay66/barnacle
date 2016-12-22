<?php
defined("DB_HOST") ? null: define("DB_HOST", "");
defined("DB_USER") ? null: define("DB_USER", "root");
defined("DB_PASS") ? null: define("DB_PASS", "");
defined("DB_NAME") ? null: define("DB_NAME", "");



// This Section  of code defines the basic Links and file Structure

// Default Landing page Controller Name
define("LANDING_PAGE", "http://".$_SERVER['SERVER_NAME']."/barnacle/site");



// Here It notes down all the GET Request that we dont need to send to our controller class. 