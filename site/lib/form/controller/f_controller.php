<?php

namespace lib\form\controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class f_controller extends \lib\form\form {
    private $form_data=array();
    private $form_method;
    private $instance_queue;
    private $form_id;
    /**
     * 
     * @param String $form_id $form_id is used to required to get that Exact form in the validation Process;
     */
    function __construct($form_id, $action, $method) {
        parent::__construct();
        $this->form_id=$form_id;
       // $this->instance_queue= new Ds\Queue(); 
    }
    
    /**
     * 
     * @param type $type text/email/password
     * @param type $name required to access the data in php
     * @param type $requirement
     */
    public function addFields($type, $name, $requirement="required"){
        array_push($this->form_data['type'], $type);
        array_push($this->form_data['name'], $name);
        return array_push($this->form_data['required'], $required);
    }
    public function addMFields(){
        
        
    }
    
    function __destruct() {
        array_push($this->form_data['type'], "submit");
        array_push($this->form_data['name'], $this->form_id);
       $se = serialize($this->form_data);
        
        var_dump(unserialize($se));
    }

}
