<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 4/18/2016
   * Time: 3:01 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Sell extends MY_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('temp_table');
      $this->load->model('stock_in');
      $this->load->model('service_info');
      $this->load->model('barcode');
      $this->load->model('Stock_out_history');
      $this->load->model('Stock_history_type');
      $this->load->model('Stock_out');
      $this->load->model('trans_code');
      $this->load->model('point');
      $this->load->model('card_holder');
      $this->load->model('purchase_pointing');
      $this->load->model('Purchase_pointing_history');
      $this->load->model('Service_temp');
      $this->load->model('Service_rendered');
      $this->load->model('Reimburse');
      $this->load->model('Company_model');
      $this->load->model('Reciept_info');
      $this->load->model('user_accessibility_option');
      $this->load->model('Artist_model');
      $this->load->model('package');
      $this->load->model('service_artist_temp');
      $this->load->model('Artist_commission_model');
      $this->load->model('package_temp');
    }

    

    public function index() {

      $users = new User();
      $data = array(
        'title' => 'Sell' ,
        'heading' => 'Sell' ,
        'user_info' => $this->userInfo
      );



      $user_info = $this->userInfo;

      $this->load->view('templates/header' , $data);
      if(strtolower($user_info['position']) != 'cashier'){
         $this->load->view('templates/sidebar' , $data);
      }
      $this->load->view('templates/nav' , $data);
   
      $this->load->view('sell/common' , $data);
      $this->load->view('templates/footer');
    }

    
    /*--------------------------------------*/
    /*----------[ package  ]---------------*/ 
    /*--------------------------------------*/

    public function remove_all_packages(){
     
     $temp = new Package_temp();
     $user = $this->session->userdata('logged_in');
     $temp->db->delete('package_temp' , array('acc_id' => $user['id']));
      if ($temp->db->affected_rows() > 0) {
        echo $temp->db->affected_rows();
      } else {
        echo 0;
      }

    }



      public function  search_packages() {
      if (array_key_exists('search' , $_POST)) {
        $this->load_packages(trim($this->input->post('search')));
      }
    }

    public function remove_packages(){
      if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {
         

         $package = new Package_temp();

         $id = trim($this->input->post('id'));

         $package->load($id);
         $package->delete();

         if($this->db->affected_rows() > 0){
          echo 1;
         }
         else{
          echo 0;
         }

      }
    }

    public function load_package_temp(){
      
      $package = new Package_temp();
      $result = $package->get_list();

      $data = array();
      $total =0;
      $price = 0;
      $discount = 0;
      $qty = 0;
      $vat = 0;


      if(!empty($result)){
        foreach ($result as $temp) {
          
          $price = $temp->price;
          $vat = $temp->vat;
          $discount = $temp->discount;
          $qty = $temp->qty;
          $total = $qty * ($price + $vat);

          $data[] =array(
            'name'=>ucwords($temp->name),
            'price'=>number_format($price + $vat,2),
            'qty'=>number_format($qty),
            'discount'=>'<a href="#" class="value" data-type="text" data-pk="'.$temp->id.'" >'.number_format($temp->discount).'</a>',
            'total'=>number_format(discounted_price($temp->price, 0, $temp->vat, $temp->discount) * $temp->qty,2),
            'action'=>'<button class="btn btn-xs btn-link" onclick="remove_package('.$temp->id.')"><span class="fa fa-remove"></span></button>
                      <button class="btn btn-xs btn-link" onclick="add_artist_package('.$temp->p_id.','.$total.','.$temp->id.')"><span class="fa fa-user"></span></button>',
            );
        }
        
      } 
      echo json_encode(array('data'=>$data));
    }


    public function add_package_temp() {

      if (array_key_exists('id' , $_POST) && $this->input->method() == 'post') {

        $data = array();

        $id = trim($this->input->post('id'));
        $user = $this->session->userdata('logged_in');

      
        // $s = new Service_info();

        $package = new Package();
        $package_result = $package->search(array('p_id'=>$id));


        if (!empty($package_result)) {
          foreach ($package_result as $temp) {
            $data_package =array(
              'type'=>$temp->type,
              'price'=>$temp->price,
              'vat'=>$temp->vat,
              'name'=>$temp->package_name,
              'id'=>$temp->p_id,
              );
          }

        


          $package_temp_search = new Package_temp();

          //search package id if already exist in package temp
          $package_temp_search_result = $package_temp_search->search(array('p_id'=>$data_package['id'],'acc_id'=>$user['id']));

          if (empty($package_temp_search_result)) {
            
            $package_temp = new Package_temp();
            $package_temp->p_id = $id;
            $package_temp->price = $data_package['price'];
            $package_temp->vat = $data_package['vat'];
            $package_temp->acc_id = $user['id'];
            $package_temp->type = $data_package['type'];
            $package_temp->name = $data_package['name'];
            $package_temp->last_update = date('Y-m-d h:i:s');
            $package_temp->discount = 0;
            $package_temp->qty = 1;
            $package_temp->save();

          }
          else{
              
              foreach ($package_temp_search_result as $temp_package) {
                $data_temp = array(
                  'id'=>$temp_package->id,
                  'qty'=>$temp_package->qty,
                  );
              }

                $package_temp = new Package_temp();
                $package_temp->load($data_temp['id']);
                $package_temp->qty = $data_temp['qty'] + 1;
                $package_temp->last_update = date('Y-m-d h:i:s');
                $package_temp->save();




          }



        }


        // print_r($package_result);
      }

    }

    public function load_packages($search = false) {
     
      $package = new Package();
     
      $data = array();

      $i = 1;

      $packages = $package->get_packages($search);

      foreach ($packages as $temp) {

        $item   = '<section class="media" style="cursor:pointer; width:32%; border:1px #1d536b solid; display:inline-block; margin-right:1%; " 
                  onclick="add_package_temp(' . $temp->p_id . ')"  title="' .$temp->package_name  .'" >';
        $item  .=  '<a class="media-left">';
        $item  .=  '<img clss="media-object imgs"  src="'.base_url('uploads/'.$temp->image).'" style="width:60px; max-width:100px; height:100px; margin:5% " />';
        $item  .=  '</a>';
        $item  .=   '<div class="media-body">';
        $item  .=   '<h4 class="media-heading"><strong>'.substr(ucwords($temp->package_name) , 0 , 8).'</strong></h4>';
        $item  .=   '<h4 class="media-heading">&#8369; '.number_format($temp->price + $temp->vat,2).'</h4>';
        $item  .=   '</div>';
        $item  .= '</section>';

        

        if (empty($packages)) {
          $i = 0;
        }
        $data[] = array(
          'package' => $item ,
          'count' => $i ,
        );
        $i ++;
      }
      echo json_encode($data);

    }

   /*--------------------------------------*/
    /*----------[ artist   ]---------------*/
    /*--------------------------------------*/

    public function package_transer_artist(){

       $user = $this->session->userdata('logged_in');
       $this->load->model('artist_temp_package');

       $artist_temp = new artist_temp_package();
       $data =array();

       $result = $artist_temp->search(array('acc_id'=>$user['id']));

       if(!empty($result)){
          foreach ($result as $temp) {
            $data[] =array(
              'acc_id'=>$temp->acc_id,
              'ar_id'=>$temp->ar_id,
              'id'=>$temp->id,
              'p_id'=>$temp->p_id,
              'commission'=>$temp->commission,
              );
          }

           $this->db->insert_batch('Package_artist_temp' , $data);
           $this->db->delete('artist_temp_package' , array('acc_id' => $user['id']));

           if($this->db->affected_rows() > 0){
              echo 1;
           }
           else{
            echo 0;
           }
       }

    }


    public function service_transer_artist(){

       $user = $this->session->userdata('logged_in');
       $this->load->model('Artist_temp');

       $artist_temp = new Artist_temp();
       $data =array();

       $result = $artist_temp->search(array('acc_id'=>$user['id']));

       if(!empty($result)){
          foreach ($result as $temp) {
            $data[] =array(
              'acc_id'=>$temp->acc_id,
              'ar_id'=>$temp->ar_id,
              'id'=>$temp->id,
              'service_info_id'=>$temp->service_info_id,
              'commission'=>$temp->commission,
              );
          }

           $this->db->insert_batch('service_artist_temp' , $data);
           $this->db->delete('Artist_temp' , array('acc_id' => $user['id']));

           if($this->db->affected_rows() > 0){
              echo 1;
           }
           else{
            echo 0;
           }
       }

    }

    public function artist_delete(){

      if(array_key_exists('id', $_POST) && $this->input->method() == 'post'){

      $this->load->model('Artist_temp');

      $id = trim($this->input->post('id'));

       $artist_temp = new Artist_temp();

       $artist_temp->load($id);
       $artist_temp->delete();

       if($this->db->affected_rows() > 0){
        echo 1;
       }
       else{
        echo 0;   
       }




      }

    }


    public function artist_delete_package(){

      if(array_key_exists('id', $_POST) && $this->input->method() == 'post'){

      $this->load->model('artist_temp_package');

      $id = trim($this->input->post('id'));

       $artist_temp = new artist_temp_package();

       $artist_temp->load($id);
       $artist_temp->delete();

       if($this->db->affected_rows() > 0){
        echo 1;
       }
       else{
        echo 0;   
       }




      }

    }

    public function display_artist(){
      
      $this->load->model('Artist_temp');
      $user = $this->session->userdata('logged_in');

      $artist_temp = new Artist_temp();

      $result = $artist_temp->artist_temp_display($user['id']);

      $data = array();

      if(!empty($result)){
          foreach ($result as $temp) {
           $data[] = array(
           'name'=>ucwords($temp->fname).' '.ucwords($temp->midname).' '.ucwords($temp->lastname),
           'commission'=>number_format($temp->commission,2),
           'action'=> '<button class="btn btn-xs btn-white" onclick="artist_delete('.$temp->artist_id.')"><span class="fa fa-remove text-danger"></span></button>'
           );
          }
       
      } 

      echo json_encode(array('data'=>$data));

    }

    public function display_artist_package(){
      
      $this->load->model('artist_temp_package');
      $user = $this->session->userdata('logged_in');

      $artist_temp = new artist_temp_package();

      $result = $artist_temp->artist_temp_display($user['id']);

      $data = array();

      if(!empty($result)){
          foreach ($result as $temp) {
           $data[] = array(
           'name'=>ucwords($temp->fname).' '.ucwords($temp->midname).' '.ucwords($temp->lastname),
           'commission'=>number_format($temp->commission,2),
           'action'=> '<button class="btn btn-xs btn-white" onclick="artist_delete_package('.$temp->temp_id.')"><span class="fa fa-remove text-danger"></span></button>'
           );
          }
       
      } 

      echo json_encode(array('data'=>$data));

    }


    public function add_package_artist_temp(){
       if ($this->input->method() == 'post' && array_key_exists('artist_id', $_POST)) {

          

           $this->load->model('artist_temp_package');
           $user = $this->session->userdata('logged_in');


           $total = trim($this->input->post('total'));
           $commission = trim($this->input->post('commission'));

           $total = $total/2;
           $commission = $total*($commission/100);

           $artist_temp = new artist_temp_package();

           $artist_temp->ar_id = trim($this->input->post('artist_id'));
           $artist_temp->p_id = trim($this->input->post('package_id'));
           $artist_temp->id = trim($this->input->post('temp_id'));
           $artist_temp->commission = $commission;
           $artist_temp->acc_id = $user['id'];
           $artist_temp->save();

           if($this->db->affected_rows() > 0){
            echo 1;
           }
           else{
            echo 0;
           }

         }
    }



    public function add_artist_temp(){
       if ($this->input->method() == 'post' && array_key_exists('artist_id', $_POST)) {


           $this->load->model('artist_temp');
           $user = $this->session->userdata('logged_in');


           $total = trim($this->input->post('total'));
           $commission = trim($this->input->post('commission'));

           $total = $total/2;
           $commission = $total*($commission/100);

           $artist_temp = new Artist_temp();

           $artist_temp->ar_id = trim($this->input->post('artist_id'));
           $artist_temp->service_info_id = trim($this->input->post('service_info_id'));
           $artist_temp->id = trim($this->input->post('temp_id'));
           $artist_temp->commission = $commission;
           $artist_temp->acc_id = $user['id'];
           $artist_temp->save();

           if($this->db->affected_rows() > 0){
            echo 1;
           }
           else{
            echo 0;
           }

         }
    }




    public function add_artist_commission(){
  
      if ($this->input->method() == 'post' && array_key_exists('artist_id', $_POST)) {
    
        
           $this->load->model('Service_artist_temp');
           $user = $this->session->userdata('logged_in');


         
           $total = trim($this->input->post('total'));
           $commission = trim($this->input->post('commission'));

           $total = $total/2;
           $commission = $total*($commission/100);


           $artist_temp = new Service_artist_temp();
           $artist_temp->ar_id = trim($this->input->post('artist_id'));
           $artist_temp->service_info_id = trim($this->input->post('service_info_id'));
           $artist_temp->id = trim($this->input->post('temp_id'));
           $artist_temp->commission = $commission;
           $artist_temp->acc_id = $user['id'];
           $artist_temp->save();



           if($this->db->affected_rows() > 0 ){
            echo 1;
           }
           else{
            echo 0;
           }

       }

    }

    /*--------------------------------------*/
    /*----------[ package  ]---------------*/
    /*--------------------------------------*/

    public function package_temp_load(){
      
      $temp = new Service_temp();
      $data = array();

      if(!empty($temp->get_list())){
          $subtotal = $vat_total = $total = $grand_total =  0;
        foreach ($temp->get_list() as $temp) {

          $subtotal += $temp->price * $temp->qty; 
          $vat_total += $temp->vat * $temp->qty;
          $total = $temp->qty * ($temp->price + $temp->vat);

          $grand_total += $total;


          $data[] =array(
            'grand_total'=>number_format(discounted_price($temp->price, 0, $temp->vat, $temp->discount) * $temp->qty,2),
            'total'=>number_format(discounted_price($temp->price, 0, $temp->vat, $temp->discount) * $temp->qty,2),
            'subtotal'=>number_format(discounted_price($temp->price, 0, $temp->vat, $temp->discount) * $temp->qty,2),
            'vat_total'=>($vat_total),
            'qty'=>number_format($temp->qty),
            'price'=>number_format($temp->price + $temp->vat,2),
            'vat'=>number_format($temp->vat),
            'service'=>ucwords($temp->service_name),
            'discount'=>'0',
            'remove'=>'
              <div class="btn-group">
                <button id="btn-service-delete" class="btn btn-xs btn-link" onclick="delete_service('.$temp->id.')"><span class="fa fa-remove"></span></button>
                <a href="#artist-dialog" class="btn btn-xs btn-link" data-toggle="modal" data-price="'.$total.'" data-id="'.$temp->service_info_id.'" id="btn-add">
                   <span style="cursor:pointer" class="fa fa-user"></span>
                </a>
            '
            );
        }
       
      }
      
      echo json_encode(array('data'=>$data));
    }


    /*--------------------------------------*/
    /*----------[ services  ]---------------*/
    /*--------------------------------------*/




    public function  search_services() {
      if (array_key_exists('search' , $_POST)) {
        $this->load_services(trim($this->input->post('search')));
      }
    }



    public function get_artist(){
      
      $a = new Artist_model();
      $data = array();

      if(!empty($a->get())){
          foreach ($a->get() as $temp) {
            $data[] = array(  
              'id'=>$temp->ar_id,
              'name' => ucwords($temp->fname) . ' ' . ucwords($temp->midname) . ' ' . ucwords($temp->lastname)
              );
          }
     
      }
      echo json_encode($data);
    }

    public function service_avail_add() {

      if (array_key_exists('id' , $_POST)) {
        $data = array();
        $id = trim($this->input->post('id'));
      
        $s = new Service_info();

        $details = $s->view_details($id);
        if (!empty($details)) {
          foreach ($details as $detail) {
            $data = array(
              'service_id' => $detail->service_info_id ,
              'name' => $detail->service_name ,
              'price' => $detail->price ,
              'vat' => $detail->vat ,
            );
          }
           $user = $this->session->userdata('logged_in');

          /*save to service temp table*/
          $temp = new Service_temp();
          $temp_result = $temp->search(array('service_info_id'=>$data['service_id'], 'acc_id'=>$user['id']));

          if(!empty($temp_result)){
              foreach ($temp_result as $temp) {
                $service_data = array(
                  'qty'=>$temp->qty,
                  'id'=> $temp->id
                  );
              }
              
              $s = new Service_temp();
              $s->load($service_data['id']);
              $s->qty = $service_data['qty'] + 1;
              $s->save();

          }
          else{
            $temp = new Service_temp();
            $temp->price = $data['price'];
            $temp->vat = $data['vat'];
            $temp->service_info_id = $data['service_id'];
            $temp->acc_id = $user['id'];
            $temp->qty = 1;
            $temp->save();
            if($temp->db->affected_rows() > 0){
              echo 1;
            }
            else{
              echo 0;
            }
          }

          // if(empty($temp_result)){
           
          // }
          // else{
            /*notify that the service is already added*/
            // echo 'service already added';
          // }
        }
      }
    }

    public function remove_all_services(){
     $temp = new Service_temp();
     $user = $this->session->userdata('logged_in');
     $temp->db->delete('service_temp' , array('acc_id' => $user['id']));
      if ($temp->db->affected_rows() > 0) {
        echo $temp->db->affected_rows();
      } else {
        echo 0;
      }

    }

    public function remove_service(){
      if (array_key_exists('id', $_POST)) {
          
          $temp = new Service_temp();

          $id = trim($this->input->post('id'));

          $temp->load($id);
          $temp->delete();

          if($temp->db->affected_rows() > 0){
            echo 1;
          }
          else{
            echo 0;
          }
      }
    }


    public function service_temp_load(){
      
      $temp = new Service_temp();
      $data = array();

      if(!empty($temp->get_list())){
          $subtotal = $vat_total = $total = $grand_total =  0;
        foreach ($temp->get_list() as $temp) {

          $subtotal += $temp->price * $temp->qty; 
          $vat_total += $temp->vat * $temp->qty;
          $total = $temp->qty * ($temp->price + $temp->vat);

          $grand_total += $total;




          $data[] =array(
            'grand_total'=>($grand_total),
            'total'=>number_format(discounted_price($temp->price, 0, $temp->vat, $temp->discount) * $temp->qty,2),
            'subtotal'=>'',
            'vat_total'=>($vat_total),
            'qty'=>number_format($temp->qty),
            'price'=>number_format($temp->price + $temp->vat,2),
            'vat'=>number_format($temp->vat),
            'service'=>ucwords($temp->service_name),
            'discount'=>'<a href="#" class="value" data-type="text" data-pk="'.$temp->id.'" >'.number_format($temp->discount).'</a>',
            'remove'=>'
              <div class="btn-group">
                <button id="btn-service-delete" class="btn btn-xs btn-link" onclick="delete_service('.$temp->id.')"><span class="fa fa-remove"></span></button>
                <button id="art-id" data-id="'.$temp->service_info_id.'" class="btn btn-xs btn-link" onclick="artist_commission('.$temp->service_info_id.','.$total.','.$temp->id.')"><span class="fa fa-user"></span></button>
              
            '
            );
        }
       
      }
      
      echo json_encode(array('data'=>$data));
    }


    public function load_services($service = FALSE) {
      $s = new Service_info();
      $data = array();
      $i = 1;
      foreach ($s->service_available($service) as $s) {


        $item   = '<section class="media" style="cursor:pointer; width:32%; border:1px #1d536b solid; display:inline-block; margin-right:1%; " 
                    onclick="get_service_detail(' . $s->service_info_id . ')"  title="' . $s->service_type  .'" >';
        $item  .=  '<a class="media-left">';
        $item  .=  '<img clss="media-object imgs"  src="'.base_url('uploads/'.$s->service_image).'" style="width:60px; max-width:100px; height:100px; margin:5% " />';
        $item  .=  '</a>';
        $item  .=   '<div class="media-body">';
        $item  .=   '<h4 class="media-heading"><strong>'.substr(ucwords($s->service_name) , 0 , 8).'</strong></h4>';
        $item  .=   '<h4 class="media-heading">&#8369; '.number_format($s->price + $s->vat,2).'</h4>';
        $item  .=   '</div>';
        $item  .= '</section>';

        if (empty($s)) {
          $i = 0;
        }
        $data[] = array(
          'service' => $item ,
          'count' => $i ,
        );
        $i ++;
      }
      echo json_encode($data);

    }




    /*--------------------------------------*/
    /*-----[ finish transaction  ]----------*/
    /*--------------------------------------*/

    public function get_total(){

      /*
        package
      */
        $package_temp = new Package_temp();

        $package_total = 0;
        $package_price = 0;
        $package_vat = 0;
        $package_qty = 0;
        $package_discount= 0;


        $result = $package_temp->get_list();

        if (!empty($result)) {
          foreach ($result as $package_temp) {

            // $service_discount +=(($temp->price + $temp->vat) * $temp->qty) * $temp->discount/100;
            // $service_price +=(($temp->price + $temp->vat) * $temp->qty) - ($temp->vat * $temp->qty);

            $package_discount +=(($package_temp->price + $package_temp->vat) * $package_temp->qty) * $package_temp->discount/100;
            $package_price += $package_temp->price * $package_temp->qty;
            $package_vat += $package_temp->vat * $package_temp->qty;

          }

            $package_total = $package_price + $package_vat - $package_discount;

        }


      /*
        services
      */
      $s = new Service_temp();

      $count = 0;
      $product  = '';
      $total_discount = 0;
      $total_vat = 0;
      $sub_total = 0;
      $total = 0;
      $total =0;
      $service = array();
      $service_price = 0;
      $service_vat = 0;
      $service_discount = 0;


      $service_data =array();
      $service_price = $service_vat = $service_qty = $service_total= 0;
    


      if(!empty($s->get_list())){
          foreach ($s->get_list() as $temp) {

            // $total_discount += (($list->price + $list->mark_up + $list->vat) *$list->quantity) * $list->discount/100;
            // $sub_total      += (($list->price + $list->mark_up + $list->vat) *$list->quantity)- ($list->vat * $list->quantity);

            $service_discount +=(($temp->price + $temp->vat) * $temp->qty) * $temp->discount/100;
            $service_price +=(($temp->price + $temp->vat) * $temp->qty) - ($temp->vat * $temp->qty);
            // $total_vat      += $list->vat * $list->quantity; 

              // $service_price += $temp->price * $temp->qty;
              $service_vat += $temp->vat * $temp->qty;
              
          }
      }

      $service_total = $service_vat + $service_price - $service_discount;
       // $total   = ($sub_total + $total_vat) - $total_discount;



      /*
      product 
      */

      $p = new Temp_table();

    


      if(!empty($p->get_list())){
          foreach ($p->get_list() as $list) {


            $total_discount += (($list->price + $list->mark_up + $list->vat) *$list->quantity) * $list->discount/100;
            $sub_total      += (($list->price + $list->mark_up + $list->vat) *$list->quantity)- ($list->vat * $list->quantity);
            $total_vat      += $list->vat * $list->quantity; 

           
            
          }
           $total   = ($sub_total + $total_vat) - $total_discount;


      }

      $data[] = array(
        'sub_total'=>number_format($sub_total + $service_price + $package_price, 2),
        'vat_total'=>number_format($total_vat + $service_vat + $package_vat,2),
        'discount_total'=>number_format($total_discount + $service_discount +$package_discount ,2),
        'grand_total'=>number_format($total + $service_total + $package_total,2),
        );




      echo json_encode($data);

    }

      public function print_receipt() {
      $b = new Barcode();
      echo "<pre>";
      // print_r($b->stock_out_list());
      $c = new Company_model();
        foreach ($c->get() as $temp) {
          $info = array(
            'name'=>$temp->name,
            'logo'=>$temp->logo,
            'address'=>$temp->address,
            'email'=>$temp->email,
            'phone'=>$temp->phone,
            'postal_code'=>$temp->postal_code,
            'tin_number'=>$temp->tin_number,
            );
        }

        $r = new Reciept_info();
        foreach ($r->get() as $temp) {
          $receipt_info = array(
            'pn'=>$temp->pn,
            'min'=>$temp->min,
            'serial'=>$temp->serial_number,
            'accdtn_date'=>$temp->accreditation_date,
            'accdtn_no'=>$temp->accreditation_no,
            'note'=>$temp->note,
            'si'=>$temp->si,
            );
        }

        $tr = new Trans_code();
        foreach ($tr->get_lastcode() as $temp) {
          $code = array('code'=>$temp->t_code);
        }



      $data = array();

      $count = 0;
      $product  = '';
      $total = 0;
      $vat = 0;
      $discount = 0;
      $discounted = 0;
      $price = 0;
      $total_discount = 0;

      $container = '<div align="center">';
      $container .= '<h1><img style="margin:auto 0; width:50px;" src="'.base_url('uploads/'.$info['logo']).'"/></h1>';
      $container .= '<h2>'.ucwords($info['name']).'</h2>';
      $container .= '<p>VAT REG TIN '.ucwords($info['tin_number']).'<br/>';
      $container .= ucwords($info['address']).'<br/>';
      $container .= '<p>PHONE '.ucwords($info['phone']).'<br/>';
      $container .= '<p>EMAIL '.ucwords($info['email']).'</p>';

      $container .= '<p>Name: ___________________________<br/>';
      $container .= 'TIN: ____________________________<br/>';
      $container .= 'ID No: __________________________<br/>';
      $container .= 'ADDRESS: ________________________<br/>';
      $container .= 'SIGNATURE: ______________________</p>';
      $container .= '<p>**************************************************</p>';

    
      $container .='<table style="width:100%">';
      $container .='<thead>';
      $container .='<tr>';
      $container .='<td>DESC</td>';
      $container .='<td>QTY</td>';
      $container .='<td>PRICE</td>';
      $container .='<td>TOTAL</td>';
      $container .='</tr>';
      $container .='</thead>';
      $container .='</tbody>';

      foreach ($b->stock_out_list() as $list) {
        if(strlen($list->prod_name) > 6){
          $product = substr(ucwords($list->prod_name) , 0 , 6).'..'; 
        }
        else{
            $product = substr(ucwords($list->prod_name) , 0 , 6); 
        }
        $count ++;

        $price = product_retail($list->price , $list->mark_up , $list->vat);

        $discount = (product_retail($list->price , $list->mark_up , $list->vat) * $list->quantity) * $list->discount/100;

        $discounted = $price - $discount;
       
        $container .='<tr>';
        $container .='<td>'.$product.'</td>';
        $container .='<td>'.number_format($list->quantity).'</td>';
        $container .='<td>'.number_format($price,2).'</td>';
        $container .='<td>'.number_format($discounted,2).'</td>';
        $container .='</tr>';


        $total += $discounted;
        $vat += ($list->quantity * $list->vat);
        $total_discount += $discount;
     
      }

      $user_info = $this->userInfo;

      $container .='</tbody>';
      $container .='</table>';
        $container .= '</div>';
      $container .= '<p>**************************************************</p>';

      $container .='<table style="width:100%">';

      $container .='<tr>';
      $container .='<td><h3 style="font-size:20px;">Sale Total:</h3></td>';
      $container .='<td><h3 style="font-size:20px;">&#8369; '.number_format($total,2).'</h3></td>';  
      $container .='</tr>';
      $container .='</table>';

      $container .= '<span>**************************************************</span>';

      $container .='<table style="width:100%">';
      $container .='<tr>';
      $container .='<td>Cash</td>';
      $container .='<td><strong id="print-cash">&#8369;  '.$this->input->post('cash').'</strong></td>';
      $container .='</tr>'; 

      $container .='<tr>';
      $container .='<td>Change</td>';
      $container .='<td><strong id="print-change">&#8369;  '.$this->input->post('change').'</strong></td>';
      $container .='</tr>'; 

      $container .='</table>';

      $container .= '<span>**************************************************</span>';

      $container .='<table style="width:100%">';

      $container .='<tr>';
      $container .='<td>VAT Sale</td>';
      $container .='<td>&#8369;  '.number_format($total - $vat,2).'</td>';
           $container .='</tr>';

      $container .='<tr>';
      $container .='<td>VAT</td>';
      $container .='<td>&#8369;  '.number_format($vat,2).'</td>';

      $container .='<tr>';
      $container .='<td>DISC</td>';
      $container .='<td>&#8369;  '.number_format($total_discount,2).'</td>';

      $container .='<tr>';
      $container .='<td>Total Items </td>';
      $container .='<td>'.number_format($count).'</td>';
      $container .='</tr>';
      $container .='</table>';
      

      $container .='<table>';
      $container .='<tr>';
      $container .='<td>Cashier </td>';
      $container .='<td>'.ucfirst($user_info['lastname']).' , '.ucfirst($user_info['fname']).'</td>';
      $container .='</tr>';

      $container .='<tr>';
      $container .='<td>Transaction No. </td>';
      $container .='<td>'.$code['code'].'</td>';
      $container .='</tr>';

      $container .='<tr>';
      $container .='<td>Date</td>';
      $container .='<td>'.date('m/d/Y').'</td>';
      $container .='</tr>';

      $container .='<tr>';
      $container .='<td>Time </td>';
      $container .='<td>'.date('h:i:s').'</td>';
      $container .='</tr>';

      $container .='<tr>';
      $container .='<td><b>SI No</b></td>';
      $container .='<td><b>'.$receipt_info['si'].'</b></td>';
      $container .='</tr>';

      $container .='</table>';

      $container .= '<p>This serves as your Sales Invoice</p>';
     $container .= '<p>**************************************************</p>';
     $container .= '<p>'.$receipt_info['note'].'</p>';
     $container .= '<p>**************************************************</p>';
     $container .= '<table>';

     $container .= '<tr>';
     $container .= '<td>ACCDTN No<td>';
     $container .= '<td>'.$receipt_info['accdtn_no'].'<td>';
     $container .= '</tr>';

     $container .= '<tr>';
     $container .= '<td>ACCDTN Date<td>';
     $container .= '<td>'.$receipt_info['accdtn_date'].'<td>';
     $container .= '</tr>';

     $container .= '<tr>';
     $container .= '<td>TIN<td>';
     $container .= '<td>'.$info['tin_number'].'<td>';
     $container .= '</tr>';

     $container .= '<tr>';
     $container .= '<td>SN<td>';
     $container .= '<td>'.$receipt_info['serial'].'<td>';
     $container .= '</tr>';

     $container .= '<tr>';
     $container .= '<td>MIN<td>';
     $container .= '<td>'.$receipt_info['min'].'<td>';
     $container .= '</tr>';

     $container .= '<tr>';
     $container .= '<td>PN<td>';
     $container .= '<td>'.$receipt_info['pn'].'<td>';
     $container .= '</tr>';

     $container .= '</table>';
     $container .= '<p>**************************************************</p>';
     $container .= '<p>THIS INVOICE SHALL BE VALID FOR FIVE(5) YEARS FROM THE DATE OF THE PERMT TO USE.</p>';


    
      echo $container;

    }

    public function finish_trans() {

      $this->load->model('sales_report');

    $this->db->trans_begin();
    
//     $price = 0;
//     $commission = 0;


        $amount = $service_amount = $package_amount = $total_amount =0;

      $user = $this->session->userdata('logged_in');

      $package_temp = new Package_temp();
      $package_result = $package_temp->search(array('acc_id'=>$user['id']));


      if (!empty($package_result)) {
        foreach ($package_result as $temp) {
          $package_amount += (($temp->price + $temp->vat) * $temp->qty) - ((($temp->price + $temp->vat)*$temp->qty) * $temp->discount/100);

           $service_rendered_package = new Service_rendered();
           $service_rendered_package->p_id = $temp->p_id;
           $service_rendered_package->price = $temp->price;
           $service_rendered_package->vat = $temp->vat;
           $service_rendered_package->package_qty = $temp->qty;
           $service_rendered_package->date_rendered = date('Y-m-d');
           $service_rendered_package->acc_id = $user['id'];
           $service_rendered_package->save();

           $package_insert_id = $this->db->insert_id();

           $sales_report = new Sales_report();
           $sales_report->r_id = $package_insert_id;
           $sales_report->date = date('Y-m-d');
           $sales_report->save();

           $this->load->model('package_artist_temp');
            $this->load->model('Artist_commission_package');

           $package_artist_temp = new Package_artist_temp();

           $package_artist_temp_result = $package_artist_temp->search(array('acc_id'=>$user['id']));


           if(!empty($package_artist_temp_result)){
                $name = '';

                foreach ($package_artist_temp_result as $p_temp) {

                  $package = new Package();

                  $result = $package->search(array('p_id'=>$p_temp->p_id));
                  if(!empty($result)){

                    foreach ($result as $temp) {
                      $name = $temp->package_name;
                    }

                    $artist_commission = new Artist_commission_model();
                    $artist_commission->commission = $p_temp->commission;
                    $artist_commission->date = date('Y-m-d');
                    $artist_commission->ar_id = $p_temp->ar_id;
                    // $artist_commission->p_id = $p_temp->p_id;
                    $artist_commission->r_id = $package_insert_id;
                    $artist_commission->service_name = $name;
                    $artist_commission->save();


                    //delete service temp after save to artist commission
                    $service_artist = new Package_artist_temp();
                    $service_artist->load($p_temp->package_id);
                    $service_artist->delete();

                  }


               
                }
           }


        }
      }




    /*services*/
      $service_temp = new Service_temp();


      $service_result = $service_temp->search(array('acc_id'=>$user['id']));


      if(!empty($service_result)){
        foreach ($service_result as $temp) {

         

          $service_amount += (($temp->price + $temp->vat) * $temp->qty) - ((($temp->price + $temp->vat)*$temp->qty) * $temp->discount/100);

          $service_rendered = new Service_rendered();
          $service_rendered->service_info_id = $temp->service_info_id;
          $service_rendered->price = $temp->price;
          $service_rendered->vat = $temp->vat;
          $service_rendered->service_qty = $temp->qty;
          $service_rendered->date_rendered = date('Y-m-d');
          $service_rendered->acc_id = $user['id'];
          $service_rendered->save();

          $insert_id = $this->db->insert_id();


          $sales_report = new Sales_report();
          $sales_report->r_id = $insert_id;
          $sales_report->date = date('Y-m-d');
          $sales_report->save();

          $service_artist_temp_search = new service_artist_temp();

          //search if cashier added artist to service avail
          $service_artist_result = $service_artist_temp_search->search(array('acc_id'=>$user['id']));  

          // if there is artist save their commission
          if(!empty($service_artist_result)){
            foreach ($service_artist_result as $artist_temp) {

              //save artist commission with the services they done

              $service_info = new service_info();

              $service_result = $service_info->search(array('service_info_id'=>$artist_temp->service_info_id));

              if (!empty($service_result)) {
                foreach ($service_result as $temps) {
                  $s = $temps->service_name;
                }

                $artist_commission = new Artist_commission_model();
                $artist_commission->commission = $artist_temp->commission;
                $artist_commission->date = date('Y-m-d');
                $artist_commission->ar_id = $artist_temp->ar_id;
                $artist_commission->r_id = $insert_id;
                $artist_commission->service_name = $s;
                $artist_commission->save();


                //delete service temp after save to artist commission
                $service_artist = new service_artist_temp();
                $service_artist->load($artist_temp->service_artist_id);
                $service_artist->delete();

              }

             
            }
          }     


        }
      }


/*products*/

        $trans_code = new Trans_code();
        $trans_code->acc_id = $user['id'];
        $trans_code->t_date = date('Y-m-d');
        $trans_code->t_time = date('h:i:s a');
        $trans_code->t_code = $this->generate_transcode();
        $trans_code->save();

        $trans_code_id = $trans_code->db->insert_id();

      $temp_table = new Temp_table();
      $temp_data = array();
      
      $result = $temp_table->search(array('acc_id' => $user['id']));    

      

      if (!empty($result)) {

        /*Generate transaction code*/
     
        $amount = 0;
        $price = 0;

        foreach ($result as $list) {
          /*sum all amount*/
          // $price = ($list->price + $list->mark_up + $list->vat);
          // $amount +=  product_retail($list->price , $list->mark_up , $list->vat) * $list->quantity;
          $amount += (($list->price + $list->vat + $list->mark_up) * $list->quantity) - ((($list->price + $list->vat + $list->mark_up)*$list->quantity) * $list->discount/100);


          $stock_out_history = new Stock_out_history();
          $stock_out_history->quantity = $list->quantity;
          $stock_out_history->discount = $list->discount;
          $stock_out_history->bc_id = $list->bc_id;
          $stock_out_history->price = $list->price;
          $stock_out_history->vat = $list->vat;
          $stock_out_history->mark_up = $list->mark_up;
          $stock_out_history->tc_id = $trans_code_id;
          $stock_out_history->type_id = 6;
          $stock_out_history->time_out = date('h:i:s a');
          $stock_out_history->date_out = date('Y-m-d');
          $stock_out_history->save();



          $insert_id = $this->db->insert_id();


          $sales_report = new Sales_report();
          $sales_report->stock_out_hist_id = $insert_id;
          $sales_report->date = date('Y-m-d');
          $sales_report->save();




          $temp_data[] = array(
            'quantity' => $list->quantity ,
            'discount' => $list->discount ,
            'bc_id' => $list->bc_id ,
            'price' => $list->price,
            'vat' => $list->vat,
            'mark_up' => $list->mark_up ,
            'tc_id' => $trans_code_id ,
            'type_id' => 6 ,/*sold type*/
            'time_out' => date('h:i:s a') ,
            'date_out' => date('Y-m-d') ,
          );

        }


        /*if customer has card for pointing*/
     

        /*add to stock out history*/
        // $this->db->insert_batch('stock_out_history' , $temp_data);
        $stock_in = new Stock_in();

        /*update the stock in quantity*/
        foreach ($temp_data as $data) {
          foreach ($stock_in->search(array('bc_id' => $data['bc_id'])) as $list) {
            $stock_in->load($list->stock_in_id);
            $stock_in->quantity = $list->quantity - $data['quantity'];
            $stock_in->save();
          }
        }
      }


              if (!empty($_POST['card_number'])) {
                $card_number = trim($this->input->post('card_number'));

                $ch = new Card_holder();
                $result = $ch->search(array('card_no' => $card_number));
                $card_id = '';
                foreach ($result as $list) {
                  $card_id = $list->ch_id;
                }

                $point = new Point();
                $set_point = '';
                foreach ($point->get() as $p) {
                  $set_point = $p->amount;
                  break;
                }

                $total_amount = $service_amount + $amount + $package_amount;

                $purchase = new Purchase_pointing();
                $search_result = $purchase->search(array('ch_id' => $card_id));
                if (empty($search_result)) {
                  $purchase->ch_id = $card_id;
                  $purchase->points = $amount / $set_point;
                } else {
                  $data = array();
                  foreach ($search_result as $result) {
                    $data = array(
                      'id' => $result->pointing_id ,
                      'ch_id' => $result->ch_id ,
                      'point' => $result->points ,
                    );
                  }
                  $purchase->load($data['id']);
                  $purchase->points = $data['point'] + round($total_amount / $set_point);
                }
                $purchase->save();

      //          pointing history
                $ph = new Purchase_pointing_history();
                $ph->tc_id = $trans_code_id;
                $ph->points = round($total_amount / $set_point);
                $ph->ch_id = $card_id;
                $ph->save();

              }

      if ($this->db->trans_status() === FALSE)
      {
              $this->db->trans_rollback();
               echo 0;
      }
      else
      {
              $this->db->trans_commit();
              $this->remove_all_packages();
              $this->delete_all_list();
              $this->remove_all_services();
              echo 1;
      }
      $this->db->trans_complete();
      // if ($this->db->affected_rows() > 0) {
        // $this->delete_all_list();
        // $this->remove_all_services();
      // } else {
       
      // }

      // $stock_out = new Stock_out();
      // $stock_out_history = new Stock_out_history();

    }

 




    /*--------------------------------------*/
    /*----------[ reimbursement  ]----------*/
    /*--------------------------------------*/

    public function update_reimburse(){
       if (array_key_exists('id',$_POST)) {
        
        $id = trim($this->input->post('id'));
        $qty = trim($this->input->post('qty'));

        $temp = new Reimburse();
        $temp->load($id);
        $temp->new_qty = $qty;
        $temp->save();



            if($this->db->affected_rows() > 0 ){
          echo 1;
        }
        else{
          echo 0;
        }
      }
    }


    public function reimburse(){
       if (array_key_exists('id',$_POST)) {
        
        $id = trim($this->input->post('id'));
        $temp = new Reimburse();


        $search_temp = $temp->search(array('id'=>$id));
        if(!empty($search_temp)){
          foreach ($search_temp as $temp_data) {
            $data = array(
              'bc_id'=>$temp_data->bc_id,
              'stock_out_id'=>$temp_data->stock_out_id,
              'id'=>$temp_data->id,
              'new_qty'=>$temp_data->new_qty,
              'qty'=>$temp_data->qty,
              );
          }

            $in = new Stock_in();
          /*search the stock in bc id */
          $search_stock_in = $in->search(array('bc_id'=>$data['bc_id']));
            if(!empty($search_stock_in)){
            foreach ($search_stock_in as $temp_data) {
              $stock_in_data = array(
                'id'=>$temp_data->stock_in_id,
                'qty'=>$temp_data->quantity,
                );
            }
            /*add the return qty to stock in*/
            // $in = new Stock_in();
            $in->load($stock_in_data['id']);
            $in->quantity = $stock_in_data['qty'] + $data['new_qty'];
            $in->save();

          }
          /*remove or update the stock history */
          $out = new Stock_out_history();
          $search_stock_out = $out->search(array('stock_out_hist_id'=>$data['stock_out_id']));
          if(!empty($search_stock_out)){
            foreach ($search_stock_out as $temp) {
              $stock_out_data = array(
                'id'=>$temp->stock_out_hist_id,
                'qty'=>$temp->quantity,
                );
            }
          //   compare if the recieve qty is equal to purchase
          //   if is equal then delete the stock history by id
          //   otherwise update the quantity to the recieve qty.

            if($stock_out_data['qty'] == $data['new_qty']){
               
               // $stock_outs = new Stock_out_history();
               $out->load($stock_out_data['id']);
               $out->delete();
            }
            else if ($stock_out_data['qty'] > $data['new_qty']) {
                // $out = new Stock_out_history();
                $out->load($stock_out_data['id']);
                $out->quantity = $data['new_qty'];
                $out->save();
            }

            $temp = new Reimburse();
            $temp->load($data['id']);
            $temp->delete();


            
         }

        }

      }
    }


    public function remove_reimburse(){
      if (array_key_exists('id',$_POST)) {
        
        $id = trim($this->input->post('id'));
        $temp = new Reimburse();
        $temp->load($id);
        $temp->delete();
        // $temp->save();

        if($this->db->affected_rows() > 0 ){
          echo 1;
        }
      }
    }


    public function get_product(){
      
      $r = new Reimburse();
       $user = $this->session->userdata('logged_in');
      if(!empty($r->get_data($user['id']))){
          $total = 0;
        foreach ($r->get_data($user['id']) as $temp) {
            if(empty($temp->new_qty)){
                $total += product_retail($temp->price, $temp->mark_up, $temp->vat) * $temp->quantity;
            }
            else{
               $total += product_retail($temp->price, $temp->mark_up, $temp->vat) * $temp->new_qty;
            }
        
            $data[] =array(
              'total'=>'&#8369; '.number_format($total,2),
             'date'=>$temp->t_date.' / '.$temp->t_time,
             'code'=>$temp->t_code,
             'barcode'=>$temp->barcode,
             'description'=>ucwords($temp->prod_name),
             'price'=>'&#8369; '.number_format(product_retail($temp->price, $temp->mark_up, $temp->vat) - $temp->discount,2),
             'qty'=>number_format($temp->quantity),
             'input_qty'=>'<input data-id="'.$temp->id.'" onkeyup="update_return(this)" type="text" id="reimburse-qty" style="width:100%" autofocus>',
             'action'=>'<button  onclick="save_reimburse('.$temp->id.')" class="btn btn-xs btn-success"><span class="fa fa-check"></span></button>'.
                       '<button onclick="remove_reimburse('.$temp->id.')"class="btn btn-xs btn-danger"><span class="fa fa-times"></span></button>'
             );

        }
        echo json_encode($data);
      }

    }

    public function search_reimburse(){
      if(array_key_exists('barcode', $_POST)){

        $barcode = trim($this->input->post('barcode'));
        $code = trim($this->input->post('code'));
         $user = $this->session->userdata('logged_in');
        
        $t = new Trans_code();
        if(!empty($t->transaction_by_barcode($code, $barcode))){
            foreach ($t->transaction_by_barcode($code, $barcode) as $temp) {
            $data =array(
              'bc_id'=>$temp->bc_id,
              'tc_id'=>$temp->tc_id,
              'acc_id'=>$user['id'],
              'purchased_qty'=>$temp->quantity,
              'stock_out_id'=>$temp->stock_out_hist_id,
              );
            }

            $temp_table = new Reimburse();
            $result =  $temp_table->search(array('bc_id'=>$data['bc_id']));

            if(empty($result)){
               $temp_table = new Reimburse();
               $temp_table->tc_id = $data['tc_id'];
               $temp_table->acc_id = $data['acc_id'];
               $temp_table->bc_id = $data['bc_id'];
               $temp_table->stock_out_id = $data['stock_out_id'];
               $temp_table->qty = $data['purchased_qty'];
               $temp_table->save();
               if($this->db->affected_rows() > 0){
                  echo 1;
               }
            }
        }
      }
    }


    public function get_trans(){
      $t = new Trans_code();
      if(!empty($t->get())){
        foreach ($t->get() as $temp) {
          $data[] =array(
            'code'=>$temp->t_code,
            'id'=>$temp->tc_id
            );
        }
      }
      echo json_encode($data);
    }


  




    /*--------------------------------------*/
    /*----------[ products  ]---------------*/  
    /*--------------------------------------*/


    public function search_products() {
      if (array_key_exists('search' , $_POST)) {
        $this->load_product(trim($this->input->post('search')));
      }
    }

    public function delete_list_product() {
      $out = new Temp_table();
      if (array_key_exists('id' , $_POST)) {
        $stock_out_id = trim($this->input->post('id'));
        $out->load($stock_out_id);
        $out->delete();
        if ($out->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }

      }
    }

    public function delete_all_list() {
      $out = new Temp_table();  
      $user = $this->session->userdata('logged_in');
      $out->db->delete('temp_table' , array('acc_id' => $user['id']));
      if ($out->db->affected_rows() > 0) {
        echo $out->db->affected_rows();
      } else {
        echo 0;
      }
    }

    public function add_discount_package(){
     
      if (array_key_exists('pk', $_POST)) {
          
          $t = new Package_temp();

          $id = trim($this->input->post('pk'));
          $value = trim($this->input->post('value'));
       
          $t->load($id);
          $t->discount =  $value;
          $t->save();


        if ($t->db->affected_rows() > 0) {
            echo 1;
        }
        else{
          echo 0;
        }



      }
    } 

    public function add_discount_service(){
     
      if (array_key_exists('pk', $_POST)) {
          
          $t = new Service_temp();

          $id = trim($this->input->post('pk'));
          $value = trim($this->input->post('value'));
       
          $t->load($id);
          $t->discount =  $value;
          $t->save();


        if ($t->db->affected_rows() > 0) {
            echo 1;
        }
        else{
          echo 0;
        }



      }
    } 


    public function add_discount(){
     
      if (array_key_exists('pk', $_POST)) {
          
          $t = new Temp_table();

          $id = trim($this->input->post('pk'));
          $value = trim($this->input->post('value'));
       
          $t->load($id);
          $t->discount =  $value;
          $t->save();


        if ($t->db->affected_rows() > 0) {
            echo 1;
        }
        else{
          echo 0;
        }



      }
    } 

   


    /*populate the temp table list*/
    public function product_stock_out_list() {
      $b = new Barcode();
      $data = array();

      $count = 0;
      $product  = '';
      $total_discount = 0;
      $total_vat = 0;
      $sub_total = 0; 
      $total = 0;
      $total =0;
      $service = array();
      $service_price = 0;
      $service_vat = 0;
      $price = 0;




      foreach ($b->stock_out_list() as $list) {
        if(strlen($list->prod_name) > 6){
          $product = substr(ucwords($list->prod_name) , 0 , 6).'..'; 
        }
        else{
            $product = substr(ucwords($list->prod_name) , 0 , 6); 
        }

              $price = $list->price + $list->mark_up  + $list->vat;

    



        $count ++;
        $data[] = array(
          'id' => $list->id ,
          // 'vat' => $list->vat,
          'total' => number_format($total,2),
          // 'sub_total' => number_format($sub_total,2),
          'total_discount' => number_format($total_discount,2),
          // 'total_vat' => number_format($total_vat,2),
          'discount'=>'<a href="#" class="value" data-type="text" data-pk="'.$list->id.'" >'.number_format($list->discount).'</a>',
          'bc_id' => $list->bc_id ,
          'name' => ucwords($product),
          'quantity' => number_format($list->quantity) ,
          'sub' => number_format(discounted_price($list->price, $list->mark_up, $list->vat, $list->discount) * $list->quantity,2),
          'remove' => '<button onclick="delete_list_product(' . $list->id . ')"  class="btn btn-xs btn-link"><span class="fa fa-remove"></span></button'
                      // '<button class="btn btn-link btn-xs"><span class="fa fa-user"></span></button>'
                      ,
          'count' => $count ,
          'price' => number_format($price,2),
        );

      }
      echo json_encode(array('data'=>$data));
    }

    /*add to table list by barcode php_ini_scanned_files(oid)r*/
    public function add_by_barcode() {
      
        if(array_key_exists('barcode', $_POST) && !empty($_POST['barcode']) ){

           $b = new Barcode();
       
           
            $barcode = trim($this->input->post('barcode'));
           $input_qty = trim($this->input->post('qty'));

           $product = $b->add_by_barcode($barcode);

          if(!empty($product)){
            
            foreach ($product as $temp) {
              $product = array(
               'bc_id'=>$temp->bc_id,
               'quantity'=>$temp->quantity,
               'price'=>$temp->price,
               'mark_up'=>$temp->mark_up,
               'vat'=>$temp->vat,
               );
            }

            $temp_table = new Temp_table();
            
            $temp_search = $temp_table->search(array('bc_id'=>$product['bc_id']));
            
            if(!empty($temp_search)){

              foreach ($temp_search as $temp) {
                  $temp_data = array(
                    'id'=>$temp->id,
                    'bc_id'=>$temp->bc_id,
                    'quantity'=>$temp->quantity,
                    'price'=>$temp->price,
                    'mark_up'=>$temp->mark_up,
                    'vat'=>$temp->vat,
                    'discount'=>$temp->discount,
               ); 
              }
              $temp_table = new Temp_table();
              $temp_table->load($temp_data['id']);
              $temp_table->quantity =$temp_data['quantity'] + $input_qty;
              $temp_table->last_update = date('Y-m-d h:m:s');
              $temp_table->save();



            }   
            else{
              /*add new product to temp table*/

              $user = $this->session->userdata('logged_in');
              
              $temp_table = new Temp_table();
              $temp_table->price = $product['price'];
              $temp_table->bc_id = $product['bc_id'];
              $temp_table->discount = 0;
              $temp_table->mark_up = $product['mark_up'];
              $temp_table->vat = $product['vat'];
              $temp_table->acc_id = $user['id'];
              $temp_table->quantity = $input_qty;
              $temp_table->last_update = date('Y-m-d h:m:s');
              // $temp_table->is_service = 0;
              $temp_table->save();
            }
          }
          if($temp_table->db->affected_rows() > 0){
                echo 1;
              }
              else{
                echo 0;
              }
        }
    }


    public function stock_out_product() {

      $out = new Temp_table();
      $in = new Stock_in();
      $b = new Barcode();

      $user_id = $this->session->userdata('logged_in');
      $this->db->trans_start();

      $bc_id = trim($this->input->post('bc_id'));
      if (array_key_exists('bc_id' , $_POST)) {

        $stock_in_id = trim($this->input->post('stock_in_id'));
        $price = trim($this->input->post('price'));
        $mark_up = trim($this->input->post('mark_up'));
        $add_qty = trim($this->input->post('qty'));
        $vats = trim($this->input->post('vat'));
        $discount = trim($this->input->post('discount'));

      }

      $result = $in->search(array('stock_in_id' => $stock_in_id));
      $data = array();
      $stock_in = array();
      foreach ($result as $stock) {
        if (!empty($stock)) {
          $stock_in = array(
            'qty' => $stock->quantity
          );
        }
      }

      /*search the bc_id if exist then update the quantity in stock-out table */
      $result_out = $out->search(array('bc_id' => $bc_id,'acc_id'=>$user_id['id']));
      if (!empty($result_out)) {
        foreach ($result_out as $list) {
          $data = array(
            'id' => $list->id ,
            'qty' => $list->quantity ,
            'bc_id' => $list->bc_id ,
            'acc_id' => $list->acc_id
          );
        }

        /*check if the quantity is still valid to checkout*/
        if ($stock_in['qty'] >= ($data['qty'] + $add_qty)) {
          $out->load($data['id']);
          $out->quantity = $data['qty'] + $add_qty;
          $out->last_update = date('Y-m-d h:m:s');
          $out->save();
        } else {
          echo 'available stock is less than the quantity selected.';
        }
      } else {
        if ($stock_in['qty'] >= $add_qty) {
          $out->last_update = date('Y-m-d h:m:s');
          $out->quantity = $add_qty;
          $out->price = $price;
          $out->mark_up = $mark_up;
          $out->discount = $discount;
          // $out->is_service = 0;
          $out->bc_id = $bc_id;
          $out->vat = $vats;
          $out->acc_id = $user_id['id'];
          $out->save();
        } else {
          echo 'available stock is less than the quantity selected.';
        }

      }
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE) {
        $out->db->trans_rollback();
        $in->db->trans_rollback();

      } else {
        $this->db->trans_commit();

      }


    }


    public function load_product($search = FALSE) {
      
      $b = new Barcode();
      
      $data = array();
      
      $i = 1;
   
      foreach ($b->get_available_products($search) as $p) {
        
        $icon = 'fa-check';
        $label = 'text-success';
        $badge = 'badge-success';

        if($p->quantity == 0){
          
          $icon = 'fa-times';
          $label = 'text-danger';
          $badge = 'badge-danger';
        }


        $item   = '<section class="media" style="cursor:pointer; width:32%; border:1px #1d536b solid; display:inline-block; margin-right:1%; " 
                    onclick="set_qty(' . $p->bc_id . ',' . $p->stock_in_id . ',' . $p->price . ',' . $p->mark_up . ',' . $p->vat . ')"  title="' . $p->prod_name .'" >';
        $item  .=  '<a class="media-left">';
        $item  .=  '<img clss="media-object imgs"  src="'.base_url('uploads/'.$p->prod_image).'" style="width:60px; max-width:100px; height:100px; margin:5% " />';
        $item  .=  '</a>';
        $item  .=   '<div class="media-body">';
        $item  .=   '<h4 class="media-heading"><strong>'.substr(ucwords($p->prod_name) , 0 , 8).'</strong></h4>';
        $item  .=   '<p><strong class="fa fa-barcode"> '.$p->barcode.'</strong></p>';
        $item  .=   '<h4 class="media-heading">&#8369; '.number_format($p->price + $p->mark_up + $p->vat,2).'</h4>';
        $item  .=   '<p><span class="fa '.$icon.' '.$label.'"></span><span class="badge '.$badge.'">'.number_format($p->quantity).'</span></p>';
        $item  .=   '</div>';
        $item  .= '</section>';

        if (empty($p)) {
          $i = 0;  
        }
        $data[] = array(
          'product' => $item ,
          'count' => $i ,
        );
        $i ++;
      }

      // $html .= '</table>';

      echo json_encode($data);
      // echo $html;

    }




    /*--------------------------------------*/
    /*----------[ cashier  ]---------------*/
    /*--------------------------------------*/
    public function get_cashier_report(){
      
      $t = new Trans_code();

      $c = new Company_model();
        foreach ($c->get() as $temp) {
          $info = array(
            'name'=>$temp->name,
            'logo'=>$temp->logo,
            'address'=>$temp->address,
            'email'=>$temp->email,
            'phone'=>$temp->phone,
            'postal_code'=>$temp->postal_code,
            'tin_number'=>$temp->tin_number,
            );
        }
        echo "<pre>";

        $container = '<div align="center">';
        $container .= '<h1><img style="margin:auto 0; width:50px;" src="'.base_url('uploads/'.$info['logo']).'"/></h1>';
        $container .= '<h2>'.ucwords($info['name']).'</h2>';
        $container .= '<p>VAT REG TIN '.ucwords($info['tin_number']).'<br/>';
        $container .= ucwords($info['address']).'<br/>';
        $container .= '<p>PHONE '.ucwords($info['phone']).'<br/>';
        $container .= '<p>EMAIL '.ucwords($info['email']).'</p>';

        $container .= '<h1>Daily Cashier Report</h1>';


      $total = $grand_total = 0;
      $discount = 0;
      $price = 0;
      $total_discount = 0;
      $discounted_price = 0;
      $grand_total_discount = 0;

      $data = array();
      if (!empty($t->get_transcode_by_date())) {
          foreach ($t->get_transcode_by_date() as $value) {
            $container .= '<p>-----------------------------------------------------------------</p>';
             $container .= '<table style="width:100%">';

             $container .= '<tr>';
             $container .= '<td>TRASACTION NO:</td>';
             $container .= '<td>'.$value->t_code.'</td>'; 
             $container .= '</tr>';

             $container .= '<tr>';
             $container .= '<td>DATE &amp; Time:</td>';
             $container .= '<td>'.$value->t_date.'| '.$value->t_time.'</td>';
             $container .= '</tr>';

             $container .= '</table>';  

             $container .= '<table style="width:100%">';

             $container .= '<tr>';
             $container .= '<td>DESC</td>';
             $container .= '<td>QTY</td>';
             $container .= '<td>PRICE</td>';
             $container .= '<td>DIS</td>';
             $container .= '<td>TOTAL</td>';
             $container .= '</tr>';
              

            // foreach ($t->get_cashier_report($value->t_code)  as $temp) {

            //   $price  = product_retail($temp->price, $temp->mark_up, $temp->vat);

            //   $discount = product_retail($temp->price, $temp->mark_up, $temp->vat) * $temp->discount/100;

            //   $discounted_price = $price - $discount;

            //   $total += $discounted_price; 

            //   $total_discount += $discount;

            //   $grand_total += $total;

            //   $grand_total_discount += $total_discount;

            //   $container .= '<tr>';
            //   $container .= '<td>'.ucwords($temp->prod_name).'</td>';
            //   $container .= '<td>'.number_format($temp->quantity).'</td>';
            //   $container .= '<td>'.number_format($price,2).'</td>';
            //   $container .= '<td>'.number_format($discount,2).'</td>';
            //   $container .= '<td>'.number_format($discounted_price,2).'</td>';
            //   $container .= '</tr>';

             
           
            // }

              $container .= '<tr style="border-top: 1px solid #000">';
              $container .= '<td>Total</td>';
              $container .= '<td></td>';
              $container .= '<td></td>';
              $container .= '<td>&#8369;  '.number_format($total_discount,2).'</td>';
              $container .= '<td>&#8369;  '.number_format($total,2).'</td>';
              $container .= '</tr>';
              $container .= '</table>';
            
              $total = 0;
              $total_discount = 0;
          }
             
              $container .= '<p>================================================================<br/>';
              $container .= '===================================================================</p>';

              $user =  $this->userInfo;

              $container .= '<table style="width:100%">';

              $container .= '<tr>';
              $container .= '<td>TOTAL SALES</td>';
              $container .= '<td>&#8369; '.number_format($grand_total,2).'</td>';
              $container .= '</tr>';

              $container .= '<tr>';
              $container .= '<td>TOTAL DISCOUNT</td>';
              $container .= '<td>&#8369; '.number_format($grand_total_discount,2).'</td>';
              $container .= '</tr>';

              $container .= '<tr>';
              $container .= '<td>CASHIER</td>';
              $container .= '<td>'.ucwords($user['lastname']).','.ucwords($user['fname']).'</td>';
              $container .= '</tr>';

              $container .= '</table>';


          // echo json_encode($data);
          echo $container;
      }
    }

 

  }