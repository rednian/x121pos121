<?php
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }
  class Display_in extends  MY_Model{
    const DB_TABLE = "display_in";
    const DB_TABLE_PK = "disp_in";


    public $disp_in;
    public $quantity;
    public $bc_id;

    public function get_total_qty(){
      $this->toJoin();
      $this->db->where();
      return $this->get();
    }
  }