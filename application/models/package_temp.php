<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/19/2016
 * Time: 2:11 PM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Package_temp extends MY_Model {

    const DB_TABLE = "Package_temp";
    const DB_TABLE_PK = "id";

    public $id;
    public $p_id;
    public $price;
    public $vat;
    public $type;
    public $qty;
    public $acc_id;
    public $last_update;
    public $discount;
    public $name;

    public function get_list(){
       $user = $this->session->userdata('logged_in');
      $this->db->where(array('acc_id'=>$user['id']));
      $this->db->order_by('last_update','DESC');

      return $this->get();

    }




  }
