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

  class Company_model extends MY_Model {

    const DB_TABLE = "company_info";
    const DB_TABLE_PK = "ci_id";

    public $ci_id;
    public $name;
    public $logo;
    public $address;
    public $email;
    public $phone;
    public $postal_code;
    public $tin_number;
  }
  ?>