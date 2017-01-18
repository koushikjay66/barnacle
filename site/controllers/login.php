<?php

namespace controllers;

use lib\controller as controller;
use lib\annonymus_functions as annonymus_functions;


/**
 * This is the default Login page Controller, User can log in or User can be redirected to login page
 */
class login extends controller {
    
    function __construct() {

        parent::__construct("login");
        
    }

    public function _load_constroctor_details() {
        
    }

    private function signin() {
        echo 'Ta Da';
    }

//end of function signin

    public function submit() {
        if (!isset($_POST['submit_login'])) {
            annonymus_functions::redirect(LANDING_PAGE);
        }// End of !isset($_POST['submit_login'])
        else if (isset($_POST['user_name']) && isset($_POST['user_pass'])) {
            echo 'This has neem se';
            $this->authenticate($_POST['user_name'], $_POST['user_pass']);
        }
    }

// End of function submit

    public function view_loader() {

        parent::_view();
    }

    private function authenticate($user_name, $user_pass) {
        global $session;
        $res=$this->model->authenticate($user_name, $user_pass);
        if($res==FALSE){
            
            echo 'No User Esist';
        }else{
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

//END OF GIVE_ME_HASH
//END OF AUTHENTICATE
}

// End of class
?>