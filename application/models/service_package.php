<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 3/9/2016
   * Time: 2:54 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Service_package extends MY_Model {

    const DB_TABLE = "Service_package";
    const DB_TABLE_PK = "sp_id";

    public $sp_id;
    public $p_id;
    public $service_info_id;


      public function details_service($id = false){
        $this->toJoin = array(
          // 'service_package' => 'package' ,
          'service_info' => 'service_package' ,
        );
        $this->db->where('service_package.p_id',$id); 
        

        return $this->get();
      
    }

  }