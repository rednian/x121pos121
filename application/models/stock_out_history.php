<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/27/2016
 * Time: 10:00 AM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Stock_out_history extends MY_Model {

    const DB_TABLE = "stock_out_history";
    const DB_TABLE_PK = "stock_out_hist_id";

    public $stock_out_hist_id;
    public $time_out;
    public $date_out;
    public $quantity;
    public $bc_id;
    public $tc_id;
    public $type_id;
    
    public $price;
    public $mark_up;
    public $discount;
    public $vat;

  

  public function gets($id = false){
    $this->toJoin = array(
      // 'user'=>'trans_code',
      // 'trans_code'=>'stock_out_history',
      'barcode' => 'stock_out_history',
      'stock_history_type' => 'stock_out_history',
      'products'=>'barcode',
    );
    $this->db->where('barcode.bc_id = '.$id);
    return $this->get();
  }


  public function sales_all(){


    $this->toJoin = array(
      'barcode'=>'stock_out_history',
      'products'=>'barcode',
      );
    $this->db->order_by('stock_out_history.stock_out_hist_id','DESC');
    
    return $this->get();
  }

public function sales_by_date($start = false, $end = false){

  $start = @date_create($start);
  $start = date_format($start, 'Y-m-d');

  $end = @date_create($end);
  $end = date_format($end, 'Y-m-d');

  $this->toJoin = array(
    'barcode'=>'stock_out_history',
    'products'=>'barcode',
    );
  if(!empty($start) && !empty($end)){
    $this->db->where('stock_out_history.date_out >=', $start);
    $this->db->where('stock_out_history.date_out <=', $end);
  }
  $this->db->order_by('stock_out_history.stock_out_hist_id','DESC');


  return $this->get();
}

}