<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 4/18/2016
   * Time: 2:24 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Reward extends MY_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('products');
      $this->load->model('price');
      $this->load->model('barcode');
      $this->load->model('customers');
      $this->load->model('card_holder');
      $this->load->model('point');
      $this->load->model('purchase_pointing');
    }

    public function index() {
      $users = new User();
      $data = array(
        'title' => 'Reward' ,
        'heading' => 'Reward' ,
        'user_info' => $this->userInfo
      );
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('reward/list' , $data);
      $this->load->view('templates/footer');

    }

    public function update_card_holder(){
      if(array_key_exists('ch_id',$_POST)){

        $ch_id = trim($this->input->post('ch_id'));
        $cus_id = trim($this->input->post('cus_id'));

        $cus = new Customers();
        $cus->load($cus_id);
        $cus->fname = trim($this->input->post('fname'));
        $cus->lname = trim($this->input->post('lastname'));
        $cus->contact = trim($this->input->post('contact'));
        $cus->block = trim($this->input->post('block'));
        $cus->brgy = trim($this->input->post('brgy'));
        $cus->city= trim($this->input->post('city'));
        $cus->country= trim($this->input->post('country'));
        $cus->lot_num= trim($this->input->post('lot'));
        $cus->province= trim($this->input->post('province'));
        $cus->zipcode= trim($this->input->post('zipcode'));
        $cus->street= trim($this->input->post('street_name'));
        $cus->save();

        $ch = new Card_holder();
        $ch->load($ch_id);
        $ch->card_no =  trim($this->input->post('card_number'));
        $ch->save();

        if($this->db->affected_rows() > 0){
          echo 1;
        }
        else{
          echo 0;
        }

      }
    }

    public function update_display(){
      if(array_key_exists('id', $_POST)){
        $ch = new Card_holder();
        $id = trim($this->input->post('id'));
        $result = $ch->detail_by_id($id);
        foreach($result as $detail){
         $data[]=$detail;
        }
        echo json_encode($data);
        
      }
    }

    public function display_points() {
      $ch = new Card_holder();
      $list = $ch->lists();
      if (!empty($list)) {
        $data = array();
        foreach ($list as $lists) {
          $data[] = array(
            'points' => html_escape($lists->points) ,
            'contact' => html_escape($lists->contact) ,
            'card' => html_escape($lists->card_no) ,
            'name' => '<img src="' . base_url('uploads/' . $lists->image) . '" style="width: 60px; height: 70px">' . html_escape
              ($lists->fname) . ' '
              . html_escape($lists->lname) ,
            'action' => '<button onclick="view_details('.$lists->ch_id.')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"></span></button>
                        <button id="btn-reward-update" onclick="update_details('.$lists->ch_id.')" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>'

          );
        }
        echo json_encode($data);
      }
    }

    public function set_point() {
      if (array_key_exists('amount' , $_POST)) {
        $p = new Point();
        $result = $p->get();
        if (!empty($result)) {
          foreach ($result as $list) {
            $data = array(
              'id' => $list->id ,
              'amount' => $list->amount ,
            );
            $p->load($data['id']);
            $p->amount = trim($this->input->post('amount'));
          }
        } else {
          $p->amount = trim($this->input->post('amount'));
        }
        $p->save();
        if ($p->db->affected_rows() > 0) {
          echo 1;
        }
      }
    }

    public function add_card_holder() {
      if (array_key_exists('card_number' , $_POST)) {
        $this->db->trans_start();
        $cus = new Customers();
        $cus->fname = trim(ucwords($this->input->post('fname')));
        $cus->lname = trim(ucwords($this->input->post('lastname')));
        $cus->contact = trim($this->input->post('contact'));
        $cus->country = trim(strtoupper($this->input->post('country')));
        $cus->lot_num = trim($this->input->post('lot'));
        $cus->street = trim(ucwords($this->input->post('street_name')));
        $cus->block = trim($this->input->post('block'));
        $cus->brgy = trim(ucwords($this->input->post('barangay')));
        $cus->province = trim(ucwords($this->input->post('province')));
        $cus->city = trim(ucwords($this->input->post('city')));
        $cus->zipcode = trim($this->input->post('zip_code'));
        $cus->save();

        $last_id = $cus->db->insert_id();
        $card = new Card_holder();
        $card->cus_id = $last_id;
        $card->date_reg = date('Y-m-d');
        $card->card_no = trim($this->input->post('card_number'));

        if ($_FILES['image']['error'] == 0) {
          $this->do_upload('image' , 'customer');
          $file = $this->upload->data('file_name');
          $card->image = 'customer/' . $file;
        }
        $card->save();

        /*set the points to default zero*/
        $purchase = new Purchase_pointing();
        $purchase->points = 0;
        $purchase->ch_id =  $card->db->insert_id();
        $purchase->save();


        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
          $card->db->trans_rollback();
          $cus->db->trans_rollback();
          echo 0;
        } else {
          $cus->db->trans_commit();
          $card->db->trans_commit();
          echo 1;
        }


      }


    }
  }