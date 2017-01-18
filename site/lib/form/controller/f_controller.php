<?php

namespace lib\form\controller;
/*
 * 
 */

use lib\session as session;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class f_controller extends \lib\form\form {

    private $form_method;
    private $instance_queue;
    private $form_id;

    /**
     * 
     * @param String $form_id $form_id is used to required to get that Exact form in the validation Process;
     */
    function __construct($form_id, $action, $method, $enctype = 'application/x-www-form-urlencoded') {
        parent::__construct();
        $this->form_id = $form_id;
        $this->form_data['header']['action'] = $action;
        $this->form_data['header']['method'] = $method;
        $this->form_data['header']['enctype'] = $enctype;
        // $this->instance_queue= new Ds\Queue(); 
    }

    /**
     * 
     * @param type $type text/email/password
     * @param type $name required to access the data in php
     * @param type $requirement
     */
    public function addFields($type, $name, $required = "required") {

        array_push($this->form_data['type'], $type);
        array_push($this->form_data['name'], $name);
        return array_push($this->form_data['required'], $required);
    }

    function __destruct() {
        array_push($this->form_data['type'], "submit");
        array_push($this->form_data['name'], $this->form_id);
        session::set_session($this->form_id, serialize($this->form_data));
    }

}
