<?php

namespace lib;

use lib\annonymus_functions as annonymus_functions;
use controllers;
use lib\Exceptions\E_404 as E_404;

if (!defined('LANDING_PAGE')) {
    exit('No direct script access allowed');
}
require 'Exceptions/E_404.php';

/**
 * This is the Bootstrap Class where All the URL Construction Logic Works
 */
class bootstrap {

    private $namse_space = "controllers\\";
    private $get_keys;
    public $client_ip;
    private $url;

    function __construct() {
        $this->client_ip = (new annonymus_functions())->getRealIpAddr();


        if (isset($_GET['url'])) {
            $this->url = $_GET['url'];
            unset($_GET['url']);
            $url = explode("/", trim($this->url));

            if ($url[sizeof($url) - 1] == "") {

                unset($url[sizeof($url) - 1]);
            }

            try {
                self::_ignite($url);
            } catch (E_404 $e) {
                $e->message($this->url);
            }
        } else {
            if (isset($_SESSION['id'])) {
                // Search and Load Default User Account Page
                define("IF_AJAX", false);
                annonymus_functions::redirect(LANDING_PAGE . "/" . session::$user_name);
                die();
            } else {
                // Load Landing Page
                define("IF_AJAX", false);
                $landing_page = new controllers\index($this->parse());
                $landing_page->view_loader();
            }
        }
    }

// End of constructor Function 

    private function _ignite($url) {
//        if (isset($url[1]) && $url[1] != null) {
//            $ajax_class = $url[0] . "/" . $url[1];
//            define("IF_AJAX", if_ajax($ajax_class));
//            if (IF_AJAX) {
//                global $ROUTEAjax;
//                require 'controllers/' . $url[0] . '.php';
//                call_user_func($ROUTEAjax[$ajax_class]);
//            }
//        }// End of isset($url[1]) && $url[1]!=null

        if (file_exists("controllers/" . $url[0] . ".php")) {
            define("IF_AJAX", false);
            $c = 'controllers\\' . $url[0];
            $c = new $c();
            switch (TRUE) {
                case (isset($url[1]) && isset($url[2]) && isset($url[3])):
                    if (method_exists($c, $url[1], $url[2], $url[3]) && (new ReflectionMethod($c, $url[1], $url[2], $url[3]))->isPublic()) {

                        $c->$url[1]($this->parse(), $url[2], $url[3]);
                        $c->view_loader();
                    } else {
                        throw new E_404();
                        echo "Method Not Found";
                    }
                    break;
                case (isset($url[1]) && isset($url[2])):
                    if (method_exists($c, $url[1], $url[2]) && (new \ReflectionMethod($c, $url[1], $url[2]))->isPublic()) {

                        $c->$url[1]($this->parse(), $url[2]);
                        $c->view_loader();
                    } else {
                        throw new E_404();
                        echo "Method Not Found";
                    }

                    break;
                case(isset($url[1])):

                    if (method_exists($c, $url[1]) && (new \ReflectionMethod($c, $url[1]))->isPublic()) {

                        $c->$url[1]($this->parse());
                        $c->view_loader();
                    } else {
                        throw new E_404();
                        echo "Method Not Found";
                    }

                    break;
                default:
                    $c->_load_constroctor_details();
                    $c->view_loader();
                    echo "Only Constructor ran";
                    break;
            }
        }// End of 
        else {

            throw new E_404();
        }
    }

    private function parse() {
        if (isset($_GET)) {
            return $gets = $_GET;
        }
        return null;
    }

}

//End of class