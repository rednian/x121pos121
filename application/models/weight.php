<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/10/2016
 * Time: 10:25 AM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weight extends MY_Model {

  const DB_TABLE = "weight_unit";
  const DB_TABLE_PK = "prod_wu_id";

  public $prod_wu_id	;
  public $unit;

}