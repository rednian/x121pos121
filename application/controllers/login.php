<?php
  /**
   * Created by PhpStorm.
   * User: RedZ
   * Date: 21/02/2016
   * Time: 12:23 PM
   */
  if (!defined('BASEPATH')) {exit('No direct script access allowed');}
  class Login extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('user' , '' , TRUE);

     if($this->session->userdata('logged_in')){
        
      $user = $this->session->userdata('logged_in');

      $this->load->model('user_accessibility_option');

      // redirect to the first module given
      $access = new user_accessibility_option();

      if(!empty($access->assign_mod($user['id']))){
          foreach ($access->assign_mod($user['id']) as $temp) {

            if(strtolower($user['position']) == strtolower('cashier ')){

            }
          
            if(strtolower($temp->module_name) == strtolower('profile')){
            redirect( $temp->link, 'refresh');
            }
            else{
              redirect( $temp->module_name, 'refresh');
            }

           
          }
      }

     }
    }

    public function index(){
      $this->load->helper(array('form'));
      $this->load->view('login/login_view');
    }
    
  }
