<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/15/2016
 * Time: 2:33 PM
 */
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Service_class extends MY_Model {

  const DB_TABLE = "service_class";
  const DB_TABLE_PK = "service_class_id";


  public $service_class_id;
  public $service_type_id;  /*foriegn key for service_type*/

  public $service_class;

  public function get_class($id = false) {
    $this->toJoin = array('Service_type' => 'Service_class');
    $this->db->where('service_class.service_type_id', $id);
    $this->db->order_by('service_class');
    return $this->get();
  }


}