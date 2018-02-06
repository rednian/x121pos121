<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 3/15/2016
   * Time: 2:38 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Service_info extends MY_Model {

    const DB_TABLE = "service_info";
    const DB_TABLE_PK = "service_info_id";


    public $service_info_id;
    public $service_type_id;
    public $service_class_id;

    public $service_image;
    public $service_name;
    public $service_desc;
    public $on_delete;
    public $view; 
    public $type;

     public function services_can_avail($price = false){
      $this->toJoin = array(
        'service_type' => 'service_info' ,  
        'service_class' => 'service_info' ,
        'availability_status' => 'service_info' ,
        'price' => 'service_info'
      );
      
      $this->db->where('service_info.on_delete IS NULL'); 
      $this->db->where('price  < '.$price);
      $this->db->where('status','available');

      return $this->get();
       // $this->db->select('*');
       // $this->db->from('service_info');
       // $this->db->join('availability_status' , 'service_info.service_info_id = availability_status.servi;ce_info_id');
       // $this->db->join('pricing' , 'service_info.service_info_id = pricing.service_info_id');
       // $this->db->where('availability_status.status =' , 'available');
       // $this->db->where('price + vat >=' , $price);
       // $this->db->limit(1);
       // $query = $this->db->get();

       // if ($query->num_rows() > 1) {
       //   return $query->result();
       // } else {
       //   return FALSE;
       // }  

     }

    

    public function view_details($id=false){
      $this->toJoin = array(
        'service_type' => 'service_info' ,
        'service_class' => 'service_info' ,
        'availability_status' => 'service_info' ,
        'price' => 'service_info'
      );
      $this->db->where('service_info.on_delete IS NULL');
      $this->db->where('service_info.service_info_id',$id);
      return $this->get();
    }


    public function get_info_list() {
      $this->toJoin = array(
        'service_type' => 'service_info' ,
        'service_class' => 'service_info' ,
        'availability_status' => 'service_info' ,
        'price' => 'service_info'
      );
      $this->db->where('service_info.on_delete IS NULL');
      $this->db->where('price >',0);
      $this->db->order_by('service_info.service_info_id','DESC');

      return $this->get();
    }

    public function service_available($service = false){
      $this->toJoin = array(
        'service_type' => 'service_info' ,
        'service_class' => 'service_info' ,
        'availability_status' => 'service_info' ,
        'price' => 'service_info'
      );
      $this->db->where('service_info.on_delete IS NULL');
      $this->db->where('price > 0');
      $this->db->where('status','available');
      if(!empty($service)){
        $this->db->where("service_info.service_name LIKE '{$service}%'"); 
      }
      return $this->get();
    }

    public function recently_added(){
      $this->toJoin = array(
        'service_type' => 'service_info' ,
        'service_class' => 'service_info' ,
        'availability_status' => 'service_info' ,
        'price' => 'service_info'
      );
      $this->db->where('service_info.on_delete IS NULL');
      $this->db->order_by('service_info.service_info_id DESC');
      $this->db->limit(7);
      return $this->get();
    }


    /*
     * use to display data unpricing services in pricing
     * */
    public function unprice_services() {
      $this->toJoin = array(
        'service_type' => 'service_info' ,
        'service_class' => 'service_info' ,
        'price' => 'service_info'
      );
      $this->db->where('service_info.on_delete IS NULL');
      $this->db->where(array(
        'price' => 0 ,
      ));

      return $this->get();
    }

    public function get_selected_by_id($id = FALSE) {
      $this->toJoin = array(
        'service_type' => 'service_info' ,
        'service_class' => 'service_info' ,
        'price' => 'service_info'

      );
      $this->db->where('service_info.on_delete IS NULL');
      $this->db->where(array(
//        'price' => 0 ,
//        'availability_status' => 'available' ,
        'service_info.service_info_id' => trim($id)
      ));

      return $this->get();
    }


    public function get_service_price() {
      $this->toJoin = array(
        'service_type' => 'service_info' ,
        'service_class' => 'service_info' ,
        'price' => 'service_info'
      );
      $this->db->where('service_info.on_delete IS NULL');
      $this->db->where('price < ' , 1);
      $this->db->order_by('service_name');

      return $this->get();
    }


    public function get_service_by_type_id($id = FALSE) {
      $this->toJoin = array(
        'service_type' => 'service_info' ,
        'service_class' => 'service_info' ,
        'availability_status' => 'service_info' ,
        'price' => 'service_info'
      );
      $this->db->where('service_info.on_delete IS NULL');
      $this->db->where(array(
        'price >' => 0 ,
        'service_info.service_type_id' => $id ,
      ));

      return $this->get();
    }


  }