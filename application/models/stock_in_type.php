<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/31/2016
 * Time: 3:07 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_in_type extends MY_Model{

  const DB_TABLE = "stock_history_type";
  const DB_TABLE_PK = "type_id";

  public $type_id;
  public $type;

  public function get_stock_in_type(){
  	$this->db->order_by('type_id', 'DESC');
  	return $this->get();
  }
}
