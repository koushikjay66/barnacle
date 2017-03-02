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

use \lib\annonymus_functions as anno;
use lib\Exceptions\E_404 as E_404;

class new_bootstrap {

    private $name_space = "controllers\\";
    public $client_ip;
    private $url;
    private $get = null;
    private $post = null;

    function __construct() {
        /*
         * This is for getting client IP address
         */
        $this->client_ip = (new anno)->getRealIpAddr();
        /*
         * If There is get Request made from Client 
         */
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

                $this->_ignite();
            } catch (E_404 $e) {

                echo 'Ha Ha ';
            }
        } elseif (isset(session::$user_id) && !isset($_GET['url'])) {
            /*
             * IF the session is set and user did not type anything
             * Redirect User to his/her home page
             * URL:http://barnacle.com/koushikjay66
             */
            anno::redirect(BASE_URL . session::$user_name);
        } else {
            /*
             * Suppose user did not type anyting except the base URL. In that case we wnat 
             * to user go to the landing page.
             * @URL: http://barnacle.com
             */
            $c = new \controllers\index();
        }
    }

    private function _ignite() {

        global $route;
        $c = null;
        /*
         * This is for the starting position of the user inputted URL list. 
         * If the request is from AJAX then URL link change to ajax/class_name/method/method_arg
         * So we increase every value by One
         */
        $class_starts_from = 0;
        if ($this->url[0] == 'ajax') {
            /*
             * You cant only type barnacle.com/ajax 
             * Format for ajax reply is 
             * http://barnacle.com/ajax/class_name/method_name/arg1/arg2
             */
            if (sizeof($this->url) == 1) {
                echo '404';
                die();
            }
            $class_starts_from++;
            define('IF_AJAX', true);
        }
        defined('IF_AJAX') ? null : define('IF_AJAX', false);
        if (array_key_exists($this->url[$class_starts_from], $route)) {

            $c = $this->name_space . $this->url[$class_starts_from];
            $c = new $c();
            
            $this->_extract_super_globals($c);
            
        } elseif (isset(session::$user_name) && session::$user_name == $url[$class_starts_from]) {
            $c = \controllers\home(session::$user_name);
            $this->_extract_super_globals($c);
        } elseif ($this->user_exists($this->url[$class_starts_from])) {
            $this->_extract_super_globals();
        } else {
            throw new Exceptions\E_404();
        }

        if ((IF_AJAX && $c != null && sizeof($this->url) > 2) || (!IF_AJAX && $c != null && sizeof($this->url) > 1)) {
            
            $method_reply = $this->check_for_method($this->url[$class_starts_from], $this->url[$class_starts_from += 1], sizeof($this->url));
            if ($method_reply == false) {
                throw new E_404();
            } else {
                switch (TRUE) {
                    case ($method_reply[1] == 2):
                        $c->$method_reply[0]($url[++$class_starts_from], $url[$class_starts_from + 1]);

                        break;
                    case ($method_reply[1] == 1):
                        $c->$method_reply[0]($this->url[++$class_starts_from]);

                        break;
                    case($method_reply[1] == 0):
                        $c->{$method_reply[0]}();

                        break;
                    default:
                        throw new Exceptions\E_404();
                }
            }
        }
        
        if (!IF_AJAX && sizeof($this->url)==1) {
            echo 'This will not be entered <br>';
            $c->_load_constroctor_details();
        }
        $c->view_loader();
    }

    private function _extract_super_globals($class_reference) {

        if (isset($_GET)) {
            $class_reference->get = $_GET;
            unset($_GET);
        }
        if (isset($_POST)) {
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
    private function check_for_method($class_name, $method_name, $arg_count) {
        global $route;
        if (IF_AJAX) {
            $arg_count--;
        }
        $arg_count = $arg_count - 2;
        if (array_key_exists($method_name, $route[$class_name])) {

            if ($route[$class_name][$method_name][1] == $arg_count) {
                return $method = array($route[$class_name][$method_name][0], $route[$class_name][$method_name][1]);
            }
        }
        return false;
    }

    private function user_exists($user_name) {

        return false;
    }

}
