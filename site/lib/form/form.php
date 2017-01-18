<?php

namespace lib\form;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class form {

    protected $form_data = array();

    function __construct() {
        
        $this->form_data['header'] = array();
        $this->form_data['type'] = array();
        $this->form_data['name'] = array();
        $this->form_data['required'] = array();
    }

}
