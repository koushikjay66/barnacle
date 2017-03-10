<?php

namespace controllers;

use lib\controller as controller;

/*
 * @
 */

class join extends controller {

    private $class_name = 'join';

    function __construct() {

        parent::__construct($this->class_name);
    }

    /*
     * This method will be called if no other method is being called by the user
     * SO when user only types 
     * URL: www/barnacle.com/join 
     * it will call the _load_constructor_details
     */

    public function _load_constroctor_details() {
        echo 'Nothing Called';
    }

    /*
     * Function to login in the base site 
     */

    public function login() {
        if (isset($this->post['login_submit'])) {
           $this->model->login($this->post);
        } else {
            $this->set_view('login', 'join/login/index.php');
            $this->view->action = "http://localhost/barnacle/site/login";
            $this->view->method = "POST";
        }
    }

    /*
     * Function to do the signup in the base directory 
     */

    public function signup() {
        if (isset($this->post['signup'])) {
            echo $this->model->signup($this->post);
        } else {
            $this->view->action = "http://localhost/barnacle/site/join/signup/";
            $this->view->method = "POST";
            $this->set_view('post', 'join/signup/index.php');
        }
    }

    public function view_loader() {
        $this->_view();
    }

}
