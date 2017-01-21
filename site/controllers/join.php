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
    }

    public function _load_constroctor_details() {
        
    }

    public function login() {
        if (isset(session::$user_id)) {

            parent::redirect(BASE_URL);
            die();
        }

    }

    public function submit() {
        echo 'Your Form Has Been Submitted';
        $v = new validator("13101205E");
        $v->validator($this->post);
    }

    public function signup() {

        parent::set_view("signup_form", 'join/signup/index.php');
    }

    public function user_name_taken($user_name) {
        $res = $this->model->user_name_taken($user_name);
        if (IF_AJAX) {
            echo $res;
        } else {
            return $res;
        }
    }

    public function user_email_taken($user_email) {
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            if (IF_AJAX) {
                echo 'false';
                die();
            }
            return false;
        }
        $res = $this->model->user_email_taken($user_email);
        if (IF_AJAX) {
            echo $res;
        } else {
            return $res;
        }
    }

    public function view_loader() {
        parent::_view();
    }

}
