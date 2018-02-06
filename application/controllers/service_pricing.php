<?php
  /**
   * Created by PhpStorm.
   * User: CoreI3
   * Date: 3/27/2016
   * Time: 4:15 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Service_pricing extends MY_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('Service_info');
      $this->load->model('Service_class');
      $this->load->model('Service_type');
      $this->load->model('price');
    }

    /**
     *display default page of pricing
     */
    public function index() {
      $s = new Service_info();
      $data = array(
        'title' => 'Service Pricing' ,
        'heading' => 'Service Pricing' ,
        'user_info' => $this->userInfo
      );

      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('pricing/service' , $data);
      $this->load->view('templates/footer');

    }

    public function unprice_services() {
      $s = new Service_info();
      $data = array();
      foreach ($s->unprice_services() as $service) {
        $data[] = array(
          'service' => '<img style="width:60px;" src="' . base_url('uploads/' . $service->service_image) . '">' . ' ' . $service->service_name ,
          'type' => ucwords($service->service_type) ,
          'class' => ucwords($service->service_class) ,
          'action' => '<button onclick="get_id(' . $service->service_info_id . ')" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> add price</button>'
        );
      }
      echo json_encode($data);
    }


    public function get_selected() {
      $s = new Service_info();
      $data = array();
      foreach ($s->get_selected_by_id($this->input->get('id')) as $service) {
        $data[] = array(
          'service_id'=>$service->service_info_id,
          'pricing_id'=>$service->pricing_id,
          'name'=>$service->service_name,
          'image'=>'<img class="img-responsive" src="'.base_url('uploads/'.$service->service_image).'">',
        );
      }
      echo json_encode($data);


    }

    public function update_price(){
      $p = new Price();
      if(array_key_exists('service_id',$_POST)){
      $p->load($this->input->post('pricing_id'));
      
        $p->price = $this->input->post('price');
        $p->service_info_id = $this->input->post('service_id');
        $p->save();
        if($p->db->affected_rows() > 0){
          echo 1;
        }
        else{
          echo 0;
        }
      }


    }

  }
