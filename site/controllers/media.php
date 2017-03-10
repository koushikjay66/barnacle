<?php

namespace controllers;

use lib\controller as controller;
use lib\session as session;

/**
 * 
 */
class media extends controller {

    private $class_name = "media";
    private $total_media;
    private $upload_submission = "upload";
    private $upload_file = "upload_file";

    function __construct() {
        parent::__construct($this->class_name);
        if (!isset(session::$user_id)) {
            //die('Log in first');
        }
    }

    public static function load_propic($user_name = null) {
        
    }

// End function load_propic

    /**
     * Input : upload Media Form
     * Output : Sends Media link in view Format to ajax
     */
    public function upload() {
        if (!isset(session::$user_id)) {
            echo 'Not Logged In';
            // die();
        }
        if (!isset($this->post[$this->upload_submission]) || !isset($_FILES[$this->upload_file])) {
            echo 'Error Not Ment this';
            $this->set_view('login', 'media/upload/index.php');
            $this->view->action = "http://localhost/barnacle/site/login";
            $this->view->method = "POST";
            //die();
        } else {
            $res=$this->model->upload($this->upload_file);
            if(!$res){
                echo 'Error';
            }else{
                return false;
            }
        }
    }

// Upload all the files here
    public function get($user = session::user_id, $file_number = 0) {
        $file_name = md5($user . "image" . $file_number);
        $res = $this->model->get($file_name);
        if ($res) {
           // echo 'Exists';
            die();
        } else {
            echo 'Khanki';
        }
    }

    public function media_view() {
        
    }

// End of function upload_view
    // Only called by media_view
    public function get_list() {

        $this->get_total();

        if ($this->total_media == false) {
            echo 'false';
            die();
        }
        echo json_encode(array("user_id" => session::$user_id, "total" => $this->total_media));
    }

// End of function get_list

    private function get_total() {
        $this->total_media = $this->model->get_total();
    }

// End of get_media_uri

    /**
     * This must be present in all the things.
     */
    public function view_loader() {

        parent::_view();
    }

    public function sample($file_number) {

        $user_id = "koushikjay66";
       for($i=1; $i<=$file_number; $i++){
           
            $file_name = md5($user_id . "image" . $i);
        $directory = "C:\\xampp\\htdocs\\storage\\image\\" .
                substr($file_name, 0, 2) .
                '\\' . substr($file_name, 2, 2) .
                '\\' . substr($file_name, 4, 2);
        // '\\'.substr($file_name, 6);
        mkdir($directory, 0777, true);
        $im = imagecreatetruecolor(120, 20);
        $text_color = imagecolorallocate($im, 233, 14, 91);
        imagestring($im, 1, 5, 5,  "This is for image number ".$i, $text_color);
        copy("C:\\Users\\koush\\Pictures\\mini.jpg", $directory.'\\'.substr($file_name, 6).".jpg");
       }
        
        
    }

    public function _load_constroctor_details() {
        
    }

}
