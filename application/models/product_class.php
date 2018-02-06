<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/17/2016
 * Time: 4:05 PM
 */
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Product_class extends MY_Model {

  const DB_TABLE = "product_class";
  const DB_TABLE_PK = "prod_class_id";

  public $prod_class_id;
  public $prod_type_id;

  public $prod_class;
  public $prod_class_desc;


  public function get_class($id=false){
    $this->toJoin = array('Product_type' => 'Product_class');
    $this->db->where('product_class.prod_type_id',$id);
    $this->db->order_by('prod_class');
    return $this->get();
  }
}
