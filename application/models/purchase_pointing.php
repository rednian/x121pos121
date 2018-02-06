<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 5/12/2016
 * Time: 4:10 PM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Purchase_pointing extends MY_Model {

    const DB_TABLE = "Purchase_pointing";
    const DB_TABLE_PK = "pointing_id";

    public $pointing_id;
    public $points;
    public $ch_id;


  }