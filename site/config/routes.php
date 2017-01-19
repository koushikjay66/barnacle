<?php

/**
 * $route['class_name']= array(
 *      'user_called_function' => array("Methos_name", "Number of arguments")
 * );
 * 
 * @author koushik Jay <koushikjay66 at gmail.com>
 * @global 3D Array 
 * @example global $route['class_name']= array(
 *      'user_called_function' => array("Method_name", "Number of arguments")
 * );
 * 
 * @name $route
 * @ 
 */
$route = array();





$route['home'] = array(
    'view_post' => array("'view_post'", 2),
    'post_new' => 'post_new',
    'newsfeed' => 'newsfeed'
);

$route['notification'] = array(
    'details' => 'details',
);


$route['tester'] = array(
    'tuntuni' => array('tuntuni', 0)
);

$route['join'] = array(
    'login' => array('login', 0),
    'submit' => array('submit', 0),
    'signup' => array('signup', 0)
);


