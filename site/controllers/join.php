<?php

namespace controllers;

/*
 * Useable defined namespaced
 */

use lib\controller as controller;
use lib\session as session;
use lib\form\controller\f_controller as f_controller;
use lib\form\validator\validator as validator;

/**
 * tHIS IS THE DEFAULT join
 */
class join extends controller {

    function __construct() {
        parent::__construct('join');
        if(IF_AJAX){
           
        }
    }

    public function _load_constroctor_details() {
        echo 'Nothing Called';
    }

    public function login() {
        if (isset(session::$user_id)) {

            parent::redirect(BASE_URL);
            die();
        }

        $f = new f_controller("13101205E", "http://localhost/barnacle/join/submit/", "POST");

        $f->addFields("email", "user_name");
        $f->addFields("password", "user_pass");
        $this->view->form_submit = '13101205E';
        parent::set_view('login', "join/login.php");
    }

    public function submit() {
        echo 'Your FOrm Has Been Submitted';
        $v = new validator("13101205E");
        $v->validator($this->post);
    }

    public function signup() {
        parent::set_view("signup_form", 'join/signup/index.php');
    }

    public function user_name_taken($user_name) {
        
    }

    public function user_email_taken($user_email) {
        
    }

    public function view_loader() {

        parent::_view();
    }

}
