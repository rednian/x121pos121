<?php
  /**
   * Created by PhpStorm.
   * User: RedZ
   * Date: 01/03/2016
   * Time: 4:43 PM
   */

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Artist_temp_package extends MY_Model {

    const DB_TABLE = "Artist_temp_package";
    const DB_TABLE_PK = "temp_id";

    public $temp_id;
    public $p_id;
    public $ar_id;
    public $acc_id;
    public $id;
    public $commission;



      public function artist_temp_display($user_id = false){
     $this->toJoin = array(
      'artist_model'=>'Artist_temp_package'
      );
     $this->db->where(array('Artist_temp_package.acc_id'=>$user_id));

     return $this->get();
  }



}
