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

    public function is_card_exist() {
      $cards = new Card_holder();
      $valid = TRUE;
      $username = array();
      foreach ($cards->get() as $card) {
        array_push($username , $card->card_no);
      }
      if (isset($_POST['card_number']) && in_array(strtolower($_POST['card_number']) , $username)) {
        $valid = FALSE;
      }
      echo json_encode(array('valid' => $valid));
    }




    public function get_set_point(){
      $p = new Point();
      if(!empty($p->get())){
        foreach ($p->get() as $p) {
          $data[] = array(
            'point'=>$p->amount
            );
        }
        echo json_encode($data);
      }
    }

    public function update_card_holder(){
      if(array_key_exists('ch_id',$_POST)){
        $this->db->trans_start();
        $cus_id = trim($this->input->post('cus_id'));
        $cus = new Customers();
        $cus->load($cus_id);
        $cus->fname = trim($this->input->post('fname'));
        $cus->lname = trim($this->input->post('lastname'));
        $cus->contact = trim($this->input->post('contact'));
        $cus->lot_num = trim($this->input->post('lot'));
        $cus->block = trim($this->input->post('block'));
        $cus->street = trim($this->input->post('street_name'));
        $cus->brgy = trim($this->input->post('barangay'));
        $cus->city = trim($this->input->post('city'));
        $cus->province = trim($this->input->post('province'));
        $cus->zipcode = trim($this->input->post('zip_code'));
        $cus->country = trim($this->input->post('country'));
        $cus->save();

        $ch_id = trim($this->input->post('ch_id'));
        $card = new Card_holder();
        $card->load($ch_id);
        // $card->card_no = trim($this->input->post('card_number'));

        if ($_FILES['image']['error'] == 0) {
          $this->do_upload('image' , 'customer');
          $file = $this->upload->data('file_name');
          $card->image= 'customer/' . $file;
        }
        
        $card->save();
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
          $this->db->trans_rollback();
          echo 0;
        }
        else
        {
          $this->db->trans_commit();
          echo 1;
        }

      }
    }

    public function update_display(){
      if(array_key_exists('id',$_POST)){

        $id = trim($this->input->post('id'));
        $c = new Card_holder();
        foreach($c->detail_by_id($id) as $d){
          $data[] = $d;
        }
        echo json_encode($data);
      }
    }

    public function display_points() {

      $ch = new Card_holder();

      $list = $ch->lists();

      $data = array();

      if (!empty($list)) {
      
        foreach ($list as $lists) {
          $data[] = array(
            'points' => '<b>'.html_escape(number_format($lists->points)).'</b>' ,
            'image'=>base_url('uploads/' . $lists->image) ,
            'contact' => html_escape($lists->contact) ,
           'address'=>html_escape($lists->street).', '.html_escape($lists->brgy).', '.html_escape($lists->city),
            'card' => html_escape($lists->card_no) ,
            'name' => '<b>'.html_escape(ucwords($lists->fname)) . ' '. html_escape(ucwords($lists->lname)).'</b>' ,
            'actions' => '<button type="button" onclick="details('.$lists->ch_id.')" class="btn btn-xs btn-white m-r-5"><span class="fa fa-folder-open-o"></span></button>
                          <button type="button" onclick="update_details('.$lists->ch_id.')" class="btn btn-xs btn-white m-r-5"><span class="fa fa-pencil"></span></button>'

          );
        }
       
      }
       echo json_encode(array('data'=>$data));
    }

    public function redeem_service(){
      if($this->input->method() == 'post' && array_key_exists('service_id', $_POST)){

        $service_id = trim($this->input->post('service_id'));
        $card_id = trim($this->input->post('card_id'));
        $price = trim($this->input->post('price'));
        $vat = trim($this->input->post('vat'));
        $data = array();

        $this->load->model('service_redeem');
        $user = $this->session->userdata('logged_in');

        $service_redeem = new Service_redeem();
        $service_redeem->service_info_id = $service_id;
        $service_redeem->ch_id = $card_id;
        $service_redeem->date = date('Y-m-d');
        $service_redeem->acc_id = $user['id'];
        $service_redeem->price = $price;
        $service_redeem->vat = $vat;
        $service_redeem->save();

        $purchase_pointing = new Purchase_pointing();
        $result = $purchase_pointing->search(array('ch_id'=>$card_id));

        if(!empty($result)){
          foreach ($result as $temp) {
            $data = array(
              'id'=>$temp->pointing_id,
              'point'=>$temp->points,
              );
          }
        }

         $pointing = new Purchase_pointing();
         $pointing->load($data['id']);
         $pointing->points = $data['point'] - ($price + $vat);
         $pointing->save(); 



        if($this->db->affected_rows() > 0){
            echo 1;
        } 
        else{
          echo 0;
        }



      }
    }

    public function available_services(){
      if($this->input->method() == 'post'){

       $point = trim($this->input->post('point'));
       $id = trim($this->input->post('id'));

       $point = str_replace(',', '', $point);

       $this->load->model('service_info');

       $service_info = new service_info();
       
       $result = $service_info->services_can_avail($point);

       $data =array();
       $i = 0;

        if(!empty($result)){
          foreach ($result as $temp) {
            $i++;
            $data[] = array(
              'num'=>$i,
              'id'=>$temp->service_info_id, 
              'image'=>base_url('uploads/'.$temp->service_image),
              'service'=>ucwords($temp->service_name),
              'price'=>number_format($temp->price + $temp->vat),
              'action'=>'<button onclick="redeem('.$temp->service_info_id.','.$id.','.$temp->price.','.$temp->vat.')" class="btn btn-xs btn-success"><span class="fa fa-check"></span> redeem</button>',
              );
            
          }
        }
        echo json_encode(array('data'=>$data));
      }
    } 

    public function card_holder_details(){

      if(array_key_exists('id', $_POST) && $this->input->method() == 'post'){

        $card_holder = new card_holder();

        $id = trim($this->input->post('id'));

        $result = $card_holder->detail_by_id($id);

        $data =array();

          if(!empty($result)){

            foreach ($result as $temp) {
              $data[] = array(
                'id'=>$temp->ch_id,
                'point'=>html_escape(number_format($temp->points)),
                'name'=>html_escape(ucwords($temp->fname)).' '.html_escape(ucwords($temp->lname)),
                'card'=>html_escape($temp->card_no),
                'contact'=>html_escape($temp->contact),
                'address'=>html_escape(ucfirst($temp->street)).', '.html_escape(ucfirst($temp->brgy)).', '.html_escape(ucfirst($temp->city)),
                'image'=>base_url('uploads/' . $temp->image) ,
                );
            }
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


        if ($_FILES['image']['size'] == 0) {
          $card->image = 'default/user.png';
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