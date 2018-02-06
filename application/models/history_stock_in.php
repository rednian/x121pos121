<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/11/2016
 * Time: 1:34 PM
 */

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
class History_stock_in extends MY_Model{

  const DB_TABLE = "stock_in_history";
  const DB_TABLE_PK = "stock_in_hist_id";

  public $stock_in_hist_id;
  public $time_in;
  public $date_in;
  public $quantity;
  public $bc_id;
  public $type_id;
  public $acc_id;


  public function get_stock_history($bc_id=false){
    $this->toJoin = array(
      'user'=>'History_stock_in',
      'barcode' => 'History_stock_in',
      'stock_history_type' => 'History_stock_in',
      'products'=>'barcode',
    );
    $this->db->where('barcode.bc_id = '.$bc_id);
    return $this->get();

  }



}