<?php
/**
 * Created by PhpStorm.
 * User: RedZ
 * Date: 5/13/2016
 * Time: 1:08 AM
 */
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Point extends MY_Model {

  const DB_TABLE = "point";
  const DB_TABLE_PK = "id";

  public $id;
  public $amount;


}