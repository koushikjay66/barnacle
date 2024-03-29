<?php

namespace controllers;

/**
 * 
 * This is the Default Post Class. 
 * Responsible for showing all the post, Editing all the Post, see draft  
 * version of the Post, 
 * Contains some static method. 
 */
class post extends \lib\controller {

    private $class_name = 'post';
    private $user_name;

    function __construct($user_name = null) {
        parent::__construct($this->class_name);
    }

    public function _load_constroctor_details() {
        
    }

    /**
     * URL : http://www.barnacle.com/post/view/tuntuni_post?refer=www.facebook.com
     *
     * 	INPUT: post_id , and all the get requested variables contained in an named array.
     *   Also Require all the Comment and their Reply and 
     * 	OUTPUT: HTML generated View of the POST 
     *   
     */
    public function view($post_id) {
        try {
            
        } catch (lib\Exceptions\E_404 $e) {
            $e->message("Could Not fin");
        }
    }

// End of cuntion view

    /**
     * URL : http://www.barnacle.com/post/edit/tuntuni_post
     *
     * Allowes the "AUTHOR" to edit the particular post".
     * 
     * INPUT: post_id, $get variable should not be present here. If presented but the program should ignore it. 
     * 
     *  After Editing Author Should be able to Upload it or save a draft to it. So a $_FILE $_POST parameter may be checked.
     * Allowed only if teh session has been started. Otherwise redirect User to LogIn Page
     *  
     * OUTPUT: If the User didn't set any Upload File Parameter 
     */
    public function edit($post_id) {
        parent::permission_checker();
    }

// End of cuntion view

    /**
     * Caution "AUTHOR" can only remove the POST
     * OUTPUT: After successful deletation, redirect USER to home page
     */
    public function remove($post_id) {
        
    }

// End of function remove

    /**
     * 				Asynchronous Call
     * Input: Follwer name hint   of the author in get variable $_GET['hint'], and $_POST['']
     * Searches throughout the database for that name hint
     * OUTPUT : List of suggested user name and user ID Link.
     */
    public static function add_contributor() {
        if (!IF_AJAX) {
            echo 'You do not have permission to access this Site';
            die();
        }
    }

//End of function add_contributor

    /**
     * 					Asynchronous Call
     * Input: Former Contributor name  in get variable $_GET['']
     * OUTPUT : True/False returns to the AJAX function to inform author about the *     Change
     */
    public static function delete_contributor($gets) {
        
    }

// End of functiond delete_contributor

    /**
     * URL: www.barnacle.com/post/publish
     * When you Click to submit a story , it will send a  
     */
    public function publish($post_id) {
        
    }

// End of function publish

    public function draft($post_id) {
        
    }

// End of function draft

    public static function upload() {
        
    }

// End of class upload

    private function getContributors() {

        //input : post_id
        //output : contributors user names
    }

//end of function getcontributor

    public function view_loader() {

        parent::_view();
    }

}
