<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/27/2016
 * Time: 10:06 AM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Stock_history_type extends MY_Model{

    const DB_TABLE = "Stock_history_type";
    const DB_TABLE_PK = "type_id";

    public $type_id;
    public $type;

  }