<?php

namespace controllers;

use lib\controller as controller;

if (!defined('LANDING_PAGE')) {
    exit('No direct script access allowed');
}

/**
 * This is the Default Landing Page
 */
class index extends controller {

    private $class_name = 'index';

    function __construct($arg = null) {
        
        parent::__construct($this->class_name);

        $this->static_contents();
    }

    public function _load_constroctor_details() {
        
    }

// End of function mose_view_projects

    private function static_contents() {

        parent::set_view(__FUNCTION__, $this->class_name . '/' . "static_contents" . '/index.php');
    }

    /**
     * This must be present in all the things.
     */
    public function view_loader() {

        parent::_view();
    }

// End of view_loader
}
