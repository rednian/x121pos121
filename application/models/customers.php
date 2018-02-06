<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/7/2016
 * Time: 4:15 PM
 */
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Customers extends MY_Model {

  const DB_TABLE = "customer_info";
  const DB_TABLE_PK = "cus_id";


  public $cus_id;
  public $fname;
  public $lname;
  public $contact;
  public $block;
  public $lot_num;
  public $street;
  public $brgy;
  public $city;
  public $zipcode;
  public $province;
  public $country;


  public function lists() {
    $this->db->order_by('lname');
    return $this->get();
  }

  public function limit8() {
    $this->db->order_by('cus_id','DESC');
    $this->db->limit(8);
    return $this->get();
  }


}