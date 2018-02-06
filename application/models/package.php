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

  class Package extends MY_Model {

    const DB_TABLE = "package";
    const DB_TABLE_PK = "p_id";

    public $p_id;
    public $package_name;
    public $vat;
    public $price;
    public $image;
    public $description;
    public $type;
    public $on_delete;


    


    public function details($id = false){
        $this->toJoin = array(
          'service_package' => 'package' ,
          'service_info' => 'service_package' ,
        );
        $this->db->where('package.p_id',$id); 
        

        return $this->get();
      
    }



    public function get_packages($p = false){
        $this->db->where('package.on_delete IS NULL');
      if(!empty($p)){
        $this->db->where("package.package_name LIKE '{$p}%'"); 
      }

      return $this->get();
    }


    public function get_package($service_id = false){
      $this->toJoin = array(
        'service_package' => 'package' ,
        // 'service_info' => 'service_package' ,
      );
      $this->db->where('package.on_delete IS NULL');

      return $this->get();
    }

  }