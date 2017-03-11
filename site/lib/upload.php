<?php

namespace lib;

/**
 * This is the Default CLASS for uploading all sorts of things 
 */
class upload {
    /*
     * File type array contains the necessary upload allowed formats
     */

    private $file_type = array("image/jpg", "text/html");
    private $file_location = null;
    private $directory = "C:\\xampp\\htdocs\\storage\\";

    function __construct($name) {
        $this->file_location = $_FILES[$name]['tmp_name'];
    }

    /*
     * @param $name_of_the_file - For Image this is just the total_upload_images+1 value
     * @return mixed
     */

    public function _do($file_type, $name_of_the_file) {
        /*
         * If this is a file type of image then call image Upload Function.
         */
         if (mime_content_type($this->file_location) != $this->file_type[$name_of_the_file]) {
            return false;
        }
        if ($file_type == 0) {
            return $this->image_upload($name_of_the_file);
        }else if($file_type==1){
            return $this->text_upload($name_of_the_file);
        }
    }

    /*
     * Image Upload Sudo Code 
     * 1. First checks if this is an image if not return false
     * 2. Upload file type is allowed if not return false
     * 3. Generate new File Name
     * 4. Return _process()
     * @param 
     */

    private function image_upload($name_of_the_file) {
        $file_size = getimagesize($this->file_location);
        if (!$file_size) {
            return false;
        }
        $md5_value = md5(session::$user_id . 'image' . $name_of_the_file);
        $save_to = $this->directory . "image\\" . substr($md5_value, 0, 2) .
                '\\' . substr($md5_value, 2, 2) .
                '\\' . substr($md5_value, 4, 2);
        return $this->_process($save_to, $md5_value(substr($md5_value, 6) . ".jpg"));
    }

    /*
     * text_upload Sudo Code
     * 1. Upload file type matches with the specific file_name else return false
     * 2. 
     */
    private function text_upload($name_of_the_file) {
       
         $md5_value = md5(session::$user_id . 'post' . $name_of_the_file);
        $save_to = $this->directory . "post\\" . substr($md5_value, 0, 2) .
                '\\' . substr($md5_value, 2, 2) .
                '\\' . substr($md5_value, 4, 2);
        return $this->_process($save_to, $md5_value(substr($md5_value, 6) . ".txt"));
        
    }

    /*
     * Sudo code: _process
     * 1.tries to create directory, on failure return false
     * 2. Cheks of the file already exists, if then return false
     * 3. move files with renamed in the specific directory, if faild return false
     * 4. set non executable permission for everyone 
     */
    private function _process($directory_name, $file_name) {
        if (!mkdir($directory_name)) {
            return false;
        }
        if (file_exists($directory_name . "\\" . $file_name)) {
            return false;
        }
        if (move_uploaded_file($this->file_location, $directory_name . "\\" . $file_name)) {
            chmod($directory_name, 0644);
            return true;
        }
    }

}
