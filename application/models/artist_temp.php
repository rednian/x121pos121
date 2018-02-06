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

  class Artist_temp extends MY_Model {

    const DB_TABLE = "Artist_temp";
    const DB_TABLE_PK = "artist_id";

    public $artist_id;
    public $service_info_id;
    public $ar_id;
    public $acc_id;
    public $id;
    public $commission;
    public $service_name;


    // public function get_artist($user = false){
    //   $this->db->where(array('acc_id'=>$user));

    //   return $this->get();
    // }

      public function artist_temp_display($user_id = false){
     $this->toJoin = array(
      'artist_model'=>'Artist_temp'
      );
     $this->db->where(array('Artist_temp.acc_id'=>$user_id));

     return $this->get();
  }



}
