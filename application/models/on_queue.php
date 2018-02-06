<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/19/2016
 * Time: 1:13 PM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class On_queue extends MY_Model {

    const DB_TABLE = "On_queue";
    const DB_TABLE_PK = "oq_id";

    public $oq_id;
    public $bc_id;

    public $time_out;
    public $date_out;
    public $type;
    public $quantity;


  }