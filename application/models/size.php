<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/10/2016
 * Time: 10:33 AM
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Size extends MY_Model {

  const DB_TABLE = "size";
  const DB_TABLE_PK = "prod_size_id";

  public $prod_size_id;
  public $size_type;

}