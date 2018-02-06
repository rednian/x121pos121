<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/26/2016
 * Time: 2:18 PM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Purchase_pointing_history extends MY_Model {

    const DB_TABLE = "Purchase_pointing_hist";
    const DB_TABLE_PK = "pph_id";

    public $pph_id;
    public $points;
    public $ch_id;
    public $tc_id;
  }