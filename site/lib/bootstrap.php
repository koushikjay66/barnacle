<?php

namespace lib;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (!defined("LANDING_PAGE")) {
    die('No Direct Access is allowed');
}

class bootstrap {

    private $name_space = "controllers\\";
    public $client_ip;
    private $url;
    private $get = null;
    private $post = null;

    function __construct() {
        $this->client_ip = (new \lib\annonymus_functions())->getRealIpAddr();
        if (isset($_GET['url'])) {
            $this->url = $_GET['url'];
            unset($_GET['url']);
            $this->url = explode("/", trim($this->url));

            /**
             *  if there is an trailing /, We need to remove it
             */
            if ($this->url[sizeof($this->url) - 1] == "") {

                unset($this->url[sizeof($this->url) - 1]);
            }
            try {

                $this->_ignite($this->url);
            } catch (lib\Exceptions\E_404 $e) {

                echo 'Ha Ha ';
            }
        } elseif (isset(session::$user_id) && !isset($_GET['url'])) {

            $c = new \controllers\home(session::$user_name);
        } else {

            $c = new \controllers\index();
        }
    }

    public function _ignite(& $url) {

        global $route;
        $c = null;
        /*
         * This is for the starting position of the user inputted URL list. 
         * If the request is from AJAX then URL link change to ajax/class_name/method/method_arg
         * So we increase every value by One
         */
        $parsing_starts = 0;
        if ($url[$parsing_starts] == 'ajax') {
            define("IF_AJAX", true);
            if(sizeof($url)==1){
                echo '404';
                die();
            }
            $parsing_starts++;
            
        } 
        if (array_key_exists($url[$parsing_starts], $route)) {

            $c = $this->name_space . $url[$parsing_starts];
            $c = new $c();
            $this->_extract_super_globals($c);
        } elseif (isset(session::$user_name) && session::$user_name == $url[0]) {
            $c = \controllers\home(session::$user_name);
            $this->_extract_super_globals($c);
        } elseif ($this->user_exists($url[$parsing_starts])) {
            $this->_extract_super_globals();
        } else {
            throw new Exceptions\E_404();
        }

        if ((defined(IF_AJAX) && $c != null && sizeof($url) > 2)|| (!defined(IF_AJAX) && $c != null && sizeof($url) > 1)) {
            echo $url[];
            $method_reply = $this->check_for_method($url[$parsing_starts], $url[$parsing_starts + 1], sizeof($url));
            if ($method_reply == false) {
                throw new Exceptions\E_404();
            } else {

                switch (TRUE) {
                    case ($method_reply[1] == 2):
                        $c->$method_reply[0]($url[$parsing_starts++], $url[$parsing_starts + 1]);
                        $c->view_loader();
                        break;
                    case ($method_reply[1] == 1):
                        $c->$method_reply[0]($url[$parsing_starts++]);
                        $c->view_loader();

                        break;
                    case($method_reply[1] == 0):
                        $c->{$method_reply[0]}();
                        $c->view_loader();
                        break;
                    default:
                        if (!defined("IF_AJAX")) {
                            $c->_load_constroctor_details();
                        }
                        $c->view_loader();
                        break;
                }
            }
        }
    }

    private function _extract_super_globals($class_reference) {

        if (isset($_GET)) {
            $this->gets = $_GET;
            $class_reference->get = $_GET;
            unset($_GET);
        }
        if (isset($_POST)) {
            $this->post = $_POST;
            $class_reference->post = $_POST;
            unset($_POST);
        }
    }

    /**
     * 
     * @author koushik Jay <koushikjay66 at gmail.com>
     * @return boolean Returns true/false based on the the User Existance
     * @param type $user_name 
     */
    private function user_exists($user_name) {

        return false;
    }

    /**
     * 
     * @param type $class_name  Name of the Class that you want to check if any callable method Exists
     * @param type $method_name Name of the Method
     * @param type $arg_count Number of agument that particular method takes
     * @return  mixed on success returns an array containing the number of argument and callable method name  
     * or on failure returns false
     */
    private function check_for_method($class_name, $method_name, $arg_count) {
        global $route;
        if (defined(IF_AJAX)) {
            $arg_count = $arg_count--;
        }
        $arg_count = $arg_count - 2;
        if (array_key_exists($method_name, $route[$class_name])) {

            if ($route[$class_name][$method_name][1] == $arg_count) {

                return $method = array($route[$class_name][$method_name][0], $route[$class_name][$method_name][1]);
            }
        }
        return false;
    }

}
