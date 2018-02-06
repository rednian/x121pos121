<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 3/21/2016
   * Time: 1:39 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Web_setting extends MY_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('about_more_title');
      $this->load->model('about_more_images');
      $this->load->model('service_type');
      $this->load->model('product_type');
      $this->load->model('Products');
      $this->load->model('service_info');
      $this->load->model('Product_view_status');
      $this->load->model('barcode');
      $this->load->model('Contact_us');

    }

    /*about us page*/
    public function index() {
      $proprietor = $this->about_more_title->get_proprietor();

      $data = array(
        'title' => 'About Us' ,
        'heading' => 'About Us' ,
        'pro' => $proprietor ,
        'user_info' => $this->userInfo
      );

      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('web_setting/about_view' , $data);
      $this->load->view('templates/footer');
    }

    public function delete_feedback(){
      if (array_key_exists('id', $_POST)) {

        $id = trim($this->input->post('id'));

        $con = new Contact_us();

        $con->load($id);

        $con->delete();

        if($this->db->affected_rows() > 0){
          echo 1;
        }
      }
    }

    public function contact_us_list(){

      $con = new Contact_us();
      $num = 1;
      if(!empty($con->get())){

        foreach ($con->get() as $temp) {

          $data[] = array(
            'number'=>$num++,
            'name'=>ucwords($temp->name),
            'email'=>strtolower($temp->email),
            'subject'=>ucwords($temp->subject),
            'message'=>ucwords($temp->remark),
            'action'=>'<button onclick="delete_data('.$temp->con_id.')" class="btn btn-default btn-xs"><span class="fa fa-remove"></span></button>',
            );

        }

        echo json_encode($data);

      }

    }

    public function view_details(){
      if(array_key_exists('id', $_POST)){
        
        $id = trim($this->input->post('id'));
       
        $p = new Products();
       
        if(!empty($p->get_product_full_info($id))){

          $data =array();
          
          foreach ($p->get_product_full_info($id) as $p) {
            $data[] =array(
              'qty'=>number_format($p->quantity),
              'name'=>$p->prod_name,
              'sub'=>$p->prod_subname,
              'barcode'=>strtoupper($p->barcode),
              'package'=>$p->prod_packaging_type,
              'manufacturer'=>$p->prod_manufacturer,
              'description'=>$p->prod_desc,
              'expire'=>$p->prod_date_exp,
              'made'=>$p->prod_made_date,
              'weight'=>$p->unit,
              'size'=>$p->size_type,
              'price'=>product_retail($p->price, $p->mark_up, $p->vat),
              'image'=>'<img src="'.base_url('uploads/'.$p->prod_image).'" class="img-responsive"/>'
              );
          }
          echo json_encode($data);
        }

      }
    }

    public function service_tab(){
      if(array_key_exists('id',$_POST)){
        $type = new Service_type();
        $id = trim($this->input->post('id'));
        $type->load($id);
        $type->service_type_desc = trim($this->input->post('description'));

        if ($_FILES['image']['error'] == 0) {
          foreach($type->search(array('service_type_image'=>$id)) as $types){
            $data=array(
              'image'=>$types->service_type_image
            );
          }

          @unlink('uploads/'.$data['image']);
          $this->do_upload('image' , 'service_type');
          $file = $this->upload->data('file_name');
          $type->service_type_image = 'service_type/' . $file;

        }
        $type->save();
        if($type->db->affected_rows() > 0){
        echo 1;
        }
        else{
          echo 0;
        }
      }
    }

    public function product_tab(){
      if(array_key_exists('id',$_POST)){
        $type = new Product_type();
        $id = trim($this->input->post('id'));
        $type->load($id);
        $type->prod_type_desc = trim($this->input->post('description'));

        if ($_FILES['image']['error'] == 0) {
          foreach($type->search(array('prod_type_id'=>$id)) as $types){
            $data=array(
              'image'=>$types->prod_type_image
            );
          }
          @unlink('uploads/'.$data['image']);

          $this->do_upload('image' , 'product_type');
          $file = $this->upload->data('file_name');
          $type->prod_type_image= 'product_type/' . $file;

        }

        $type->save();
        if($type->db->affected_rows() > 0){
        echo 1;
        }
        else{
          echo 0;
        }
      }
    }

    public function update_about(){
      if(array_key_exists('about_id',$_POST)){
        $title = new About_more_title();
        $id = trim($this->input->post('about_id'));
        $title->load($id);
        $title->description = trim($this->input->post('description'));
        $title->save();
        if($title->db->affected_rows() > 0){
          echo 1;
        }
        else{
          echo 0;
        }
      }
    }

    public function service_nail_details(){
       if (array_key_exists('id', $_POST)) {
        $id = trim($this->input->post('id'));
        $service_info = new Service_info();
        $data = array();
        foreach ($service_info->view_details($id) as $details) {
          $data[] =array(
            'name'=>html_escape(ucwords($details->service_name)),
            'price'=>'&#8369; '.html_escape(get_service_sale_price($details->price, $details->vat)),
            'status'=>service_status(html_escape(ucwords($details->status))),
            'type'=>html_escape(ucwords($details->service_type)),
            'class'=>html_escape(ucwords($details->service_class)),
            'description'=>html_escape($details->service_desc),
            'image'=>'<img src="'.html_escape(base_url('uploads/'.$details->service_image)).'" class="img-responsive
            img-thumbnail
            "/>'
            );          
        }
        echo json_encode($data);
       }
    }

    public function service_hair_details(){
       if (array_key_exists('id', $_POST)) {
        $id = trim($this->input->post('id'));
        $service_info = new Service_info();
        $data = array();
        foreach ($service_info->view_details($id) as $details) {
          $data[] =array(
            'name'=>html_escape(ucwords($details->service_name)),
            'price'=>'&#8369; '.html_escape(get_service_sale_price($details->price, $details->vat)),
            'status'=>service_status(html_escape(ucwords($details->status))),
            'type'=>html_escape(ucwords($details->service_type)),
            'class'=>html_escape(ucwords($details->service_class)),
            'description'=>html_escape($details->service_desc),
            'image'=>'<img src="'.html_escape(base_url('uploads/'.$details->service_image)).'" class="img-responsive
            img-thumbnail
            "/>'
            );          
        }
        echo json_encode($data);
       }
    }

    public function service_facial_details(){
       if (array_key_exists('id', $_POST)) {
        $id = trim($this->input->post('id'));
        $service_info = new Service_info();
        $data = array();
        foreach ($service_info->view_details($id) as $details) {
          $data[] =array(
            'name'=>html_escape(ucwords($details->service_name)),
            'price'=>'&#8369; '.html_escape(get_service_sale_price($details->price, $details->vat)),
            'status'=>service_status(html_escape(ucwords($details->status))),
            'type'=>html_escape(ucwords($details->service_type)),
            'class'=>html_escape(ucwords($details->service_class)),
            'description'=>html_escape($details->service_desc),
            'image'=>'<img src="'.html_escape(base_url('uploads/'.$details->service_image)).'" class="img-responsive
            img-thumbnail
            "/>'
            );          
        }
        echo json_encode($data);
       }
    }

    public function product_view_details(){
      if(array_key_exists('bc_id', $_POST)){
        $bc_id = trim($this->input->post('bc_id'));
        $b = new Barcode();
        $data =array();
        foreach($b->get_details($bc_id) as $details){
          $data[]=array(
            'name'=>html_escape(ucwords($details->prod_name)),
            'barcode'=>html_escape($details->barcode),
            'stock'=>html_escape(number_format($details->quantity)),
            'subname'=>html_escape(ucwords($details->prod_subname)),
            'package'=>html_escape(ucwords($details->prod_packaging_type)),
            'type'=>html_escape(ucwords($details->prod_type)),
            'class'=>html_escape(ucwords($details->prod_class)),
            'supplier'=>html_escape(ucwords($details->prod_manufacturer)),
            'description'=>html_escape(ucwords($details->prod_desc)),
            'made_date'=>html_escape(ucwords(my_date($details->prod_made_date))),
            'expire'=>html_escape(ucwords(my_date($details->prod_date_exp))),
            'created'=>html_escape(ucwords(my_date($details->prod_info_date_inputted))),
            'size'=>html_escape(strtoupper($details->prod_size)).html_escape(strtoupper($details->size_type)),
            'weight'=>html_escape(strtoupper($details->prod_weight)).html_escape(strtoupper($details->unit)),
            'price'=>html_escape(product_retail($details->price,$details->mark_up, $details->vat)),
          );
        }
        echo json_encode($data);
      }
    }


    public function services() {

      $service = new Service_type();
//    $a = $about->get_title();

      $data = array(
        'title' => 'Service Offered' ,
        'heading' => 'Service Offered' ,
        'service' => $service->get() ,
        'user_info' => $this->userInfo
      );

      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('web_setting/service_view' , $data);
      $this->load->view('templates/footer');
    }


    public function get_product_info() {
      $p = new Products();
      $id = $this->input->get('id');
      foreach ($p->get_product_full_info($id) as $p) {
        $data[] = array(
          'name' => $p->prod_name ,
          'image' => $p->prod_image ,
          'price' => $p->price ,
          'type' => $p->prod_type ,
          'class' => $p->prod_class ,
          'qty' => $p->prod_quantity ,
          'weight' => $p->weight ,
          'unit' => $p->unit ,
          'date' => $p->prod_made_date ,
          'expire' => $p->prod_date_exp ,
          'manufacturer' => $p->prod_manufacturer ,
          'desc' => $p->prod_desc ,
        );
      }
      echo json_encode($data);

    }

    public function get_all_products() {
      $p = new Products();
      $data = array();
      foreach ($p->get_all() as $p) {
        $data[] = array(
          'name' => $p->prod_name ,
          'id' => $p->bc_id ,
          'image' => '<img src="' . base_url('uploads/' . $p->prod_image) . '">' ,
          'price' => $p->price ,
          'action' => '<button data-id="' . $p->bc_id . '" onclick="view_details($(this).attr(\'data-id\'))" class="btn btn-dark btn-sm"data-toggle="modal" data-target=".bs-example-modal-sm" ><span class="prod_view glyphicon glyphicon-folder-open"></span> view</button>' ,
        );
      }
      echo json_encode($data);
    }

    public function products() {
      $data = array(
        'title' => 'Products Offered' ,
        'heading' => 'Products Offered' ,
        'user_info' => $this->userInfo
      );
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('web_setting/product_view' , $data);
      $this->load->view('templates/footer');
    }

    public function get_service_type() {
      $type = new Service_type();
      $data = array();

      foreach ($type->get_service_type(trim($this->input->post('type'))) as $type) {
        $data[] = array(
          'id' => html_escape($type->service_type_id) ,
          'type' => html_escape($type->service_type) ,
          'description' => html_escape($type->service_type_desc) ,
          'image' => base_url('uploads/' . $type->service_type_image) ,
        );
      }
      echo json_encode($data);
    }


