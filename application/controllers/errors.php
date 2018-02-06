<?php
/**
 * Created by PhpStorm.
 * User: RedZ
 * Date: 22/02/2016
 * Time: 11:20 AM
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends MY_Controller {

  /**
   *display the main dashboard
   */
  // public function index(){
  // 	echo 1;
  // }
  public function error_404() {

    $data['title'] = 'Error 404';
    $this->load->view('templates/header',$data);
    $this->load->view('error/page_404');
  }
}
