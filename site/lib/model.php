<?php

namespace lib;

use lib\database as database;

/**
 * This is the mother model class
 */
class model {

    protected $database;

    function __construct() {

        // $this->database = new database();
    }

    public function openDB() {

        $this->database = new database();
    }

    /*
     * Destruct does some pretty good thing . 
     * Whenever you are about to destry this Object It is going to automatically destroy all the Object 
     * associated with it . 
     * For example : Closing the database connection 
     */

    public function __destruct() {
        if (isset($this->database)) {
            $this->database->closeConnection();
        }
    }

}
