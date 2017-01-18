<?php

namespace controllers;
use lib\session as session;
use lib\controller as controller;

/**
 * This is the default Login page Controller, User can log in or User can be redirected to login page
 */
class login extends controller {

    function __construct() {

        parent::__construct("login");
        if(!isset(session::$user_id)){
              echo 'You need to sign in ';
        }
    }

    public function _load_constroctor_details() {
        
    }

    private function signin() {
        if(!isset(session::$user_id)){
            
          
        }
    }

//end of function signin

    public function submit() {

    }

// End of function submit

    public function view_loader() {

        parent::_view();
    }

    private function authenticate($user_name, $user_pass) {
        global $session;
        $res = $this->model->authenticate($user_name, $user_pass);
        if ($res == FALSE) {

            echo 'No User Esist';
        } else {
            $session->set_credential_session($res['user_name'], $res['iduser']);
            echo $session::$user_id;
        }

        return false;
    }

    // End of function authenticate
    private function give_me_hash($password) {
        $hash_format = "$2y$11$";
        $salt = "Nirjonistuntuni";
        $format_salt = $hash_format . $salt;
        $hashed = crypt($password, $format_salt);
        return $hashed;
    }
}

// End of class
?>