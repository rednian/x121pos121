<?php
  /**
   * Created by PhpStorm.
   * User: RedZ
   * Date: 01/03/2016
   * Time: 4:43 PM
   */

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class User_accessibility_option extends MY_Model {

    const DB_TABLE = "User_accessibility_option";
    const DB_TABLE_PK = "uao_id";

    public $uao_id;
    public $am_id;
    public $acc_id;


public function assign_mod($id=false){
       $this->toJoin = array(
        'Access_menu' => 'User_accessibility_option',
        'Module_list' => 'Access_menu',
        );
       $this->db->where(array('User_accessibility_option.acc_id'=>trim($id)));
       $this->db->limit(1);
       return $this->get();
    }


    public function get_menu($id=false){
       $user = $this->session->userdata('logged_in');
       $user_id = $user['id'];

       $query = $this->db->query("
          SELECT access_menu.* from access_menu, user_accessibility_option
          WHERE access_menu.am_id =user_accessibility_option.am_id
          AND access_menu.mod_id = '{$id}'
          AND user_accessibility_option.acc_id = '{$user_id}'
        ");

     return $query->result();


    }


    public function get_list($id=false){
       $this->toJoin = array(
        'Access_menu' => 'User_accessibility_option',
        'Module_list' => 'Access_menu',
        );
       $this->db->where(array('User_accessibility_option.acc_id'=>trim($id)));
       return $this->get();
    }


  }