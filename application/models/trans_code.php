<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 4/26/2016
 * Time: 2:13 PM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trans_code extends MY_Model {

  const DB_TABLE = "trans_code";
  const DB_TABLE_PK = "tc_id";

  public $tc_id;
  public $t_code;
  public $t_date;
  public $t_time;
  public $acc_id;

  public function get_detail($id = false){
    $this->db->select('*');
    $this->db->from('trans_code');
    $this->db->join('stock_out_history', 'stock_out_history.tc_id = trans_code.tc_id');
    $this->db->join('barcode', 'stock_out_history.bc_id = barcode.bc_id');
    $this->db->join('product_main_info', 'barcode.prod_id = product_main_info.prod_id');
    $this->db->join('size', 'product_main_info.prod_size_id = size.prod_size_id');
    $this->db->join('weight_unit', 'product_main_info.prod_wu_id = weight_unit.prod_wu_id');
    $this->db->join('product_type', ' product_main_info.prod_type_id = product_type.prod_type_id');
    // $this->db->join('product_class', 'product_class.prod_type_id = product_type.prod_type_id AND product_main_info.prod_class_id = product_class.prod_class_id');
    // $this->db->where('stock_out_history.date_out >=', $start);
    // $this->db->where('stock_out_history.date_out <=', $end);
    // $this->db->group_by('stock_out_history.date_out');
    // $this->db->group_by('stock_out_history.discount');
    // $this->db->group_by('product_main_info.prod_id');
    $this->db->order_by('stock_out_history.stock_out_hist_id', 'DESC');
    $this->db->where('trans_code.tc_id', $id);
    $this->db->where('stock_out_history.type_id', 6);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return FALSE;
    }
    
  }

  public function trans_by_date($start = false, $end = false){

    $start = @date_create($start);
    $start = date_format($start, 'Y-m-d');

    $end = @date_create($end);
    $end = date_format($end, 'Y-m-d');


  }

