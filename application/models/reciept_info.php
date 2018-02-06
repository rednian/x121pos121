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

  class Reciept_info extends MY_Model {

    const DB_TABLE = "receipt_info";
    const DB_TABLE_PK = "id";

    public $id;
    public $pn;
    public $min;
    public $serial_number;
    public $accreditation_date;
    public $accreditation_no;
    public $note;
    public $si;
  }

  ?>