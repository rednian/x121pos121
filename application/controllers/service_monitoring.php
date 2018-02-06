<?php
  /**
   * Created by PhpStorm.
   * User: CoreI3
   * Date: 04/04/2016
   * Time: 1:15 AM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Service_monitoring extends MY_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('service_info');
      $this->load->model('service_rendered');
    }

    public function index() {
      $service = $this->service_info->get_info_list();
      $rendered = $this->service_rendered->get_rendered_services();

      $title = 'Service Monitoring';
      $data = array(
        'title' => $title ,
        'heading' => $title ,
        'available_services' => $service ,
        'rendered_services' => $rendered ,
        'user_info' => $this->userInfo
      );
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('monitoring/service' , $data);
      $this->load->view('templates/footer');
    }

    public function service_available() {
      $s = new Service_info();
      $data = array();
      foreach ($s->get_info_list() as $list) {
        $label = '';
        if ($list->status == 'available') {
          $label = 'btn btn-xs btn-success';
        } else {
          $label = ' btn btn-xs btn-danger';
        }
        $data[] = array(
          'id' => $list->service_info_id ,
          'service' => '<img style="width: 60px" src="' . base_url('uploads/' . $list->service_image) . '">' . ' ' . $list->service_name ,
          'type' => $list->service_type ,
          'class' => $list->service_class ,
          'price' => ' &#8369; ' . get_service_sale_price($list->price , $list->vat) ,
          'status' => ' <button onclick="update_availability(' . $list->as_id . ',' . $list->status . ');" class="' . $label . '">' . $list->status . '</button>' ,
          'description' => $list->service_desc ,
        );
      }
      echo json_encode($data);

    }


    public function service_rendered() {
      $s = new Service_rendered();
      $data = array();
      foreach ($s->get_rendered_services() as $rendered) {
        $date = date_create($rendered->date_rendered);
        $date = date_format($date,'F d, Y');
        $data[] = array(
          'service' => '<img style="width: 60px" src="' . base_url('uploads/' . $rendered->service_image) . '">' . ' ' . $rendered->service_name ,
          'type' => $rendered->service_type ,
          'class' => $rendered->service_class ,
          'remark' => $rendered->remarks ,
          'price' => ' &#8369; '.number_format($rendered->price ,2),
          'date' => $date,
        );
      }
      echo json_encode($data);
    }

    // public function update_status() {
    //   $id = trim($this->input->post('id'));
    //   $a = new Availability_status();
    //   $a->load($id);

    // }

  }

