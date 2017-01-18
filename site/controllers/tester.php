<?php
namespace controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class tester{
    
  function __construct() {
      
  }
  public function tuntuni(){
      $form= new \lib\form\controller\f_controller("13101206", "WWW>GOOGLE>COM", "POST", "multipart_form_Data");
      $form->addFields("text", "jaja", "");
      
  }
  
  public function view_loader(){
      
  }
}
