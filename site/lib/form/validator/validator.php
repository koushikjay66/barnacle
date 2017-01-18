<?php

namespace lib\form\validator;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class validator {

    private $form_validator = array();

    function __construct($form_id) {
        $this->form_validator = unserialize(session::get_session($form_id));
        session::unset_session($form_id);
    }

}