/*display service facial*/
           public function get_services_nail() {
             if(array_key_exists('id', $_POST)){
               $service = new Service_info();
               $data = array();
               $id = trim($this->input->post('id'));
               foreach ($service->get_service_by_type_id($id) as $service) {
                 $checked = '';
                 if ($service->view == 1) {
                   $checked = 'checked';
                 }
                 $classname = '';
                 if($service->status == 'available'){
                   $classname = 'btn-success';
                 }
                 else{
                   $classname = 'btn-danger';
                 }
                 $data[] = array(
                   'id' => html_escape($service->service_info_id) ,
                   'check' => '<label>
                                 <input  type="checkbox" onclick="update_service_status(this)" ' . $checked . '  data-id="' . html_escape($service->service_info_id) . '" >
                               </label>' ,
                   'name' => html_escape($service->service_name) ,
                   'status' => service_status(html_escape($service->status)),
                   'image' => base_url('uploads/' . html_escape($service->service_image)) ,
                   'price' =>'&#8369; '.html_escape(get_service_sale_price($service->price, $service->vat)),
                   'action'=>'<button onclick="nail_details('.$service->service_info_id.')"
        class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"></span></button>'


                 );
               }
               echo json_encode($data);
             }
           }

       public function get_services_hair() {
         if(array_key_exists('id', $_POST)){
           $service = new Service_info();
           $data = array();
           $id = trim($this->input->post('id'));
           foreach ($service->get_service_by_type_id($id) as $service) {
             $checked = '';
             if ($service->view == 1) {
               $checked = 'checked';
             }
             $classname = '';
             if($service->status == 'available'){
               $classname = 'btn-success';
             }
             else{
               $classname = 'btn-danger';
             }
             $data[] = array(
               'id' => html_escape($service->service_info_id) ,
               'check' => '<label>
                             <input  type="checkbox" onclick="update_service_status(this)" ' . $checked . '  data-id="' . html_escape($service->service_info_id) . '" >
                           </label>' ,
               'name' => html_escape($service->service_name) ,
               'status' => service_status(html_escape($service->status)),
               'image' => base_url('uploads/' . html_escape($service->service_image)) ,
               'price' =>'&#8369; '.html_escape(get_service_sale_price($service->price, $service->vat)),
               'action'=>'<button onclick="hair_details('.$service->service_info_id.')"
    class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"></span></button>'


             );
           }
           echo json_encode($data);
         }
       }

    public function get_services_facial() {
      if(array_key_exists('id', $_POST)){
        $service = new Service_info();
        $data = array();
        $id = trim($this->input->post('id'));
        foreach ($service->get_service_by_type_id($id) as $service) {
          $checked = '';
          if ($service->view == 1) {
            $checked = 'checked';
          }
          $classname = '';
          if($service->status == 'available'){
            $classname = 'btn-success';
          }
          else{
            $classname = 'btn-danger';
          }
          $data[] = array(
            'id' => html_escape($service->service_info_id) ,
            'check' => '<label>
                          <input  type="checkbox" onclick="update_service_status(this)" ' . $checked . '  data-id="' . html_escape($service->service_info_id) . '" >
                        </label>' ,
            'name' => html_escape($service->service_name) ,
            'status' => service_status(html_escape($service->status)),
            'image' => base_url('uploads/' . html_escape($service->service_image)) ,
            'price' =>'&#8369; '.html_escape(get_service_sale_price($service->price, $service->vat)),
            'action'=>'<button onclick="facial_details('.$service->service_info_id.')"
 class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"></span></button>'


          );
        }
        echo json_encode($data);
      }
    }

    public function get_product_nail() {
      $p = new Products();
      $id = trim($this->input->post('id'));
      $data = array();

      foreach ($p->get_product_by_type_id($id) as $prod) {
        $checked = '';
        if ($prod->view == 1) {
          $checked = 'checked';
        }
        $data[] = array(
          'check' => '<div>
                    <input  onclick="update_product_status(this)" ' . $checked . ' type="checkbox"  data-id="' . html_escape($prod->prod_id) . '" >
                  </label>' ,
          'name' => html_escape($prod->prod_name) ,

          'image' => base_url('uploads/' . html_escape($prod->prod_image)) ,
          'price' => html_escape(product_retail($prod->price, $prod->mark_up, $prod->vat)) ,
          'action'=>'<button data-toggle="modal" data-target="#view-details" class="btn btn-sm btn-default"
          onclick="nail_view_details('.$prod->bc_id.');"><span
          class="glyphicon
           glyphicon-folder-open"></span></button>'

        );
      }
      echo json_encode($data);
    }
 
    public function get_product_hair() {
      $p = new Products();
      $id = trim($this->input->post('id'));
      $data = array();

      foreach ($p->get_product_by_type_id($id) as $prod) {
        $checked = '';
        if ($prod->view == 1) {
          $checked = 'checked';
        }
        $data[] = array(
          'check' => '<div>
                    <input  onclick="update_product_status(this)" ' . $checked . ' type="checkbox"  data-id="' . html_escape($prod->prod_id) . '" >
                  </label>' ,
          'name' => html_escape($prod->prod_name) ,

          'image' => base_url('uploads/' . html_escape($prod->prod_image)) ,
          'price' => html_escape(product_retail($prod->price, $prod->mark_up, $prod->vat)) ,
          'action'=>'<button data-toggle="modal" data-target="#view-details" class="btn btn-sm btn-default"
          onclick="hair_view_details('.$prod->bc_id.');"><span
          class="glyphicon
           glyphicon-folder-open"></span></button>'

        );
      }
      echo json_encode($data);
    }


    public function get_product_facial() {
      $p = new Products();
      $id = trim($this->input->post('id'));
      $data = array();

      foreach ($p->get_product_by_type_id($id) as $prod) {
        $checked = '';
        if ($prod->view == 1) {
          $checked = 'checked';
        }
        $data[] = array(
          'check' => '<div>
                    <input  onclick="update_product_status(this)" ' . $checked . ' type="checkbox"  data-id="' . html_escape($prod->prod_id) . '" >
                  </label>' ,
          'name' => html_escape($prod->prod_name) ,

          'image' => base_url('uploads/' . html_escape($prod->prod_image)) ,
          'price' => html_escape(product_retail($prod->price, $prod->mark_up, $prod->vat)) ,
          'action'=>'<button data-toggle="modal" data-target="#view-details" class="btn btn-sm btn-default"
          onclick="facial_view_details('.$prod->bc_id.');"><span
          class="glyphicon
           glyphicon-folder-open"></span></button>'

        );
      }
      echo json_encode($data);
    }


    public function update_product_status() {
      if (array_key_exists('id' , $_POST)) {
        $p = new Products();
        $id = trim($this->input->post('id'));
        $status = trim($this->input->post('status'));
        $p->load($id);
        $p->view = $status;
        $p->save();
        if ($p->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }

    }

    public function update_service_status() {
      if (array_key_exists('id' , $_POST)) {
        $s = new Service_info();
        $id = trim($this->input->post('id'));
        $status = trim($this->input->post('status'));
        $s->load($id);
        $s->view = $status;
        $s->save();
        if ($s->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }

    }   

    public function get_product_type() {
      $type = new Product_type();
      $data = array();
      foreach ($type->get_type(strtolower($this->input->post('type'))) as $type) {
        $data[] = array(
          'id' => $type->prod_type_id ,
          'title' => html_escape($type->prod_type),
          'description' => strip_tags($type->prod_type_desc) ,
          'image' => base_url('uploads/' . $type->prod_type_image) ,
        );
      }
      echo json_encode($data);


    }


    /**********************************************************/
    public function delete_service_image() {
      $id = $this->input->post('id');
      $img = new About_more_images();
      $img->load($id);
      $name = $img->search(array('ami_id' => $id));
      foreach ($name as $image_name) {
        $image_name = $image_name->image;
      }
      @unlink('uploads/' . $image_name);
      $img->delete();
      if ($img->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }

    }

    public function get_service_image() {
      $id = $this->input->post('id');
      $img = $this->about_more_images->get_image($id);
      $num = 1;
      foreach ($img as $i) {

        $date = $i->date_time;
        $date = date_create($date);
        $date = date_format($date , 'F d, Y | h:i:s A');
        $data[] = array(
          'count' => $num ,
          'date' => $date ,
          'image' => '<img style="max-height:300px; max-width:100%;width:100% !important; height:250px " class="img-container img-responsive img-thumbnail"  src="' . base_url('uploads/' . $i->image) . '">' ,
          'action' => '<button  data-id="' . $i->ami_id . '" id="btn-delete-service" onclick="delete_service_image($(this).attr(\'data-id\'))" class="pull-right btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button>'
        );
        $num ++;
      }
      echo json_encode($data);
    }

    public function service_add_image() {

      $img = new About_more_images();

      if ($_FILES['image']['error'] == 0) {
        $this->do_upload('image' , 'about/service');
        $file = $this->upload->data('file_name');
        $img->image = 'about/service/' . $file;
        $img->t_id = $this->input->post('id');
        $img->date_time = date('Y-m-d h:i:s A');
        $img->save();

         if ($img->db->affected_rows() > 0) {
           echo 1;
         } else {
           echo 0;
         }
      }
     

   


    }

    public function get_service() {
      $prop = $this->about_more_title->get_service();
      foreach ($prop as $p) {
        $data[] = array(
          'id' => $p->t_id ,
          'description' => strip_tags(ucfirst($p->description)) ,
        );
      }
      echo json_encode($data);
    }


    /**********************************************************/
    public function delete_product_image() {
      $id = $this->input->post('id');
      $img = new About_more_images();
      $img->load($id);
      $name = $img->search(array('ami_id' => $id));
      foreach ($name as $image_name) {
        $image_name = $image_name->image;
      }
      @unlink('uploads/' . $image_name);
      $img->delete();
      if ($img->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }

    }

    public function get_product_image() {
      $id = $this->input->post('id');
      $img = $this->about_more_images->get_image($id);
      $num = 1;
      foreach ($img as $i) {

        $date = $i->date_time;
        $date = date_create($date);
        $date = date_format($date , 'F d, Y | h:i:s A');
        $data[] = array(
          'count' => $num ,
          'date' => $date ,
          'image' => '<img style="max-height:300px; max-width:100%;width:100% !important; height:250px " class="img-container img-responsive img-thumbnail"  src="' . base_url('uploads/' . $i->image) . '">' ,
          'action' => '<button  data-id="' . $i->ami_id . '" id="btn-delete-team" onclick="delete_product_image($(this).attr(\'data-id\'))" class="pull-right btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button>'
        );
        $num ++;
      }
      echo json_encode($data);
    }

    public function product_add_image() {

      $img = new About_more_images();

      if ($_FILES['image']['size'] > 0) {
        $this->do_upload('image' , 'about/product');
        $file = $this->upload->data('file_name');
        $img->image = 'about/product/' . $file;
        $img->t_id = $this->input->post('id');
        $img->date_time = date('Y-m-d h:i:s A');
      }
      $img->save();

      if ($img->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }
    }

    public function get_product() {
      $prop = $this->about_more_title->get_product();
      foreach ($prop as $p) {
        $data[] = array(
          'id' => $p->t_id ,
          'description' => strip_tags(ucfirst($p->description)) ,
        );
      }
      echo json_encode($data);
    }


    /**********************************************************/
    public function delete_team_image() {
      $id = $this->input->post('id');
      $img = new About_more_images();
      $img->load($id);
      $name = $img->search(array('ami_id' => $id));
      foreach ($name as $image_name) {
        $image_name = $image_name->image;
      }
      @unlink('uploads/' . $image_name);
      $img->delete();
      if ($img->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }

    }

    public function get_team_image() {
      $id = $this->input->post('id');
      $img = $this->about_more_images->get_image($id);
      $num = 1;
      foreach ($img as $i) {


        $date = $i->date_time;
        $date = date_create($date);
        $date = date_format($date , 'F d, Y | h:i:s A');
        $data[] = array(
          'count' => $num ,
          'date' => $date ,
          'image' => '<img style="max-height:300px; max-width:100%;width:100% !important; height:250px " class="img-container img-responsive img-thumbnail"  src="' . base_url('uploads/' . $i->image) . '">' ,
          'action' => '<button  id="btn-delete-team" onclick="delete_team_image('.$i->ami_id.')" class="pull-right btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button>'
        );
        $num ++;
      }
      echo json_encode($data);
    }

    public function team_add_image() {

      $img = new About_more_images();

      if ($_FILES['image']['error'] == 0) {
        $this->do_upload('image' , 'about/team');
        $file = $this->upload->data('file_name');
        $img->image = 'about/team/' . $file;
        $img->t_id = $this->input->post('id');
        $img->date_time = date('Y-m-d h:i:s A');
        $img->save();

        if ($this->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }
      }
    

      
    }

    public function get_team() {
      $prop = $this->about_more_title->get_team();
      foreach ($prop as $p) {
        $data[] = array(
          'id' => $p->t_id ,
          'description' => strip_tags(ucfirst($p->description)) ,
        );
      }
      echo json_encode($data);

    }


    /**********************************************************/
    public function customer_add_image() {

      $img = new About_more_images();

      if ($_FILES['image']['error'] == 0) {
        $this->do_upload('image' , 'about/customer');
        $file = $this->upload->data('file_name');
        $img->image = 'about/customer/' . $file;
        $img->t_id = $this->input->post('id');
        $img->date_time = date('Y-m-d h:i:s A');
        $img->save();

        if ($img->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }

      }

      print_r($_POST);
 

     
    }

    public function delete_customer_image() {
      $id = $this->input->post('id');
      $img = new About_more_images();
      $img->load($id);
      $name = $img->search(array('ami_id' => $id));
      foreach ($name as $image_name) {
        $image_name = $image_name->image;
      }
      @unlink('uploads/' . $image_name);
      $img->delete();
      if ($img->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }

    }

    public function get_customer_image() {
      $id = $this->input->post('id');
      $img = $this->about_more_images->get_image(3);
      $num = 1;
      foreach ($img as $i) {


        $date = $i->date_time;
        $date = date_create($date);
        $date = date_format($date , 'F d, Y | h:i:s A');
        $data[] = array(
          'count' => $num ,
          'date' => $date ,
          'image' => '<img style="max-height:300px; max-width:50%" class="img-container img-responsive img-thumbnail"  src="' . base_url('uploads/' . $i->image) . '">' ,
          'action' => '<button  data-id="' . $i->ami_id . '" id="btn-delete" onclick="delete_image($(this).attr(\'data-id\'))" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button>'
        );
        $num ++;
      }
      echo json_encode($data);
    }

    public function get_customer() {

      $cus = new About_more_title();

      $prop = $cus->get_customer_detail();

      $data = array();

      foreach ($prop as $p) {
        $data[] = array(
          'id' => $p->t_id ,
          'description' => strip_tags(ucfirst($p->description)) ,
        );
      }
      echo json_encode($data);
      // print_r($data);

    }


    /**********************************************************/
    public  function update_customer(){
      if(array_key_exists('id',$_POST)) {
        $prop = new About_more_title();
        $id = $this->input->post('id');
        $prop->load($id);

        $prop->description = $this->input->post('description');
        $prop->save();

        if ($prop->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }
    }

    public function update_prop() {
      if(array_key_exists('id',$_POST)){
        $this->db->trans_start();
       
        $prop = new About_more_title();
        $id = $this->input->post('id');
        $prop->load($id);
        $prop->description = $this->input->post('description');
        $prop->save();
        
        $img = new About_more_images();
        $img->load($this->input->post('ami_id'));
        $img->date_time = date('Y-m-d G:i:s A');

        if ($_FILES['image']['error'] == 0) {
      
          foreach ($img->search(array('ami_id' => $this->input->post('ami_id'))) as $d) {
            @unlink('uploads/' . $img->image);
          }

          $this->do_upload('image' , 'about/proprietor');
          $file = $this->upload->data('file_name');
          $img->image = 'about/proprietor/' . $file;
        
        }
          $img->save();


        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
          echo 0;
        } else {
          echo 1;
        }

      }

    }

    public function get_prop() {
      $prop = $this->about_more_title->get_proprietor();
      foreach ($prop as $p) {
        $date = $p->date_time;
        $date = date_create($date);
        $date = date_format($date , 'F d, Y | g:i:s A');
      
         $data[] = array(
          'id' => $p->t_id ,
          'ami_id' => $p->ami_id ,
          'description' => strip_tags(ucfirst($p->description)) ,
          'image' => base_url('uploads/' . $p->image) ,
          'date' => $date
        );

      }
      echo json_encode($data);
      // print_r($date);

    }
  }
