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

  class Contact_us extends MY_Model {

    const DB_TABLE = "Contact_us";
    const DB_TABLE_PK = "con_id";

    public $con_id;
    public $name;
    public $email;
    public $subject;
    public $remark;




  }