<?php

namespace model;

use lib\model as model;

/**
 * 
 */
class login extends model {

    function __construct() {
        parent::__construct();
    }
    
    public function authenticate($user_name, $password){
        $user_name=$this->database->poof($user_name);
        $password=$this->database->poof($password);
        $sql="SELECT iduser, user_name FROM user WHERE password='{$password}' && "
        . "(user_name='{$user_name}' OR email='{$user_name}') LIMIT 1";
        $res=$this->database->fetch_result($sql);
        if($res==null){
            return false;
            
        }
        return $res;
    }// End of function authenticate

}
