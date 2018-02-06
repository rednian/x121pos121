<?php
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/15/2016
 * Time: 1:52 PM
 */
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Services extends MY_Controller {


  public function __construct() {
    parent::__construct();
    $this->load->model('service_class');
    $this->load->model('service_type');
    $this->load->model('service_info'); 
    $this->load->model('price');
    $this->load->model('Availability_status');
    $this->load->model('Package');
    $this->load->model('Service_package');
  } 

  public function index() {
    $data = array(
      'title' => 'Service List',
      'heading' => 'Service List',
      'user_info' => $this->userInfo
    );
    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav', $data);
    $this->load->view('templates/sidebar', $data);

    $this->load->view('profile/service/services_list', $data);
    $this->load->view('templates/footer');
  }

  /*---------------------------------
      package
    ---------------------------------
  */ 

  public function package_update(){

    if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {

        $id = trim($this->input->post('id'));
        
       $package = new Package();
       $result = $package->search(array('p_id'=>$id));
       
       $data = array();

       if(!empty($result)){
          foreach ($result as $temp) {
            $data = array(
              'name'=>ucwords($temp->package_name),
              'type'=>ucwords($temp->type),
              'description'=>ucwords($temp->description),
              'price'=>number_format($temp->price + $temp->vat,2),
              'id'=>$temp->p_id,
              );
          }
       }
       echo json_encode($data);
    }

  }


  public function package_edit(){
    if ($this->input->method() == 'post' && array_key_exists('package_id', $_POST)) {

      $package = new Package();


      // print_r($_POST);

      $package->load(trim($this->input->post('package_id')));
      $price = trim($this->input->post('price'));

      $package->package_name = trim($this->input->post('package_name'));
      $package->price = get_net_price($price);
      $package->vat = get_vat($price);
      $package->description = trim($this->input->post('description'));
      $package->type = trim($this->input->post('type'));
      
      if ($_FILES['image']['error'] == 0) {
        $this->do_upload('image', 'service/package');
        $file = $this->upload->data('file_name');
        $package->image = 'service/package/' . $file;
      }

      $package->save();


      if($this->db->affected_rows() > 0){
        echo 1;
      }else{
        echo 0;
      }

    }
  }

  public function package_detail_services(){
    if($this->input->method() == 'post' && array_key_exists('id', $_POST)){


        $package  = new Service_package();
        $id = trim($this->input->post('id'));

        $result = $package->details_service($id);
        
        $data =array();

        if(!empty($result)){
         foreach ($result as $temp) {
           $data[] = array(
            'service'=>ucwords($temp->service_name)
             );
         }
        }

        echo json_encode($data);
       

    }

  }


  public function package_details(){

    if($this->input->method() == 'post' && array_key_exists('id', $_POST)){

        $package  = new Package();
        $id = trim($this->input->post('id'));

        $result = $package->details($id);

        $data =array();

        if(!empty($result)){
          foreach ($result as $temp) {
            $data =array(
              'id'=>$temp->service_info_id,
              'name'=>ucwords($temp->package_name),
              'price'=>'&#8369; '.number_format($temp->price + $temp->vat,2),
              'image'=>base_url('uploads/'.$temp->image),
              'description'=>ucfirst($temp->description),
              'type'=>ucfirst($temp->type),
              );
          }
        }

        echo json_encode($data);

    }
  }


  public function delete_package(){
    if($this->input->method() == 'post' && array_key_exists('id', $_POST)){

        $package  = new Package();
        $id = trim($this->input->post('id'));

        $package->load($id);
        $package->on_delete = date('Y-m-d h:i:s');
        $package->save();

        if($this->db->affected_rows() > 0){
          echo 1;
        }
        else{
          echo 0;
        }
    }
  }

  public function packages(){
    
    $package  = new Package();
      
    $list = $package->get_package();

    $data = array();

    if (!empty($list)) {
      foreach ($list as $temp) {
        $data[] =array(
          'package'=>ucwords($temp->package_name),
          'price'=>'&#8369; '.number_format($temp->price + $temp->vat,2),
          'description'=>ucfirst($temp->description),
          'type'=>ucfirst($temp->type),
          'service_id'=>$temp->service_info_id,
          'image'=>base_url('uploads/'.$temp->image),
          'action'=>'<button class="btn btn-xs btn-white" onclick="detail_package('.$temp->p_id.')"><span class="fa fa-folder-open-o"></span></button>
                     <button class="btn btn-xs btn-white" onclick="update_package('.$temp->p_id.')"><span class="fa fa-pencil"></span></button>
                     <button class="btn btn-xs btn-white" onclick="delete_package('.$temp->p_id.')"><span class="fa fa-trash"></span></button>
                     ',
          );
      }
    }
    echo json_encode(array('data'=>$data));
  }


  public function create_packages(){
    if ($this->input->method() == 'post' && array_key_exists('service_info', $_POST)) {

      $price = trim($this->input->post('price'));

      $package = new Package();
      $package->package_name = trim($this->input->post('package_name'));
      $package->price = get_net_price($price);
      $package->vat = get_vat($price);
      $package->description = trim($this->input->post('description'));
      $package->type = trim($this->input->post('type'));
      
      if ($_FILES['image']['error'] == 0) {
        $this->do_upload('image', 'service/package');
        $file = $this->upload->data('file_name');
        $package->image = 'service/package/' . $file;
      }

      if($_FILES['image']['size'] == 0 ){
         $package->image = 'default/default.png';
      }
      
      $package->save();

      $package_id = $package->db->insert_id();

      $service_package = new Service_package();
      foreach ($this->input->post('service_info') as $value) {
        $data[] = array(
          'service_info_id'=>trim($value),
          'p_id'=>$package_id,
          );
      
      }
      $this->db->insert_batch('service_package' , $data);

      if($this->db->affected_rows() > 0){
        echo 1;
      }else{
        echo 0;
      }


  
    

    }    
  }

 


  /*---------------------------------
      services
    ---------------------------------
  */

  public function update() {
    if (array_key_exists('service_id', $_POST)) {

      $this->db->trans_begin();

      $id = $this->input->post('service_id');

      $s = new Service_info();
      $s->load($id);
      $s->service_name = trim($this->input->post('name'));
      $s->service_desc = trim($this->input->post('description'));

      if ($_FILES['image']['error'] == 0) {
        $this->do_upload('image', 'service');
        $file = $this->upload->data('file_name');
        $s->service_image = 'service/' . $file;
      }
      $s->save();

      $p = new Price();
      $p->load($this->input->post('price_id'));

      $price = $this->input->post('price');
      $p->price = get_net_price($price);
      $p->vat = get_vat($price);

      // $p->price = $this->input->post('price');
      $p->save();

      $a = new Availability_status();
      $a->status = $this->input->post('status');
      $a->save();


      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        echo 0;
      } else {
        $this->db->trans_commit();
        echo 1;
      }
    }
  }

  public function update_service_details() {
    if (array_key_exists('service_id', $_POST)) {
      $service_id = trim($this->input->post('service_id'));
      $service = new Service_info();
      $data = array();
      foreach ($service->view_details($service_id) as $details) {
        $data[] = array(
          'price_id' => $details->pricing_id,
          'as_id' => $details->as_id,
          'name' => html_escape(ucwords($details->service_name)),
          'id' => html_escape(ucwords($details->service_info_id)),
          'status' => html_escape(ucwords($details->status)),
          'type' => html_escape(ucwords($details->service_type)),
          'class' => html_escape(ucwords($details->service_class)),
          'description' => html_escape(ucwords($details->service_desc)),
          'image' => '<img class="img-responsive" src="' . base_url('uploads/' . $details->service_image) . '">',
          'price' => html_escape(get_service_sale_price($details->price, $details->vat)),
        );
      }
      echo json_encode($data);
    }
  }


  public function create_class() {
    if (array_key_exists('service_class', $_POST)) {

      $class = new Service_class();
      $class->service_class = trim($this->input->post('service_class'));
      $class->service_type_id = trim($this->input->post('service_type'));
      $class->save();

      if ($class->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }

    }
  }

  public function create_type() {
    if (array_key_exists('type', $_POST)) {
      $types = new Service_type();
      $types->service_type = trim($this->input->post('type'));
      $types->service_type_desc = trim($this->input->post('description'));

      if ($_FILES['image']['error'] == 0) {
        $this->do_upload('image', 'service_type');
        $file = $this->upload->data('file_name');
        $types->service_type_image = 'service_type/' . $file;
      }
      $types->save();
      if ($types->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }

    }
  }


  public function view_details() {
    $s = new Service_info();
    $data = array();
    if (array_key_exists('id', $_POST)) {
      $id = trim($this->input->post('id'));
      $status = '';
      foreach ($s->view_details($id) as $list) {
        if ($list->status == 'available') {
          $status = 'label-success';
        } else {
          $status = 'label-danger';
        }
        $data[] = array(
          'name' => html_escape(ucwords($list->service_name)),
          'type' => html_escape(ucwords($list->service_type)),
          'class' => html_escape(ucwords($list->service_class)),
          'description' => html_escape(ucwords($list->service_desc)),
          'status' => '<span class="label ' . $status . '">' . html_escape($list->status) . '</span>',
          'price' => '&#8369; ' . get_service_sale_price($list->price, $list->vat),
          'image' => base_url('uploads/'.$list->service_image),
        );
      }
      echo json_encode($data);
    }

  }


  public function delete() {
    if (array_key_exists('id', $_POST)) {
      $id = trim($this->input->post('id'));
      $s = new Service_info();
      $s->load($id);
      $s->on_delete = date('Y-m-d h:i:s a');
      $s->save();
      if ($s->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }
    }
  }

  public function service_list() {
    $s = new Service_info();
    $data = array();
    foreach ($s->get_info_list() as $list) {
      $data[] = array(
        'price' => '&#8369; ' . html_escape(number_format(get_service_sale_price($list->price, $list->vat),2)),
        'vat'=>number_format($list->vat),
        'class'=>ucwords($list->service_class),
        'type'=>ucwords($list->type),
        'status' => $list->status,
        'action' => '<button class="btn btn-xs btn-white" onclick="view_service('.$list->service_info_id.')"><span class="fa fa-folder-open-o"></span></button>
            <a href="#update-service-dialog" data-toggle="modal" class="btn btn-xs btn-white" onclick="update_details(' . $list->service_info_id . ')"><span class="fa fa-pencil"></span></a>

                     <button onclick="delete_service(' . html_escape($list->service_info_id) . ')" class="btn btn-xs btn-white"><span class="fa fa-trash"></span></button>',
        'description' => html_escape(ucwords($list->service_desc)),
        'service' => html_escape(ucwords($list->service_name)),
        'image'=>base_url('uploads/' . $list->service_image),
        ''
      );
    }
    echo json_encode(array('data'=>$data));
  }


  public function service_available(){
    $s = new Service_info();
    $data = array();
    foreach ($s->get_info_list() as $list) {
      $data[] = array(
        'price' => '&#8369; ' . html_escape(number_format(get_service_sale_price($list->price, $list->vat),2)),
        'status' => ucwords($list->status),
        'description' => html_escape(ucwords($list->service_desc)),
        'service' => html_escape(ucwords($list->service_name)),
        'id' => html_escape($list->service_info_id),
        'image'=>base_url('uploads/' . $list->service_image),
        ''
      );
    }
    echo json_encode($data);
  }


  // public function create_new_service() {
  //   $s = new Service_info();
  //   $data = array(
  //     'title' => 'Create New Service',
  //     'heading' => 'Create New Service',
  //     'service' => $s->get_info_list(),
  //     'user_info' => $this->userInfo
  //   );

  //   $this->load->view('templates/header', $data);
  //   $this->load->view('templates/sidebar', $data);
  //   $this->load->view('templates/nav', $data);
  //   $this->load->view('profile/service/add_services', $data);
  //   $this->load->view('templates/footer');
  // }

  public function add() {

    $s = new Service_info();


    $this->db->trans_start();
    if ($_FILES['image']['error'] == 0) {
      $this->do_upload('image', 'service');
      $file = $this->upload->data('file_name');
      $s->service_image = 'service/' . $file;
    }

    if($_FILES['image']['size'] == 0 ){
       $s->service_image = 'default/default.png';
    }

    $s->service_name = $this->input->post('service_name');
    $s->service_type_id = $this->input->post('type');
    $s->service_class_id = $this->input->post('class');
    $s->service_desc = $this->input->post('description');
    $s->type = $this->input->post('types');
    $s->view = 0;
    $s->save();

    $service_id = $s->db->insert_id();


    if (array_key_exists('price', $_POST)) {

      $p = new Price();

      $p->service_info_id = $service_id;
      $price = $this->input->post('price');
      $p->price = get_net_price($price);
      $p->vat = get_vat($price);
      $p->save();
    }

    $a = new Availability_status();
    $a->status = 'available';
    $a->service_info_id = $service_id;
    $a->save();
    $this->db->trans_complete();


    if ($this->db->trans_status() === FALSE) {
      $s->db->trans_rollback();
      $a->db->trans_rollback();
      $p->db->trans_rollback();
      echo 0;
    } else {
      $this->db->trans_commit();
      echo 1;
    }
  }



  public function update_service($id = FALSE) {

    $s = new Service_info();

    $data = array(
      'title' => 'Create New Service',
      'heading' => 'Create New Service',
      'service' => $s->get_info_list(),
      'user_info' => $this->userInfo
    );

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/nav', $data);
    $this->load->view('profile/service/update_service', $data);
    $this->load->view('templates/footer');
  }

  public function get_service_type() {
    
    $type = new Service_type();

    foreach ($type->get() as $types) {

      if (!empty($types->service_type) || $types->service_type == 'null') {
        
        $newType[] = array(
          'id' => $types->service_type_id,
          'type' => $types->service_type
        );
      }

    }
    
    echo json_encode($newType);
    
  }

  /*this will check the service if already taken*/
  public function is_service_exist() {
    $s = new Service_info();
    $valid = TRUE;
    $services = array();
    foreach ($s->get() as $service) {
      array_push($services, $service->service_name);
    }
    if (isset($_POST['service']) && array_key_exists(strtolower($_POST['service']), $services)) {
      $valid = FALSE;
    }
    echo json_encode(array('valid' => $valid));
  }

  public function get_service_class() {
    $type_id = $this->input->get('type_id');

    $type = new Service_class();
    $d = array();
    foreach ($type->get_class($type_id) as $class) {
      $d[] = array(
        'id' => $class->service_class_id,
        'class' => ucwords($class->service_class)
      );
    }
    echo json_encode($d);
  }

}


