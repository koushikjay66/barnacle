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

        $directory = "C:\\xampp\\htdocs\\storage\\image\\" .
                substr($file_name, 0, 2) .
                '\\' . substr($file_name, 2, 2) .
                '\\' . substr($file_name, 4, 2) .
                '\\' . substr($file_name, 6) . ".jpg";



        if (file_exists($directory)) {
            header('Content-type:image/jpg');
            header('Content-Length: ' . filesize($directory));
            readfile($directory);
            return true;
        }
        return false;
    }

    public function upload($name) {
        $temp_name = $_FILES[$name];
        $file_size = getimagesize($_FILES[$name]["tmp_name"]);
        if (!$file_size) {
            return false;
        }

        // $md5_value = md5(session::$user_id . "image" . (get_total() + 1));
        $md5_value = md5("tuntuni" . "image" . ($this->get_total() + 1));
        $directory = "C:\\xampp\\htdocs\\storage\\image\\" .
                substr($md5_value, 0, 2) .
                '\\' . substr($md5_value, 2, 2) .
                '\\' . substr($md5_value, 4, 2);
        if (!mkdir($directory, 0777, true)) {
            return false;
        }
        $directory .= '\\' . substr($md5_value, 6) . ".jpg";

        if (file_exists($directory)) {
            return false;
        }
        if (move_uploaded_file($_FILES[$name]["tmp_name"], $directory)) {
            chmod($directory, 0644);
            return true;
        }
        return false;
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

        return (int) $res;
    }

}
