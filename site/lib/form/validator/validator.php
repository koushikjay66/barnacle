<?php

namespace lib\form\validator;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use lib\session as session;

class validator extends \lib\form\form {

    private $form;
    private $form_id;

    function __construct($form_id) {
        $this->form_id = $form_id;
        $this->form = unserialize(session::get_session($form_id));
        echo '<br>';
        var_dump($this->form);
        session::unset_session($form_id);
    }

    public function validator(&$user_data) {

        // If there is an error in the expected Receiving Method
        if ($user_data == null) {
            return false;
        }
        if (!array_key_exists($this->form_id, $user_data)) {
            return false;
        }
        $keys = array_keys($user_data);
        for ($i = 0; $i < sizeof($this->form['type']); $i++) {
            
        }

        var_dump($user_data);
    }

}
