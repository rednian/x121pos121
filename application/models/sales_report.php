<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 3/15/2016
   * Time: 2:33 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Sales_report extends MY_Model {

    const DB_TABLE = "Sales_report";
    const DB_TABLE_PK = "sa_id";


    public $sa_id;
    public $r_id;  /*foriegn key for service_type*/
    public $stock_out_hist_id;  /*foriegn key for service_type*/
    public $date;  /*foriegn key for service_type*/



    public function get_by_date($start = false, $end = false){


      $start = @date_create($start);
      $start = date_format($start, 'Y-m-d');

      $end = @date_create($end);
      $end = date_format($end, 'Y-m-d');


      $this->db->select(' *,
        (stock_out_history.price + stock_out_history.vat + stock_out_history.mark_up) AS prod_price,
        (rendered_history.price + rendered_history.vat) AS service_price,
        service_info.service_name AS service_name1,
        package.package_name AS package_name1,
        ');
      $this->db->from('sales_report');
      $this->db->join('rendered_history','sales_report.r_id = rendered_history.r_id','left');
      $this->db->join('stock_out_history','sales_report.stock_out_hist_id = stock_out_history.stock_out_hist_id','left');
      $this->db->join('barcode','stock_out_history.bc_id = barcode.bc_id','left');
      $this->db->join('product_main_info','barcode.prod_id = product_main_info.prod_id','left');
      $this->db->join('service_info','rendered_history.service_info_id = service_info.service_info_id','left');
      $this->db->join('package','rendered_history.p_id = package.p_id','left');
      $this->db->join('artist_commision','rendered_history.r_id = artist_commision.r_id','left');
      $this->db->order_by('sales_report.sa_id DESC');
      // $this->db->group_by('service_info.service_name');
      // $this->db->group_by('package.package_name');
      // $this->db->group_by('rendered_history.date_rendered');

    
      if(!empty($start)  && !empty($end)){  
       $this->db->where('sales_report.date >=' , $start);
       $this->db->where('sales_report.date <=' , $end);
    
      }
    
      $query = $this->db->get();
      if($query->num_rows() > 0){

        return $query->result(); 

      }
      else{

        return FALSE;
      }
    }

    

    public function get_all($start = false, $end = false){


  

      $this->db->select(' *,
        (stock_out_history.price + stock_out_history.vat + stock_out_history.mark_up) AS prod_price,
        (rendered_history.price + rendered_history.vat) AS service_price,
        service_info.service_name AS service_name1,
        package.package_name AS package_name1,
        ');
      $this->db->from('sales_report');
      $this->db->join('rendered_history','sales_report.r_id = rendered_history.r_id','left');
      $this->db->join('stock_out_history','sales_report.stock_out_hist_id = stock_out_history.stock_out_hist_id','left');
      $this->db->join('barcode','stock_out_history.bc_id = barcode.bc_id','left');
      $this->db->join('product_main_info','barcode.prod_id = product_main_info.prod_id','left');
      $this->db->join('service_info','rendered_history.service_info_id = service_info.service_info_id','left');
      $this->db->join('package','rendered_history.p_id = package.p_id','left');
      $this->db->join('artist_commision','rendered_history.r_id = artist_commision.r_id','left');
      $this->db->order_by('sales_report.sa_id DESC');
      // $this->db->limit('70');


      $query = $this->db->get();
      if($query->num_rows() > 0){

        return $query->result(); 

      }
      else{

        return FALSE;
      }
    }

    public function get_rendered_services() {
      $this->toJoin = array(
        'service_info' => 'service_rendered',
        'service_type' => 'service_info' ,
        'service_class' => 'service_info',
        'price' => 'service_info'
      );

      return $this->get();
    }





   

  }



