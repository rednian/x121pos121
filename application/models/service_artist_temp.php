<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/26/2016
 * Time: 2:13 PM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Service_artist_temp extends MY_Model {

  const DB_TABLE = "Service_artist_temp";
  const DB_TABLE_PK = "service_artist_id";

  public $service_artist_id;
  public $ar_id;
  public $id;
  public $acc_id;
  public $service_info_id;
  public $commission;
  public $service_name;


  public function artist_commission($user_id = false){
     $this->toJoin = array(
      'artist_model'=>'service_artist_temp'
      );
     $this->db->where(array('service_artist_temp.acc_id'=>$user_id));

     return $this->get();
  }

}