public function last_code(){
   $this->db->order_by('tc_id','desc');
     $this->db->limit(1);
     return $this->get();
}

  public function get_lastcode(){
     $user = $this->session->userdata('logged_in');
     $this->db->where(array('acc_id'=>$user['id']));
     $this->db->order_by('tc_id','desc');
     $this->db->limit(1);
     return $this->get();
  }


  public function get_transcode_by_date(){
     $user = $this->session->userdata('logged_in');
     $this->db->where(array('t_date'=>date('Y-m-d')));
     $this->db->where(array('acc_id'=>$user['id']));
     return $this->get();
  }

  public function transaction_by_barcode($code = FALSE, $barcode = false){
   
   $this->toJoin = array(
     'stock_out_history'=>'trans_code',
     'barcode'=>'stock_out_history',
     'products' => 'barcode' ,
     'product_type' => 'products' ,
     // 'product_class' => 'products' ,
     'weight' => 'products' ,
     'size' => 'products' ,
   );

   $this->db->where(array('barcode'=>$barcode));
   $this->db->where(array('t_code'=>$code));

   return $this->get();

  }

  public function get_cashier_report($code = false) {
    // $start = @date_create($start);
    // $start = date_format($start, 'Y-m-d');

    // $end = @date_create($end);
    // $end = date_format($end, 'Y-m-d');
    $user = $this->session->userdata('logged_in');

    $this->db->select('*');

    $this->db->from('trans_code');
    $this->db->join('stock_out_history', 'stock_out_history.tc_id = trans_code.tc_id');
    $this->db->join('barcode', 'stock_out_history.bc_id = barcode.bc_id');
    $this->db->join('product_main_info', 'barcode.prod_id = product_main_info.prod_id');
    $this->db->join('size', 'product_main_info.prod_size_id = size.prod_size_id');
    $this->db->join('weight_unit', 'product_main_info.prod_wu_id = weight_unit.prod_wu_id');
    $this->db->join('product_type', ' product_main_info.prod_type_id = product_type.prod_type_id');
    // $this->db->join('product_class', 'product_class.prod_type_id = product_type.prod_type_id AND product_main_info.prod_class_id = product_class.prod_class_id');
    $this->db->where('stock_out_history.date_out =', date('Y-m-d'));
    $this->db->where('trans_code.acc_id =', $user['id']);
    $this->db->where('trans_code.t_code =', $code);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return FALSE;
    }

  }

  public function get_all_sales(){
    $this->db->select('*');
    $this->db->from('trans_code');
    $this->db->join('stock_out_history', 'stock_out_history.tc_id = trans_code.tc_id');
    $this->db->join('barcode', 'stock_out_history.bc_id = barcode.bc_id');
    $this->db->join('product_main_info', 'barcode.prod_id = product_main_info.prod_id');
    $this->db->join('size', 'product_main_info.prod_size_id = size.prod_size_id');
    $this->db->join('weight_unit', 'product_main_info.prod_wu_id = weight_unit.prod_wu_id');
    $this->db->join('product_type', ' product_main_info.prod_type_id = product_type.prod_type_id');
    // $this->db->join('product_class', 'product_class.prod_type_id = product_type.prod_type_id AND product_main_info.prod_class_id = product_class.prod_class_id');
    // $this->db->where('stock_out_history.date_out >=', $start);
    // $this->db->where('stock_out_history.date_out <=', $end);
    // $this->db->group_by('stock_out_history.date_out');
    // $this->db->group_by('stock_out_history.discount');
    // $this->db->group_by('product_main_info.prod_id');
    $this->db->order_by('stock_out_history.stock_out_hist_id', 'DESC');
     $this->db->where('stock_out_history.type_id', 6);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return FALSE;
    }
    
  }

  public function get_current_day_sales2($start = FALSE, $end = FALSE){
    $start = @date_create($start);
    $start = date_format($start, 'Y-m-d');

    $end = @date_create($end);
    $end = date_format($end, 'Y-m-d');

    $this->db->select('*,  SUM(stock_out_history.quantity) as quantity1');

    $this->db->from('trans_code');
    $this->db->join('stock_out_history', 'stock_out_history.tc_id = trans_code.tc_id');
    $this->db->join('barcode', 'stock_out_history.bc_id = barcode.bc_id');
    $this->db->join('product_main_info', 'barcode.prod_id = product_main_info.prod_id');
    $this->db->join('size', 'product_main_info.prod_size_id = size.prod_size_id');
    $this->db->join('weight_unit', 'product_main_info.prod_wu_id = weight_unit.prod_wu_id');
    $this->db->join('product_type', ' product_main_info.prod_type_id = product_type.prod_type_id');
    $this->db->where('trans_code.t_date >=', $start);
    $this->db->where('trans_code.t_date <=', $end);
    $this->db->group_by('trans_code.t_code');
    // $this->db->group_by('stock_out_history.discount');
    // $this->db->group_by('product_main_info.prod_id');
    $this->db->order_by('stock_out_history.stock_out_hist_id', 'DESC');
     $this->db->where('stock_out_history.type_id', 6);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return FALSE;
    }


  }
  public function all_transaction(){
    $this->db->select('*, 
                     
                      (stock_out_history.price + stock_out_history.vat + stock_out_history.mark_up) AS price,
                      SUM(stock_out_history.quantity) as quantity1
                      ');

    $this->db->from('trans_code');
    $this->db->join('stock_out_history', 'stock_out_history.tc_id = trans_code.tc_id');
    $this->db->group_by('Trans_code.t_code');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return FALSE;
    }


  }

  public function transaction_by_date($start = false, $end = false){
      $start = @date_create($start);
      $start = date_format($start, 'Y-m-d');

      $end = @date_create($end);
      $end = date_format($end, 'Y-m-d');

      $this->db->select('*, 
                       
                        (stock_out_history.price + stock_out_hisstory.vat + stock_out_history.mark_up) AS price,
                        SUM(stock_out_history.quantity) as quantity1
                        ');

      $this->db->from('trans_code');
      $this->db->join('stock_out_history', 'stock_out_history.tc_id = trans_code.tc_id');

      $this->db->where('trans_code.t_date >=', $start);
      $this->db->where('trans_code.t_date <=', $end);
       $this->db->where('stock_out_history.type_id', 6);

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return FALSE;
      }
  }



  public function get_current_day_sales($start = FALSE, $end = FALSE) {

    $start = @date_create($start);
    $start = date_format($start, 'Y-m-d');

    $end = @date_create($end);
    $end = date_format($end, 'Y-m-d');

    $this->db->select('*, 
                      SUM(stock_out_history.quantity) AS quantity1,
                      ');

    $this->db->from('trans_code');
    $this->db->join('stock_out_history', 'stock_out_history.tc_id = trans_code.tc_id');
    $this->db->join('barcode', 'stock_out_history.bc_id = barcode.bc_id');
    $this->db->join('product_main_info', 'barcode.prod_id = product_main_info.prod_id');
    $this->db->join('size', 'product_main_info.prod_size_id = size.prod_size_id');
    $this->db->join('weight_unit', 'product_main_info.prod_wu_id = weight_unit.prod_wu_id');
    $this->db->join('product_type', ' product_main_info.prod_type_id = product_type.prod_type_id');
    // $this->db->join('product_class', 'product_class.prod_type_id = product_type.prod_type_id AND product_main_info.prod_class_id = product_class.prod_class_id');
    $this->db->where('stock_out_history.date_out >=', $start);
    $this->db->where('stock_out_history.date_out <=', $end);
    $this->db->group_by('stock_out_history.date_out');
    $this->db->group_by('stock_out_history.discount');
    $this->db->group_by('product_main_info.prod_id');
    $this->db->order_by('stock_out_history.stock_out_hist_id', 'DESC');
     $this->db->where('stock_out_history.type_id', 6);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return FALSE;
    }

  }

}