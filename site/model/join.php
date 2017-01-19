<?php

namespace model;

use lib\model as model;

/**
 * 
 */
class join extends model {

    function __construct() {
        parent::__construct();
    }

    public function user_name_taken($user_name) {
        $user_name = $this->database->poof($user_name);
        $sql = "SELECT email from user where user_name = '{$user_name}'";
        $res = $this->database->fetch_result($sql);
        if ($res != null) {
            return 'false';
        }
        return 'true';
    }

    public function user_email_taken($email) {
        $email = $this->database->poof($email);
        $sql = "SELECT email from user where email = '{$email}'";
        $res = $this->database->fetch_result($sql);
        if ($res != null) {

            return 'false';
        }
        return 'true';
    }

}
