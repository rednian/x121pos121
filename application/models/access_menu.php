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

  class Access_menu extends MY_Model {

    const DB_TABLE = "Access_menu";
    const DB_TABLE_PK = "am_id";

    public $am_id;
    public $mod_id;
    public $link;
    public $menu;


  }