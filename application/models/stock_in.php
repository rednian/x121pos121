<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/9/2016
 * Time: 5:24 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_in extends MY_Model{

  const DB_TABLE = "stock_in";
  const DB_TABLE_PK = "stock_in_id";

  public $stock_in_id;
  public $bc_id;
  public $quantity;



  public function get_details($id=false){

      $this->toJoin = array(
        'barcode'=>'price',
        'products'=>'barcode',
        'barcode' => 'stock_in'
      );

    $this->db->where('barcode.bc_id = '.$id);
    return $this->get();
  }


  public function get_all_inventory_levels(){
    $this->toJoin = array(
      'barcode' => 'stock_in',
      'products'=>'barcode',
      'price'=>'barcode',
//      'display_in'=>'barcode',
    );
    $this->db->order_by('stock_in.quantity');
    return $this->get();
  }

  public function get_low_stock(){
    $this->toJoin = array(
      'barcode' => 'stock_in',
      'price'=>'barcode',
      'products'=>'barcode',
    );
    $this->db->where('stock_in.quantity < 1');
    return $this->get();
  }

  public function get_on_hand(){
    $this->toJoin = array(
      'barcode' => 'stock_in',
      'price'=>'barcode',
      'products'=>'barcode',
    );
    $this->db->where('stock_in.quantity >0');
    return $this->get();
  }


}