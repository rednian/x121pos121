<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 3/9/2016
   * Time: 10:01 AM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Product_pricing extends MY_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('products');
      $this->load->model('barcode');
      $this->load->model('product_type');
      $this->load->model('product_class');
      $this->load->model('price');
    }

    /**
     *display default page of pricing
     */
    public function index() {
      $p = new Products();
      $data = array(
        'title' => 'Product Pricing' ,
        'heading' => 'Product Pricing' ,
        'user_info' => $this->userInfo
      );
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('pricing/product' , $data);
      $this->load->view('templates/footer');

    }

    public function get_unprice_product() {
      $b = new Barcode();
      $id = trim($this->input->get('id'));
      $data = array();
      foreach ($b->get_unprice_product_by_id($id) as $product) {
        $data[] = array(
          'id' => $product->pricing_id,
          'bc_id' => $product->bc_id,
          'image' => $product->prod_image ,
          'name' => $product->prod_name ,
          'barcode' => $product->barcode ,

        );
      }
      echo json_encode($data);
    }

    public function get_unprice() {
      $b = new Barcode();
      $data = array();
      foreach ($b->get_unprice_product() as $b) {
        $data[] = array(
          'barcode' => html_escape($b->barcode) ,
          'product' => '<img class="" style="width: 30px" src="' . base_url('uploads/' . html_escape($b->prod_image)) . '">' .
            ' ' . html_escape($b->prod_name) ,
          'class' => html_escape($b->prod_class) ,
          'type' => $b->prod_type ,
          'action' => '<button onclick="get_unprice('.html_escape($b->pricing_id). ')" class="btn btn-xs btn-success">add price</button>'
        );
      }
      echo json_encode($data);

    }



    public function update() {

      $p = new Price();

      if (array_key_exists('id' , $_POST)) {

        $p->load(trim($this->input->post('id')));

        $price = trim($this->input->post('price'));
        $mark_up = trim($this->input->post('mark_up'));
        $bc_id = trim($this->input->post('bc_id'));

        $p->bc_id = $bc_id;
        $p->price= $price;
//        $p->vat = $price
        $p->mark_up = $mark_up/100;
        $p->save();
        if ($p->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }


    }

    public function get_selected() {

      $barcode = $this->input->get('barcode');

      $d = array();

      $p = new Products();

      foreach ($p->get_selected_barcode_id($barcode) as $list) {
        $d[] = array(
          'barcode' => $list->barcode ,
          'vat' => number_format($list->vat , 2) ,
          'price' => number_format($list->price , 2) ,
          'id' => $list->pricing_id ,
          'image' => $list->prod_image ,
        );
      }
      echo json_encode($d);
    }
  }
