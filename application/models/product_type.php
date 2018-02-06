<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/17/2016
 * Time: 3:05 PM
 */
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Product_type extends MY_Model {

  const DB_TABLE = "product_type";
  const DB_TABLE_PK = "prod_type_id";

  public $prod_type_id;
  public $prod_type;
  public $prod_type_image;
  public $prod_type_desc;

  public function get_type($type=false){
    $this->db->where(array('prod_type'=>$type));
    return $this->get();
  }


}

