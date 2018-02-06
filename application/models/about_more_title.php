<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/21/2016
 * Time: 3:45 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_more_title extends MY_Model{

  const DB_TABLE = "about_more_title";
  const DB_TABLE_PK = "t_id";

  public $t_id;
  public $title;
  public $description;


public function get_title(){

// $this->db->select('title');
// $this->db->from('about_more_title');
  $this->db->order_by('title');
  return $this->get();
}

  public function get_proprietor(){
    $this->toJoin = array(
      'about_more_images'=>'about_more_title'
    );
    $this->db->where('title','The Proprietor');
    return $this->get();
  }

  public function get_team(){
    $this->db->where('title','Our Team');
    return $this->get();
  }

  public function get_product(){
    $this->db->where('title','Our Products');
    return $this->get();
  }

  public function get_service(){
    $this->db->where('title','Our Services');
    return $this->get();
  }

  public function get_customer_detail(){
    $this->db->where('title','Our Customers');
    return $this->get();
  }


}