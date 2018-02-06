<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/4/2016
 * Time: 3:06 PM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Position extends MY_Model{

  const DB_TABLE = "positions";
  const DB_TABLE_PK = "pos_id";

  public $pos_id;
  public $position;


}