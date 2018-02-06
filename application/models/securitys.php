<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Securitys extends MY_Model {
  public function __construct() {
    parent::__construct();
  }

  public function verify_login($username = '' , $password = '') {
    $user = new Users;
    $search = $user->search(array('username' => $username , 'password' => $password));
    if (count($search) > 0) {
      return reset($search);
    }
    return false;
  }

  public function login($user = false) {
    $array = array(
      'DP_USER_ID' => $user->employee_id ,
    );
    $this->session->set_userdata($array);
  }

  public function whose_logged() {
    if ($this->session->userdata('DP_USER_ID')) {
      $this->load->model('employee');
      $emp = new Employee;
      $emp->load($this->session->userdata('DP_USER_ID'));
      return $emp;
    }
    return false;
  }

  public function redirect_user() {
    if ($this->whose_logged() && $this->uri->segment(1) != 'admin') {
      redirect('/admin/home' , 'refresh');
    } else {
      if (!$this->whose_logged() && $this->uri->segment(1) == 'admin') {
        redirect('/login' , 'refresh');
      }
    }
  }

  public function logout() {
    $this->session->unset_userdata('DP_USER_ID');
    $this->redirect_user();
  }
}