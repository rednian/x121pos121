<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 3/15/2016
   * Time: 2:38 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Service_redeem extends MY_Model {

    const DB_TABLE = "service_redeem";
    const DB_TABLE_PK = "sr_id";


    public $sr_id;
    public $service_info_id;
    public $acc_id;
    public $ch_id;

    public $date;
    public $price;
    public $vat;
  }

