<?php
/**
 * Created by PhpStorm.
 * User: CoreI3
 * Date: 3/28/2016
 * Time: 11:23 PM
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');
}
class Reservation extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('products');
    $this->load->model('price');
    $this->load->model('barcode');
  }

  public function product() {

    $title = 'Product Reservation';
    $data = array(
      'title' => $title,
      'heading' => $title,
      'user_info'=>$this->userInfo
    );

    $this->load->view('templates/header' , $data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/nav',$data);
    $this->load->view('reservation/product', $data);
    $this->load->view('templates/footer');
  }

  public function load_product(){
    $p = new Products();
    foreach($p->get_product_pricing() as $list){
      $data[] = array(
        'product'=>ucwords($list->prod_name),
        'price'=>'&#8369 '.number_format($list->price,2),
        'qty'=>'<input type="text" id="qty" class="form-control input-sm">',
      );
      echo json_encode($data);
    }
  }

}
