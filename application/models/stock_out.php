<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/19/2016
 * Time: 2:11 PM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Stock_out extends MY_Model {

    const DB_TABLE = "stock_out";
    const DB_TABLE_PK = "stock_out_id";

    public $stock_out_id;
    public $bc_id;
    public $acc_id;
    public $quantity;

    public function get_list(){
      $user_id = $this->session->userdata('logged_in');
      $this->db->where('acc_id',$user_id['id']);
      return $this->get();
    }



  }
