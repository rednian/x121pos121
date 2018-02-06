<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/21/2016
 * Time: 3:45 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_more_images extends MY_Model{

  const DB_TABLE = "about_more_images";
  const DB_TABLE_PK = "ami_id";

  public $ami_id;
  public $t_id;
  public $image;
  public $date_time;


  public function get_image($id=false){
  	$this->db->where('t_id',$id);

  	return $this->get();
  }


}
