<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/26/2016
 * Time: 2:13 PM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Package_artist_temp extends MY_Model {

  const DB_TABLE = "Package_artist_temp";
  const DB_TABLE_PK = "package_id";

  public $package_id;
  public $ar_id;
  public $id;
  public $acc_id;
  public $p_id;
  public $commission;
  public $service_name;


  public function artist_commission($user_id = false){
     $this->toJoin = array(
      'artist_model'=>'Package_artist_temp'
      );
     $this->db->where(array('Package_artist_temp.acc_id'=>$user_id));

     return $this->get();
  }

}
