<?php
namespace lib\Exceptions;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class E_404 extends Exception {

    private $view;

    function __construct() {

        parent::__construct("File Not Found", "404");
        $this->view = new view();
    }

// End of constructor 

    private function action() {
        echo 'We Dont have that File';
    }

// End of function action 

    public function message($input_URL) {
        $this->view->url = '/' . $input_URL;
        $this->view->render("error/E_404.php");
        return "We Dont have any page";
    }

}
