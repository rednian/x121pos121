<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/11/2016
 * Time: 11:23 AM
 */
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Price extends MY_Model {

  const DB_TABLE = "pricing";
  const DB_TABLE_PK = "pricing_id";

  public $pricing_id;
  public $price;
  public $vat;
  public $table_info_id;
  public $food_id;
  public $amenities_id;
  public $roominfo_id;
  public $service_info_id;
  public $tour_info;
  public $bc_id;
  public $mark_up;



}