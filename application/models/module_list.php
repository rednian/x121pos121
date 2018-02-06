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

  class Module_list extends MY_Model {

    const DB_TABLE = "Module_list";
    const DB_TABLE_PK = "mod_id";

    public $mod_id;
    public $module_name;


  }