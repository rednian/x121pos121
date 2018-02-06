<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/19/2016
 * Time: 2:11 PM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Temp_table extends MY_Model {

    const DB_TABLE = "temp_table";
    const DB_TABLE_PK = "id";

    public $id;
    public $bc_id;
    public $acc_id;
    public $discount;
    public $price;
    public $mark_up;
    public $quantity;
    public $vat;
    public $last_update;

    public function get_by_id($id = false){
      $this->db->where('id',$id);
      return $this->get();
    }


    public function get_list(){
      $user_id = $this->session->userdata('logged_in');
      $this->db->where('acc_id',$user_id['id']);
      return $this->get();
    }



  }
