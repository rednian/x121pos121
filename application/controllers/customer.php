<?php

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Customer extends MY_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('customers');
    }

    /*
     * list of customer
     *
     * */
    public function index() {

      $customer = new Customers();

      $data = array(
        'title' => 'Customer List' ,
        'heading' => 'Customer List' ,
        'customer' => $customer->lists() ,
        'user_info' => $this->userInfo
      );

      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('customer/customer_list' , $data);
      $this->load->view('templates/footer');

    }

    /**
     *  add new customer
     * */
    public function new_customer() {
      $data = array(
        'title' => 'Add New Customer' ,
        'heading' => 'Add New Customer' ,
        'user_info' => $this->userInfo
      );

      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('customer/add_new_customer' , $data);
      $this->load->view('templates/footer');
    }

    public function customer_list() {
      $customer = new Customers();
      $data = array();
      foreach ($customer->lists() as $list) {
        $data[] = array(
            'name' => '<strong>' . ucwords($list->lname . ', ' . $list->fname) . '</strong>' ,
            'contact' => '<strong>' . html_escape($list->contact) . '</strong>' ,
            'address' => '<strong>' . ucwords($list->block . ', ' . $list->lot_num . ', ' . $list->street . ', ' . $list->brgy . ', ' . $list->city . ', ' . $list->province . ', ' . $list->country . ', ' . $list->zipcode) . '</strong>' ,
            'action' => '<a class="btn btn-xs btn-dark" href="' . base_url('customer/customer_profile/' . base64_encode($list->cus_id)) . '"><span class="glyphicon glyphicon-folder-open"></span></a>'
        );
      }
      echo json_encode($data);
    }


    /**
     *  this function use only for inserting data from form.
     * */
    public function add() {

      $c = new Customers();
      $c->fname = $this->input->post('fname');
      $c->lname = $this->input->post('lastname');
      $c->contact = $this->input->post('contact');
      $c->block = $this->input->post('block');
      $c->lot_num = $this->input->post('lot');
      $c->street = $this->input->post('street');
      $c->brgy = $this->input->post('brgy');
      $c->city = $this->input->post('city');
      $c->zipcode = $this->input->post('zipcode');
      $c->province = $this->input->post('province');
      $c->country = $this->input->post('country');

      $c->save();
      if ($c->db->affected_rows() > 0) {
        echo 'Customer Successfully Saved';
      } else {
        echo 'Customer failed to saved. Please try again.';
      }


    }

    public function recently_added() {
      $customer = new Customers();
      $customer = $customer->limit8();

      foreach ($customer as $list) {
        $lists[] = array(
          'name' => $list->lname . ', ' . $list->lname ,
          'contact' => $list->contact ,
          'address' => $list->street . ', ' . $list->city
        );
        echo json_encode($lists);

      }

    }

    public function customer_profile($id = FALSE) {
      $id = base64_decode($id);
      print_r($id);
    }

  }
