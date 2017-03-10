<?php

namespace model;

use lib\model as model;
use lib\session as session;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class media extends model {

    function __construct() {
        parent::__construct();
    }

    public function get($file_name) {
     
    $directory="C:\\xampp\\htdocs\\storage\\image\\". 
            substr($file_name, 0, 2).
            '\\'.substr($file_name, 2, 2). 
            '\\'.substr($file_name, 4, 2).
            '\\'.substr($file_name, 6).".jpg";
   
   
    
       if(file_exists($directory)){
           header('Content-type:image/jpg');
           header('Content-Length: ' . filesize($directory));
           readfile($directory);
           return true;
       }
       return false;
    }
    
    public function upload($name){
        $temp_name=$_FILES[$name];
        var_dump($_FILES[$name]);
    }

    public function get_total() {
        session::$user_id = "koushikjay66";
        $this->openDB();
        # Ow ... This is also a comment !
        $user = session::$user_id;
        $sql = "SELECT total_media FROM user where user_id= '{$user}'";
        $res = "20";
        //$res = $this->database->fetch_result($sql);
        if ($res == null) {
           
            return false;
        }
        
        return (int)$res;
    }
    
    

}
