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

  class Product_view_status extends MY_Model {
    const DB_TABLE = "Product_view_status";
    const DB_TABLE_PK = "prod_view_status_id";

    public $prod_view_status_id;
    public $prod_status_id;
    public $prod_id;


    public function get_product_view_status() {
      $this->toJoin = array(
        'products' => 'product_view_status',
        'product_type' => 'products',
        'barcode' => 'products',
//        'price' => 'barcode',

      );
      $this->db->where(array('prod_status'=>'viewed'));
      return $this->get();

    }
  }
