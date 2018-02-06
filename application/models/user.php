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

  class User extends MY_Model {

    const DB_TABLE = "account";
    const DB_TABLE_PK = "acc_id";

    public $acc_id;
    public $pos_id;
    public $f_name;
    public $m_name;
    public $l_name;
    public $username;
    public $password;
    public $img_path;
    public $date_created;
    public $on_delete;
    public $status;

    public function is_password_exist($password = false){
      $this->db->where(array('password' => crypt(sha1($password) , sha1(strtolower('admin')))));
      $this->db->where(array('username' => 'admin'));

      return $this->get();
    }


    public function get_password($password = false, $username =false){
      $this->db->where(array(
        'password' => $password,
        'username' => $username,
      ));
//      $this->db->where(array('acc_id'=>$id));
      return $this->get();
    }

  public function get_user_by_id($id = false){
    $this->toJoin = array('Position' => 'User');
    $this->db->where('acc_id',$id);
    $this->db->where('account.on_delete IS NULL');
    return $this->get();
  }

    public function get_user_login_info($id=false){
      $this->toJoin = array('Position' => 'User');
      $this->db->where('acc_id',$id);
      return $this->get();
    }
    public function user_exist($username = FALSE) {
      $this->toJoin = array('Position' => 'User');
      $this->db->where(array('username' => $username));
      $this->db->where('account.on_delete IS NULL');
      $this->db->limit(1);

      return $this->get();
    }

    public function lists() {
      $this->toJoin = array('Position' => 'User');
      $this->db->where('account.on_delete IS NULL');
      $this->db->order_by('l_name');

      return $this->get();
    }

    public function get_user($id = FALSE) {
      $this->toJoin = array(
        'Position' => 'User'
        );
      $this->db->where(array('acc_id' => $id));
      $this->db->limit(1);

      return $this->get();
    }

    public function is_online($username =false, $password = false){
      // $this->toJoin = array('Position' => 'User');
      $this->db->where(array('username' => strtolower($username)));
      $this->db->where('account.on_delete IS NULL');
      $this->db->where('account.status',0);
      $this->db->where(array('password' => crypt(sha1($password) , sha1(strtolower($username)))));
      $this->db->limit(1);

      return $this->get();
    }

    public function login($username , $password) {
      $this->toJoin = array('position' => 'user');
      $this->db->where(array('username' => strtolower($username)));
      $this->db->where('account.on_delete IS NULL');
      $this->db->where(array('password' => crypt(sha1($password) , sha1(strtolower($username)))));
      $this->db->limit(1);

      return $this->get();
    }

    public function logout() {
      $this->session->unset_userdata('logged_in');
      $this->session->sess_destroy();
      redirect('dashboard' , 'refresh');
    }


    /*
    test function for direct query to database tables
    */
    public function users() {
      $this->db->select('username, password');
      $this->db->from('account');
      $this->db->limit(1);
      $query = $this->db->get();

      if ($query->num_rows() == 1) {
        return $query->result();
      } else {
        return FALSE;
      }

    }

  }