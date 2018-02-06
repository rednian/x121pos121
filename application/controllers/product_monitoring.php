<?php
  /**
   * Created by PhpStorm.
   * User: CoreI3
   * Date: 3/29/2016
   * Time: 1:15 AM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Product_monitoring extends MY_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('products');
      $this->load->model('price');
      $this->load->model('barcode');
      $this->load->model('stock_in');
      $this->load->model('history_stock_in');
      $this->load->model('stock_out_history');
      $this->load->model('trans_code');
    }

    public function index() {

      $title = 'Product Monitoring';
      $data = array(
        'title' => $title ,
        'heading' => $title ,
        'user_info' => $this->userInfo
      );

      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('monitoring/product' , $data);
      $this->load->view('templates/footer');
    }

    public function out_product(){
        if(array_key_exists('id', $_POST)){
            $id = $this->input->post('id');
            
            $s = new Stock_in();
            $result = $s->search(array('stock_in_id'=>$id));

              if(!empty($result)){
                foreach ($result as $temp) {
                  $data = array(
                    'qty'=>$temp->quantity,
                    'bc_id'=>$temp->bc_id
                    );
                
                }

                $user = $this->session->userdata('logged_in');

                $st = new Stock_in();
                $st->load($id);
                $st->quantity = $data['qty'] - $this->input->post('qty');
                $st->save();

                $trans_code = new Trans_code();
                $trans_code->acc_id = $user['id'];
                $trans_code->t_date = date('Y-m-d');
                $trans_code->t_time = date('h:i:s a');
                $trans_code->t_code = $this->generate_transcode();
                $trans_code->save();

                 $trans_code_id = $trans_code->db->insert_id();

                $sto = new stock_out_history();
                $sto->time_out = date('h:i:s');
                $sto->date_out = date('Y-m-d');
                $sto->bc_id = $data['bc_id'];
                $sto->bc_id = $data['bc_id'];
                $sto->tc_id = $trans_code_id;
                $sto->quantity = $this->input->post('qty');
                $sto->type_id = 2;
                $sto->save();

                if($this->db->affected_rows() > 0){
                  echo 1;
                }

              }
        
        }
    }

    public function get_id(){
      if(array_key_exists('name', $_POST)){
        
        $name = $this->input->post('name');

        $b = new Barcode();
        $result = $b->get_consumable_id($name);
        if(!empty($result)){
          foreach ($result as $temp) {
            $data[] = array(
              'id'=>$temp->stock_in_id,
              'qty'=>$temp->quantity
                );
          }
          echo json_encode($data);
        }

      }
    }

    public function consumable_list(){
      
      $b = new Barcode();
      $data = array();

      $result = $b->get_consumable();
      if(!empty($result)){
        foreach ($result as $temp) {
          $data[] = array(
            'barcode'=>$temp->barcode,
            'name'=>ucwords($temp->prod_name),
            'price'=>$temp->price + $temp->vat,
            'qty'=>number_format($temp->quantity),
            'make'=>$temp->prod_made_date,
            'expire'=>$temp->prod_date_exp,
            'weight'=>$temp->prod_weight,
            );
        }
        echo json_encode(array('data'=>$data));
      }
    }

    public function get_consumable(){
      $b = new Barcode();
      $result = $b->get_consumable();

      if(!empty($result)){
        foreach ($result as $temp) {
          $data[] = array(
            'name'=>ucwords($temp->prod_name),
            'qty'=>ucwords($temp->quantity),
            'id'=>ucwords($temp->stock_in_id),
            );
        }
        echo json_encode($data);
      }
    }


    public function monitoring() {
      if (array_key_exists('status' , $_POST)) {
        $status = trim($this->input->post('status'));
        $b = new Barcode();
        $data = array();
        switch ($status) {
          case 'active':
            foreach ($b->get_on_hand() as $list) {
              $data[] = array(
                'product' => '<img style="width: 60px; margin-right: 1%" src="' . base_url('uploads/' . $list->prod_image)
                  . '">' . ' ' . html_escape($list->prod_name) ,
                'price' => ' &#8369; ' . html_escape(product_retail($list->price , $list->mark_up , $list->vat)) ,
                'qty' => number_format($list->quantity) ,
                'make' => html_escape($list->prod_made_date) ,
                'expire' => html_escape($list->prod_date_exp) ,
                'weight' => html_escape($list->prod_weight . $list->unit) ,
              );
            }
            break;
          case 'inactive':
            foreach ($b->get_inactive() as $list) {
              $data[] = array(
                'product' => '<img style="width: 60px; margin-right: 1%" src="' . base_url('uploads/' . $list->prod_image)
                  . '">' . ' ' . html_escape($list->prod_name) ,
                'price' => ' &#8369; ' . html_escape(product_retail($list->price , $list->mark_up , $list->vat)) ,
                'qty' => number_format($list->quantity) ,
                'make' => html_escape($list->prod_made_date) ,
                'expire' => html_escape($list->prod_date_exp) ,
                'weight' => html_escape($list->prod_weight . $list->unit) ,
              );
            }
            break;
          case 'low':
            foreach ($b->get_low_product() as $list) {
              $data[] = array(
                'product' => '<img style="width: 60px; margin-right: 1%" src="' . base_url('uploads/' . $list->prod_image)
                  . '">' . ' ' . html_escape($list->prod_name) ,
                'price' => ' &#8369; ' . html_escape(product_retail($list->price , $list->mark_up , $list->vat)) ,
                'qty' => number_format($list->quantity) ,
                'make' => html_escape($list->prod_made_date) ,
                'expire' => html_escape($list->prod_date_exp) ,
                'weight' => html_escape($list->prod_weight . $list->unit) ,
              );
            }
            break;
        }

        echo json_encode($data);


      }
    }


    public function is_barcode_exist() {
      $barcode = trim($this->input->post('barcode'));
      $b = new Barcode();
      $data = array();
      $result = $b->search(array('barcode' => $barcode));
      if (!empty($result)) {
        foreach ($b->get_product_by_barcode($barcode) as $list) {
          $data[] = array(
            'type' => $list->prod_type ,
            'weight' => $list->prod_weight ,
            'weight_type' => $list->unit ,
            'bc_id' => $list->bc_id ,
            'class' => $list->prod_class ,
            'name' => $list->prod_name ,
            'image' => $list->prod_image ,
            'subname' => $list->prod_subname ,
            'packaging_type' => $list->prod_packaging_type ,
            'barcode' => $list->barcode ,
            'stock' => $list->quantity ,
            'stock_id' => $list->stock_in_id ,
            'manufacturer' => $list->prod_manufacturer ,
            'expire' => $list->prod_date_exp ,
            'input' => $list->prod_made_date ,
            'description' => html_escape(strip_tags($list->prod_desc)) ,
          );
        }
        echo json_encode($data);
      } else {
        echo 0;
      }

    }

   


  }

