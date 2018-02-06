<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 3/9/2016
   * Time: 2:54 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Payment extends MY_Model {

    const DB_TABLE = "payment";
    const DB_TABLE_PK = "payment_id";

    public $payment_id;
    public $stock_out_id;
    public $acc_id;
    public $r_id;



  }