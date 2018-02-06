<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/15/2016
 * Time: 2:31 PM
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

class Service_type extends MY_Model {

  const DB_TABLE = "service_type";
  const DB_TABLE_PK = "service_type_id";


  public $service_type_id;
  public $service_type;
  public $service_type_image;
  public $service_type_desc;

public  function get_service_type($type = false){
  $this->db->where(array('service_type'=>$type));
  return $this->get();
}
}