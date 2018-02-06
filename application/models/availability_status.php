<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/15/2016
 * Time: 11:26 AM
 */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Availability_status extends MY_Model{
    const DB_TABLE = "Availability_status";
    const DB_TABLE_PK = "as_id";

    public $as_id;
    public $status;
    public $roominfo_id;
    public $amenities_id;
    public $food_id;
    public $table_info_id;
    public $service_info_id;
    public $tour_info;

  }