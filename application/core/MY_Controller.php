<?php
  /**
   * @Author: Redz
   * @Date:   2016-01-01 11:55:18
   * @Last Modified by:   khrey
   * @Last Modified time: 2015-08-13 17:13:42
   */
  /**
   *
   */

  defined('BASEPATH') OR exit('No direct script access allowed');

  class MY_Controller extends CI_Controller {

    public $userInfo = array();

    public function __construct() {

      parent::__construct();

      $this->load->model('Company_model');
      
      if (!$this->session->userdata('logged_in')) {
        redirect('login' , 'refresh');
      }
      foreach ($this->get_login_info() as $info) {
        $this->userInfo = array(
          'fname' => $info->f_name ,
          'midname' => $info->m_name ,
          'lastname' => $info->l_name ,
          'username' => $info->username ,
          'password' => $info->password ,
          'image' => $info->img_path ,
          'position' => $info->position ,
          'id' => $info->acc_id,
        );
      }
        $com = new Company_model();
        foreach ($com->get() as $temp) {
          $data  = $temp->logo;
        }
        $this->userInfo['company'] = $data;

    }

    protected function generate_transcode(){
      
      $this->load->model('trans_code');
      
      $t = new trans_code();

      $code = 0;

      if(!empty($t->last_code())){
          foreach ($t->last_code() as $temp) {
            $data =array(
              'code'=>$temp->t_code
              );
          }
          $code = $data['code'] + 1;
      }
      else{
        $code = 1;
      }

      return  str_pad($code, 6, '0', STR_PAD_LEFT);;

    }

    public function get_menu(){

      $this->load->model('user_accessibility_option');
      $this->load->model('module_list');

      $menu = new module_list();
      $user_access = new user_accessibility_option();

      $menu_list = '';
      foreach ($menu->get() as $key => $value) {

        if($this->check_module($value->mod_id)){
   
          $menu_list .='<li class="has-sub">';
          $menu_list .='  <a href="javascript:;">';
          $menu_list .='    <b class="caret pull-right"></b>';
          $menu_list .='    <i class="'.$value->icon.'"></i>';
          $menu_list .='    <span>'.ucwords($value->module_name).'</span>';
          $menu_list .=' </a>';
          $menu_list .=' <ul class="sub-menu">';

              foreach ($user_access->get_menu($value->mod_id) as $temp) {
                $menu_list .='<li>'.anchor($temp->link,ucwords($temp->menu)).'</li>';
              }
              
         $menu_list .= ' </ul>';
         $menu_list .= '</li>';
          
        }
        else{

        }
      }



      return $menu_list;

    }

    private function check_module($id = false){
       $user = $this->session->userdata('logged_in');
       $user_id = $user['id'];
      $query = $this->db->query("SELECT * FROM module_list, access_menu,user_accessibility_option
        WHERE module_list.mod_id = '{$id}'
        AND module_list.mod_id = access_menu.mod_id
        AND access_menu.am_id = user_accessibility_option.am_id
        AND user_accessibility_option.acc_id = '$user_id'
        ORDER BY user_accessibility_option.am_id ASC
        ");

        $result = $query->result();
        if (!empty($result)) {
          return true;
        }
        else{
          return false;
        }

            }

 public function do_upload($filename=false,$path = false) {
      $config['upload_path'] = './uploads/'.$path;
      $config['allowed_types'] = 'gif|jpg|png';
      $config['encrypt_name'] = TRUE;

//      $config['max_size'] = 100;
//      $config['max_width'] = 1024;  
//      $config['max_height'] = 768;

      $this->load->library('upload' , $config);

      if (!$this->upload->do_upload($filename)) {
//        $error = array('error' => $this->upload->display_errors());

//        $this->load->view('upload_form' , $error);
      } else {
        $data = array('upload_data' => $this->upload->data());

//        $this->load->view('upload_success' , $data);
      }
    }


    public function get_login_info() {
      $user_id = $this->session->userdata('logged_in');
      $this->load->model('user');

      return $this->user->get_user_login_info($user_id['id']);
    }


  }

  /* End of file MY_Controller.php */
  /* Location: ./application/core/MY_Controller.php */    