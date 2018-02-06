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

  class Artist_model extends MY_Model {

    const DB_TABLE = "artist";
    const DB_TABLE_PK = "ar_id";

    public $ar_id;
    public $fname;
    public $midname;
    public $lastname;
    public $contact_number;
    public $address;
    public $on_delete;


    public function artist_detail($id = false){

      // $start = date_create($start);
      // $start = date_format($start , 'Y-m-d'); 

      // $end = date_create($end);
      // /*supress the error if date not found*/
      // $end = date_format($end , 'Y-m-d');

      $this->db->select('*');
      $this->db->from('artist');
      $this->db->join('Artist_commision', 'Artist_commision.ar_id = artist.ar_id');
      $this->db->where('Artist_commision.ar_id' , $id);
      // $this->db->where('Artist_commision.date >=' , $start);
      // $this->db->where('Artist_commision.datw <=' , $end);
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return FALSE;
      }
    }

    // public function artist_detail($start = false, $end = false){

    //   $start = date_create($start);
    //   $start = date_format($start , 'Y-m-d'); 

    //   $end = date_create($end);
    //   /*supress the error if date not found*/
    //   $end = date_format($end , 'Y-m-d');

    //   $this->db->select('*');
    //   $this->db->from('artist');
    //   $this->db->join('Artist_commision', 'Artist_commision.ar_id = artist.ar_id');
    //   $this->db->where('Artist_commision.date >=' , $start);
    //   $this->db->where('Artist_commision.datw <=' , $end);
    //   $query = $this->db->get();

    //   if ($query->num_rows() > 0) {
    //     return $query->result();
    //   } else {
    //     return FALSE;
    //   }
    // }

    public function artist_report_by_date($start = false, $end = false, $id =false){
      $this->db->select('*');
      $this->db->from('artist');
      $this->db->join('Artist_commision', 'artist_commision.ar_id = artist.ar_id');
      $this->db->where('Artist_commision.date >=', $start);
      $this->db->where('Artist_commision.date <=', $end);
      $this->db->where('artist.ar_id', $id);

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return FALSE;
      }
    }



    public function all_report($start = false, $end = false){
      $this->db->select('*');
      $this->db->from('artist');
      $this->db->join('Artist_commision', 'artist_commision.ar_id = artist.ar_id');
        // if($start != '' && $end != ''){
        //   $this->db->where('Artist_commision.date >=', $start);
        //   $this->db->where('Artist_commision.date <=', $end);
        // }
      // $this->db->join('service_info', 'artist_commision.service_info_id = service_info.service_info_id');
      // $this->db->where('stock_out_history.date_out >=', $start);
      // $this->db->where('stock_out_history.date_out <=', $end);
      // $this->db->group_by('stock_out_history.date_out');
      // $this->db->group_by('stock_out_history.discount');
      // $this->db->group_by('product_main_info.prod_id');
      // $this->db->order_by('stock_out_history.stock_out_hist_id', 'DESC');
      // $this->db->where('trans_code.tc_id', $id);

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return FALSE;
      }
    }

  public function get_by_name($name = false){
    $this->db->where(array('ar_id'=>trim($id)));
    return $this->get();
  }

  public function get_by_id($id = false){
    $this->db->where(array('ar_id'=>trim($id)));
    return $this->get();
  }
}
