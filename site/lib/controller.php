<?php

namespace lib;

use model;

/**
 * This is the main controller class
 */
abstract class controller {

    protected $model;
    protected $view;
    private $view_array;
    private $child;
    private $class_name;

    function __construct($class_name) {
        $str = "model\\" . $class_name;
        $this->model = new $str();
        //$this->view_array= array();
        $this->view = new view();
        $this->child = $class_name;
    }

// end of constructor function 

    /**
     * You must need to implement this method. In any case it is not implemented then there will be an error thrown . 
     */
    abstract protected function _load_constroctor_details();

    /**
     * For Some page access we need to check if the user is loggen in . If not logged in we need to send user back to 
     * the login page. 
     */
    protected function permission_checker() {
        if (!isset($_SESSION['id'])) {

            // Then we need to redirect user to login page
            self::redirect(LANDING_PAGE);
        }
    }

// End of function permission_checker

    protected static function redirect($url) {
        header("Location: " . $url);
    }

// ENd of function redirec5t

    protected function set_view($view_name, $view_file_location) {
        $this->view_array[$view_name] = $view_file_location;
        //array_push($this->view_array, $view_name);
    }

    protected function _view() {
        $this->set_view("footer", 'footer/index.php');

        if (IF_AJAX) {
            unset($this->view_array['header']);
            unset($this->view_array['footer']);
        }

        foreach ($this->view_array as $key => $value) {
            $this->view->render($value);
        }
        // for ($i=0; $i < sizeof(array_keys(sizeof($this->view_array))); $i++) { 
        // 	$this->view->render($this->view_array[]);
        // }
    }

// End of function view_loader

    abstract protected function view_loader();
}

// End of class