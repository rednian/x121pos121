<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/19/2016
 * Time: 2:11 PM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Service_temp extends MY_Model {

    const DB_TABLE = "Service_temp";
    const DB_TABLE_PK = "id";

    public $id;
    public $price;
    public $vat;
    public $qty;
    public $service_info_id;
    public $discount;
    public $acc_id;

    public function get_list(){
       $user = $this->session->userdata('logged_in');

      $this->toJoin =array(
        'service_info'=>'Service_temp',
        'user'=>'Service_temp'
        );
      $this->db->where(array('service_temp.acc_id'=>$user['id']));
      return $this->get();

    }

    // public function get_list(){
    //   $user_id = $this->session->userdata('logged_in');
    //   $this->db->where('acc_id',$user_id['id']);
    //   return $this->get();
    // }



  }


