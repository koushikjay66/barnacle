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


$route['media']=array(
    'upload'=> array('upload', 0), 
    'get_list' =>array('get_list', 0), 
    'get' =>array('get', 2), 
    'sample'=>array('sample', 1), 
    "ajax_test"=>array("ajax_test", 0)
);

$route['join'] = array(
    'login' => array('login', 0),
    'submit' => array('submit', 0),
    'signup' => array('signup', 0),
    'user_email_taken' => array('user_email_taken', 1),
    'user_name_taken' => array('user_name_taken', 1)
);


$route['post'] = array(
    'view' => array('view', 1),
    
);

