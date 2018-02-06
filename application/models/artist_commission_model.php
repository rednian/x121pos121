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

  class Artist_commission_model extends MY_Model {

    const DB_TABLE = "Artist_commision";
    const DB_TABLE_PK = "ac_id";

    public $ac_id;
    public $commission;
    public $date;
    public $ar_id;
    public $r_id;
    // public $service_info_id;
    public $service_name;

  }
