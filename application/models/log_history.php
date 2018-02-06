<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/25/2016
 * Time: 2:14 AM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_history extends MY_Model{

  const DB_TABLE = "log_history";
  const DB_TABLE_PK = "id";

  public $id;
  public $acc_id;
  public $logout;
  public $login;

  public function get_log_history($id=false){
  	$this->toJoin = array('user' => 'log_history');
    $this->db->where(array('account.acc_id' => $id));
    $this->db->order_by('id','DESC');
    return $this->get();
  }
}	