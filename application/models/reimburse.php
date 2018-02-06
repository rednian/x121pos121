<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/21/2016
 * Time: 3:45 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reimburse extends MY_Model{

  const DB_TABLE = "Reimburse_temp";
  const DB_TABLE_PK = "id";

  public $id;
  public $qty;
  public $discount;
  public $new_qty;
  public $stock_in_id;
  public $stock_out_id;
  public $tc_id;


  public function get_data($user = false){

   $this->toJoin = array(
     'trans_code'=>'Reimburse',
     'stock_out_history'=>'trans_code',
     'barcode'=>'stock_out_history',
     'products' => 'barcode' ,
     'product_type' => 'products' ,
     'product_class' => 'products' ,
     'weight' => 'products' ,
     'size' => 'products' ,
   );

   $this->db->where(array('Reimburse_temp.acc_id'=>$user));

   return $this->get();
  }


}
