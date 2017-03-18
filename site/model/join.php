<?php

namespace model;

use lib\model as model;

/**
 * 
 */
class join extends model {

    function __construct() {
       
       
    }

    /*
     * @Input : Signup vars 
     */

    public function signup($args) {
        /*
         * List of Required Variables for Signup to complete
         * And for each variable Name there is an associated 
         * Regex to match
         * I will write the regex and regex checking function later . 
         * Just create the array 
         */

        $validator = array('f_name' => 'Regex Here',
            'l_name' => 'l_name',
            'u_email' => 'u_user_name',
            'u_name' => 'u_name',
            'u_password' => 'u_password'
        );

        /*
         * Great, Now check if they match with thing and all the key exists
         */

        foreach ($validator as $key => $value) {
            if (key_exists($key, $args) && $this->validator($args[$key], $validator[$key])) {
                $validator[$key] = $args[$key];
            } else {

                return 'Please fill Up the form correctly';
            }
        }

        /*
         * Now We Need to do MYSQLI real scape string 
         */
        $this->openDB();
        foreach ($validator as $key => $value) {
            $validator[$key] = $this->database->poof($value);
        }

        /*
         * Now checking is done ,Second step is 
         */

        if (!$this->user_email_taken($validator['u_user_name'])) {

            return 'User Email address is already taken. Please choose anotehr One';
        }
        if (!$this->user_name_taken($validator['u_name'])) {

            return 'User Name is taken Please choose anoter One';
        }
        $validator['user_id'] = $this->database->last_insertedid() + 1;
        $validator['u_password'] = $this->generate_hash($validator['u_password']);
        $user_id = $this->database->last_insertedid()+1;
        $sql = "INSERT INTO user "
                . "(iduser, user_name, first_name, last_name, email, password) "
                . "values({$validator["user_id"]}, '{$validator["u_name"]}', "
                . "'{$validator["f_name"]}', '{$validator["l_name"]}', '{$validator["u_user_name"]}', '{$validator["u_password"]}')";

        $res = $this->database->perform_query($sql);
        
        if ($res != true) {
            return 'Database Insertion Prible';
        }

        return true;
    }

    public function login($args) {
        /*
         * Like Signup we need validator Array. 
         */
        $validator = array('u_email' => 'Regex Here',
            'u_password' => 'Regex Here'
        );

        foreach ($validator as $key => $value) {
            if (key_exists($key, $args) && $this->validator($args[$key], $validator[$key])) {
                $validator[$key] = $args[$key];
            } else {
                return "Please fill up the form correctly";
            }
        }
        echo $validator['u_email'];
        $valdator['u_password'] = $this->generate_hash($validator['u_password']);
        $sql = "SELECT iduser, user_name, email FROM user where ( email='{$validator['u_email']}' OR "
                . "user_name= '{$validator['u_email']}' ) AND password='{$valdator['u_password']}'";
        echo $sql;
    }

    private function generate_hash($password) {
        $hash_format = "$2y$11$";
        $salt = "amarektanodiacheNirjon";
        $format_salt = $hash_format . $salt;
        $hashed = crypt($password, $format_salt);
        return $hashed;
    }

    private function validator($string, $conditions) {

        return true;
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

            return false;
        }
        return true;
    }

}
