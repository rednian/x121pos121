<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/26/2016
 * Time: 2:15 PM
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Card_holder extends MY_Model {

    const DB_TABLE = "card_holder";
    const DB_TABLE_PK = "ch_id";

    public $ch_id;
    public $cus_id;
    public $card_no;
    public $date_reg;
    public $image;


    public function check_card($number = false){
      $this->db->where(array('card_no'=>trim($number)));
      return $this->get();
    }


    public function lists(){
      $this->toJoin = array(
        'customers'=>'card_holder',
        'purchase_pointing'=>'card_holder',
      );
    $this->db->order_by('card_holder.ch_id','DESC');
      return $this->get();
  }

    public function detail_by_id($id=false){
      $this->toJoin = array(
        'customers'=>'card_holder',
        'purchase_pointing'=>'card_holder',
      );
      $this->db->where(array('card_holder.ch_id'=>trim($id)));
    
      return $this->get();
    }

  }