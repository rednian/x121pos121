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

  class Service_rendered extends MY_Model {

    const DB_TABLE = "rendered_history";
    const DB_TABLE_PK = "r_id";


    public $r_id;
    public $service_info_id;  /*foriegn key for service_type*/

    public $date_rendered;
    public $service_qty;
    public $package_qty;
    // public $disount;
    public $price;
    public $vat;
    public $roominfo_id;
    public $amenities_id;
    public $food_id;
    public $table_info_id;
    public $tour_info;


    public function get_all($start = false, $end = false){


    


      $this->db->select('*,
          service_info.service_name AS s_name,
          package.package_name AS p_name,
          (rendered_history.price + rendered_history.vat) AS service_price
       
        ');
      $this->db->from('rendered_history');
      $this->db->join('service_info','rendered_history.service_info_id = service_info.service_info_id','left');
      $this->db->join('package','rendered_history.p_id = package.p_id','left');
      $this->db->join('artist_commision','artist_commision.r_id = rendered_history.r_id','left');
      $this->db->order_by('rendered_history.r_id','DESC');
      // $this->db->group_by('service_info.service_name');
      // $this->db->group_by('package.package_name');
      // $this->db->group_by('service_info.service_name');
      // $this->db->group_by('rendered_history.date_rendered');

    
      // if($start != false  && $end != false){
      //  $this->db->where('rendered_history.date_rendered >=' , $start);
      //  $this->db->where('rendered_history.date_rendered <=' , $end);
    
      // }
    
      $query = $this->db->get();
      if($query->num_rows() > 0){

        return $query->result(); 

      }
      else{

        return FALSE;
      }
    }


    public function get_by_date($start = false, $end = false){


  


      $this->db->select('*,
          service_info.service_name AS s_name,
          package.package_name AS p_name,
          (rendered_history.price + rendered_history.vat) AS service_price
       
        ');
      $this->db->from('rendered_history');
      $this->db->join('service_info','rendered_history.service_info_id = service_info.service_info_id','left');
      $this->db->join('package','rendered_history.p_id = package.p_id','left');
      $this->db->join('artist_commision','artist_commision.r_id = rendered_history.r_id','left');
      // $this->db->group_by('service_info.service_name');
      // $this->db->group_by('package.package_name');
      // $this->db->group_by('service_info.service_name');
      // $this->db->group_by('rendered_history.date_rendered');

    
      if($start != false  && $end != false){
       $this->db->where('rendered_history.date_rendered >=' , $start);
       $this->db->where('rendered_history.date_rendered <=' , $end);
 
      }
   
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





    public function get_package() {

      $this->db->select('*');
      $this->db->select('COUNT(package.p_id) AS number');
      $this->db->select('(COUNT(package.p_id) * package.price) AS sub');
      $this->db->from('rendered_history');
      $this->db->join('package' , 'rendered_history.p_id = package.p_id');
      // $this->db->where('rendered_history.date_rendered >=' , $start);
      // $this->db->where('rendered_history.date_rendered <=' , $end);
      $this->db->group_by('rendered_history.date_rendered');
      $this->db->group_by('package.p_id');
      $this->db->order_by('rendered_history.date_rendered','DESC');

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return FALSE;
      }

    }

    public function get_current_package_sales($start = FALSE , $end = FALSE) {

      $start = date_create($start);
      $start = date_format($start , 'Y-m-d'); 

      $end = date_create($end);
      /*supress the error if date not found*/
      $end = date_format($end , 'Y-m-d');

      $this->db->select('*');
      $this->db->select('COUNT(package.p_id) AS number');
      $this->db->select('(COUNT(package.p_id) * package.price) AS sub');
      $this->db->from('rendered_history');
      $this->db->join('package' , 'rendered_history.p_id = package.p_id');
      $this->db->where('rendered_history.date_rendered >=' , $start);
      $this->db->where('rendered_history.date_rendered <=' , $end);
      $this->db->group_by('rendered_history.date_rendered');
      $this->db->group_by('package.p_id');
      $this->db->order_by('rendered_history.date_rendered','DESC');

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return FALSE;
      }

    }


    public function get_sales() {

      // $start = date_create($start);
      // $start = date_format($start , 'Y-m-d'); 

      // $end = date_create($end);
      // /*supress the error if date not found*/
      // $end = date_format($end , 'Y-m-d');

      $this->db->select('*');
      $this->db->select('COUNT(service_info.service_info_id) AS number');
      $this->db->select('(COUNT(service_info.service_info_id) * price) AS sub');
      $this->db->from('rendered_history');
      $this->db->join('service_info' , 'rendered_history.service_info_id = service_info.service_info_id');
      // $this->db->where('rendered_history.date_rendered >=' , $start);
      // $this->db->where('rendered_history.date_rendered <=' , $end);
      $this->db->group_by('rendered_history.date_rendered');
      $this->db->group_by('service_info.service_info_id');
      $this->db->order_by('rendered_history.date_rendered','DESC');

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return FALSE;
      }

    }


    public function get_current_day_sales($start = FALSE , $end = FALSE) {

      $start = date_create($start);
      $start = date_format($start , 'Y-m-d'); 

      $end = date_create($end);
      /*supress the error if date not found*/
      $end = date_format($end , 'Y-m-d');

      $this->db->select('*');
      $this->db->select('COUNT(service_info.service_info_id) AS number');
      $this->db->select('(COUNT(service_info.service_info_id) * price) AS sub');
      $this->db->from('rendered_history');
      $this->db->join('service_info' , 'rendered_history.service_info_id = service_info.service_info_id');
      $this->db->where('rendered_history.date_rendered >=' , $start);
      $this->db->where('rendered_history.date_rendered <=' , $end);
      $this->db->group_by('rendered_history.date_rendered');
      $this->db->group_by('service_info.service_info_id');
      $this->db->order_by('rendered_history.date_rendered','DESC');

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return FALSE;
      }

    }

  }



