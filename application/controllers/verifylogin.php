<?php
/**
 * Created by PhpStorm.
 * User: RedZ
 * Date: 03/04/2016
 * Time: 10:09 AM
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Verifylogin extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('user','',TRUE);
    if($this->session->userdata('logged_in')){
      redirect('sell' , 'refresh');
    }
  }

  public function index() {
    $this->load->helper(array('form'));
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username' , 'Username' , 'trim|required');
    $this->form_validation->set_rules('password' , 'Password' , 'trim|required|callback_check_database');

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Login';
      $this->load->view('login/login_view');
    } else {
       
        $user = $this->session->userdata('logged_in');
        $this->load->model('user_accessibility_option');

        // redirect to the first module given
        $access = new user_accessibility_option();
        if(!empty($access->assign_mod($user['id']))){
            foreach ($access->assign_mod($user['id']) as $temp) {
             if(strtolower($temp->module_name) ==   strtolower('profile')){
               redirect( $temp->link, 'refresh');
               }
               else{
                 redirect( $temp->module_name, 'refresh');
               }
            }
        }
       
    }
  }

  function check_database($password) {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');

    $u = new User();
    // if(empty($u->is_online($username, $password))){
    // $this->form_validation->set_message('check_database' , 'You are already login to other device');
    //     return FALSE;
    // }
      
    
      if(!empty($u->login($username,$password))){
        foreach($u->login($username,$password) as $user){
          $data = array(
            'id'=>$user->acc_id,
            'position'=>$user->position,
            'login'=> date('F d, Y | h:i:s A')
          );
        }
        $this->session->set_userdata('logged_in' , $data);
        $user = $this->session->userdata('logged_in');
        
        $u = new User();
        $u->load($user['id']);
        $u->status = 1;
        $u->save();

      }
      else{
          $this->form_validation->set_message('check_database' , 'Invalid username or password');
        return FALSE;
      }

  }

}