<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

  class Product extends MY_Controller {


    public function __construct() {
      parent::__construct();
      $this->load->model('products');
      $this->load->model('barcode');
      $this->load->model('stock_in');
      $this->load->model('History_stock_in');
      $this->load->model('Product_type');
      $this->load->model('Product_class');
      $this->load->model('Size');
      $this->load->model('Weight');
      $this->load->model('stock_in_type');
      $this->load->model('Price');
      $this->load->model('stock_out_history');
      $this->load->model('trans_code');
    }

    public function index() {

      $b = new Barcode();
   
      $data = array(

        'title' => 'Product List' ,
        'heading' => 'Product List' ,
        'product' => $b->get_list() ,
        'user_info' => $this->userInfo,
      );
      
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('profile/product/product' , $data);
      $this->load->view('templates/footer');
    }

    public function remove_qty(){
      if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {
        
        // print_r($_POST);

        $bc_id = trim($this->input->post('id'));
        $qty = trim($this->input->post('quantity'));
        $user = $this->session->userdata('logged_in');


       $stock_in = new Stock_in();
       
       $result = $stock_in->search(array('bc_id'=>$bc_id));
       $stock_in_data = array();

       if(!empty($result)){
         foreach ($result as $temp) {
           $stock_in_data = array(
             'quantity'=>$temp->quantity,
             'bc_id'=>$temp->bc_id,
             'id'=>$temp->stock_in_id,
             );
         }

         $s = new Stock_in();
         $s->load($stock_in_data['id']);
         $s->quantity = $stock_in_data['quantity'] - $qty;
         $s->save();


         


         if($this->db->affected_rows() > 0){
          echo 1;
         }
         else{
          echo 0;
         }


        }



      }

    }

    public function add_qty(){
      if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {

       
        
        $id = trim($this->input->post('id'));
          $user = $this->session->userdata('logged_in');

        $stock_in = new Stock_in();
        
        $result = $stock_in->search(array('stock_in_id'=>$id));
        $data = array();


        if(!empty($result)){
          foreach ($result as $temp) {
            $data = array(
              'quantity'=>$temp->quantity,
              'bc_id'=>$temp->bc_id,
              );
          }

          

           $s = new Stock_in(); 
           $s->load($id);
           $s->quantity =$this->input->post('quantity') + $data['quantity'];
           $s->save();

           $stock_history = new History_stock_in();
           $stock_history->time_in = date('h:i:s');
           $stock_history->date_in = date('Y-m-d');
           $stock_history->quantity = $this->input->post('quantity');
           $stock_history->bc_id = $data['bc_id'];
           $stock_history->type_id = 1;
           $stock_history->acc_id = $user['id'];
           $stock_history->save();




           if($this->db->affected_rows() > 0){
            echo 1;
           }
           else{
            echo 0;
           }
        }

      }
    }

    public function prod_list(){

      
      $b = new Barcode();

      $list = $b->get_list();

      
      
      $data = array();

      if (!empty($list)) {
        foreach ($list as $temp) {

          $slash = '/';

          if(empty($temp->contact_number) || empty($temp->email)){
            $slash = '';
          }


          $button = '';

          if($temp->option == 'no'){
            $button = '  <button class="btn btn-xs btn-white" onclick="remove_qty('.$temp->bc_id.','.$temp->quantity.')" ><span class="fa fa-minus text-danger"><span></button>';
          }


          $data[] = array(
            'name'    =>    ucwords($temp->prod_name),
            'qty'     =>    number_format($temp->quantity),
            'price'   =>    number_format($temp->vat + $temp->mark_up + $temp->price,2),
            'date'    =>    my_date($temp->prod_made_date),
            'expire'  =>    my_date($temp->prod_date_exp),
            'status'  =>    $temp->option,
            'barcode' =>    $temp->barcode,
            'contact' =>    $temp->contact_number.' <b>'.$slash.' </b>'.$temp->email,
            'id'      =>    $temp->bc_id,
            'class'   =>   ucwords($temp->prod_class),
            'action'  =>  '<button class="btn btn-xs btn-white" onclick="view_product('.$temp->bc_id.')"><span class="fa fa-folder-open-o" ><span></button>
                           <button class="btn btn-xs btn-white" onclick="update_product('.$temp->bc_id.')"><span class="fa fa-pencil" ><span></button>
                           <button class="btn btn-xs btn-white" onclick="remove_product('.$temp->bc_id.')"><span class="fa fa-trash"><span></button>
                           <button class="btn btn-xs btn-white" onclick="add_qty('.$temp->stock_in_id.','.$temp->quantity.')"><span class="fa fa-plus text-success"><span></button>
                           '.$button,
            );
        }
      }

      echo json_encode(array('data'=>$data));

    }

    public function is_class_exist() {
      $c = new Product_class();
      $valid = TRUE;

      foreach ($c->get() as $temp) {
       if ( strtolower($temp->prod_class) == strtolower(trim($this->input->post('prod_class')))) {
         $valid = FALSE;
       }

      }
      
      echo json_encode(array('valid' => $valid));
    }

    public function is_type_exist() {
      $t = new Product_type();
      $valid = TRUE;

      foreach ($t->get() as $temp) {
       if ( strtolower($temp->prod_type) == strtolower(trim($this->input->post('type')))) {
         $valid = FALSE;
       }

      }
      
      echo json_encode(array('valid' => $valid));
    }
    

    public function is_size_exist() {
      $s = new Size();
      $valid = TRUE;  

      foreach ($s->get() as $temp) {
       if ( strtolower($temp->size_type) == strtolower(trim($this->input->post('size')))) {
         $valid = FALSE;
       }

      }
      
      echo json_encode(array('valid' => $valid));
    }

    public function is_weight_exist() {
      $w = new Weight();
      $valid = TRUE;

      foreach ($w->get() as $temp) {
       if ( strtolower($temp->unit) == strtolower(trim($this->input->post('weight')))) {
         $valid = FALSE;
       }

      }
      
      echo json_encode(array('valid' => $valid));
    }

    public function update(){
      if (array_key_exists('prod_id', $_POST)) {
            
            $p = new Products();
          $this->db->trans_begin();

            $p->load($this->input->post('prod_id'));
            // $p->prod_type_id = $this->input->post('type');
            // $p->prod_class_id = $this->input->post('prod_class');

            $p->prod_name = ucwords($this->input->post('name'));
            $p->prod_subname = ucwords($this->input->post('subname'));
            $p->prod_packaging_type = ucwords($this->input->post('packaging'));
            // $p->prod_size_id = $this->input->post('size_type');
            // $p->prod_size = $this->input->post('size'); 
            // $p->prod_weight = $this->input->post('weight');
            // $p->prod_wu_id = $this->input->post('weight_type');
            $p->prod_manufacturer = $this->input->post('manufacturer');
            $p->prod_desc = ucfirst($this->input->post('description'));
            $p->prod_made_date = $this->input->post('manufactured');
            $p->prod_date_exp = $this->input->post('expire');

               if ($_FILES['image']['error'] == 0) {
             $this->do_upload('image' , 'products');
            $file = $this->upload->data('file_name');
            $p->prod_image = 'products/' . $file;
            }

            $p->save();

          $b = new Barcode();
          $b->load($this->input->post('bc_id'));
          $b->barcode = $this->input->post('barcode');
          $b->save();

          $st = new stock_in();
          $st->load($this->input->post('qty_id'));
          $st->quantity = $this->input->post('quantity');
          $st->save();

           $pr = new Price();
          $pr->load($this->input->post('price_id'));
          $pr->price = $this->input->post('price');
          $pr->save();

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
    public function edit_product(){
      if ($this->input->method() == 'post' && array_key_exists('bc_id', $_POST)) {

        $this->db->trans_begin();

        $p = new Products();
        $p->load(trim($this->input->post('prod_id')));
        $p->prod_name = trim($this->input->post('name'));
        $p->prod_subname = trim($this->input->post('subname'));
        $p->prod_packaging_type = trim($this->input->post('packaging'));
        $p->prod_made_date = trim($this->input->post('manufactured'));
        $p->prod_desc = trim($this->input->post('description'));
        $p->prod_class = trim($this->input->post('prod_class'));
        $p->prod_manufacturer = trim($this->input->post('prod_manufacturer'));
        $p->prod_size = trim($this->input->post('size'));
        $p->prod_weight = trim($this->input->post('weight'));
        $p->contact_number = trim($this->input->post('contact_number'));
        $p->email = trim($this->input->post('email'));

        if ($_FILES['image']['error'] == 0 && $_FILES['image']['size'] > 0) {
          $this->do_upload('image' , 'products');
          $file = $this->upload->data('file_name');
          $p->prod_image = 'products/' . $file;
        }

        $p->save();

//        size table
        $size = new Size();
        $size->load(trim($this->input->post('prod_size_id')));
        $size->size_type = trim($this->input->post('size_type'));
        $size->save();

        $weight = new Weight();
        $weight->load(trim($this->input->post('prod_wu_id')));
        $weight->unit = trim($this->input->post('weight_type'));
        $weight->save();

        $product_type = new Product_type();
        $product_type->load(trim($this->input->post('prod_type_id')));
        $product_type->prod_type = trim($this->input->post('type'));
        $product_type->save();

        $prices = trim($this->input->post('price'));

        $price = new Price();
        $price->load(trim($this->input->post('pricing_id')));
        $price->price = get_net_price($prices);
        $price->vat = get_vat($prices);
        $price->mark_up = trim($this->input->post('mark_up'));
        $price->save();



        if ($this->db->trans_status() === FALSE){
          $this->db->trans_rollback();
          echo 0;
        }
        else {
          $this->db->trans_commit();
          echo 1;
        }
        $this->db->trans_complete();


      }
    }

    public function update_products(){
      if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {
        
        $barcode = new Barcode();
        $data = array();
        $id = trim($this->input->post('id'));
        $retail = $markup = $price = 0;

        $result = $barcode->get_details($id);

        if(!empty($result)){
          foreach ($result as $temp) {

            if(strtolower($temp->option) == 'yes'){
              $price = $temp->price + $temp->vat;
              $markup = $temp->mark_up;
              $retail = $price + $markup;
            }

            $data = array(
              
              'bc_id'=>$temp->bc_id,
              'barcode'=>ucwords($temp->barcode),

              'prod_id'=>$temp->prod_id,
              'name'=>ucwords($temp->prod_name),
              'subname'=>ucwords($temp->prod_subname),
              'class' => ucwords($temp->prod_class) ,
              'package'=>ucwords($temp->prod_packaging_type),
              'description'=>ucwords($temp->prod_desc),
              'manufacturer'=>ucwords($temp->prod_manufacturer),
              'made'=>ucwords($temp->prod_made_date),
              'expire'=>ucwords($temp->prod_date_exp),
              'option'=>ucwords($temp->option),
              'email'=>ucwords($temp->email),
              'contact_number'=>ucwords($temp->contact_number),
            
              'prod_type_id'=>$temp->prod_type_id,
              'type'=>ucwords($temp->prod_type),

              'prod_size_id'=>$temp->prod_size_id,
              'size_type'=>ucwords($temp->size_type),
              'size'=>ucwords($temp->prod_size),

              'price_id'=>$temp->pricing_id,
              'price'=>number_format($price,2),
              'mark_up'=>number_format($markup,2),
              'retail'=>number_format($retail,2),

              'prod_wu_id'=>$temp->prod_wu_id,
              'weight'=>$temp->prod_weight,
              'unit'=>$temp->unit,


              );
          }

//          print_r($result);

          echo json_encode($data);
        }

      }
    }

    public function update_product($id =FALSE){
      if (!empty($id)) {
        
        $b = new Barcode();
        $p = new Product_type();
        $c = new Product_class();


        $id = base64_decode($id);
        $data = array(
          'title' => 'Product List' ,
          'heading' => 'Product List' ,
          'user_info' => $this->userInfo,
          'data'=>$b->get_details($id),
          'type'=>$p->get(),
          'class'=>$c->get(),
        );


        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar' , $data);
        $this->load->view('templates/nav' , $data);
        $this->load->view('profile/product/update');
        $this->load->view('templates/footer');
      }
    }

    public function is_barcode_exist() {

       $valid = TRUE;
      
      if($this->input->method() == 'post' && array_key_exists('barcode', $_POST)){

        $barcodes = new Barcode();

        $barcode_input  = trim($this->input->post('barcode'));

        $result = $barcodes->get_barcode($barcode_input);

        if(!empty($result)){
          $valid = FALSE;
        }

      }  
      echo json_encode(array('valid' => $valid));
    }

    public function add_product() {
      $p = new Products();
      $data = array(
        'title' => 'Add New Product' ,
        'heading' => 'Add New Product ' ,
        'user_info' => $this->userInfo
      );
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('profile/product/add_product' , $data);
      $this->load->view('templates/footer');
    }

    public function add_products() {
          if(array_key_exists('bc_id', $_POST) && $this->input->method() == 'post'){


                  $bc_id = trim($this->input->post('bc_id'));
                  $stock = new Stock_in();

                  $this->db->trans_start();

                  /*search the barcode id if found  update the quantity*/

                  $result = $stock->search(array('stock_in.bc_id' => $bc_id));
                  $data = array();
                  $update = FALSE;
                  if (!empty($result)) {
                    foreach ($result as $item) {
                      $data = array(
                        'id' => $item->stock_in_id ,
                        'bc_id' => $item->bc_id ,
                        'qty' => $item->quantity,
                      );
                    }
                    $stock->load($data['id']);
                    $stock->quantity = $data['qty'] + $this->input->post('quantity');
                    $stock->save();
                    $update = TRUE;
                  } else {
                    /*if product not yet exist, insert all info*/
                    $p = new Products();
                    $p->prod_name = $this->input->post('name');
                    $p->prod_subname = $this->input->post('subname');
                    $p->prod_packaging_type = $this->input->post('packaging');
                    $p->prod_weight = $this->input->post('weight');
                    $p->prod_wu_id = $this->input->post('weight_type');
                    $p->email = $this->input->post('email');
                    $p->contact_number = $this->input->post('contact_number');

                    $p->prod_size = $this->input->post('size');
                    $p->prod_size_id = $this->input->post('size_type');
                    $p->option = $this->input->post('option');

                    $p->prod_type_id = $this->input->post('type');
                    $p->prod_class = $this->input->post('prod_class');
                    $p->prod_desc = $this->input->post('description');
                    $p->prod_date_exp = $this->input->post('expire');
                    $p->prod_manufacturer = $this->input->post('supplier');
                    $p->prod_made_date = $this->input->post('manufactured');
                    $p->prod_info_date_inputted = date('Y-m-d');
                    $p->view = 0;

                    if ($_FILES['image']['error'] == 0) {
                      $this->do_upload('image' , 'products');
                      $file = $this->upload->data('file_name');
                      $p->prod_image = 'products/' . $file;
                    }

                    if ($_FILES['image']['size'] == 0) {
                      $p->prod_image = 'default/default.png';
                    }

                    $p->save();

                    $product_id = $p->db->insert_id();

                    /*add the new barcode*/
                    $b = new Barcode();
                    $b->prod_id = $product_id;
                    $b->barcode = $this->input->post('barcode');
                    $b->save();

                    $barcode_id = $b->db->insert_id();

                    $stock->bc_id = $barcode_id;
                    $stock->quantity = $this->input->post('quantity');
                    $stock->save();

                    /*add the price barcode id*/
                    $price = new Price();
                    $price->bc_id = $barcode_id;
                    /*set the price to default zero, for easy update of price*/
                    $prices = trim($this->input->post('price'));
                    $price->price = get_net_price($prices);
                    $price->vat = get_vat($prices);
                    $price->mark_up = trim($this->input->post('mark_up'));
                    $price->save();


                  }
                  $user = $this->session->userdata('logged_in');
                  $h = new history_stock_in();
                  $h->time_in = date('h:i:s A');
                  $h->date_in = date('Y-m-d');
                  $h->quantity = $this->input->post('quantity');
                  $h->acc_id = $user['id'];
            //      $h->type_id = $this->input->post('stock_in_type');
                  $h->type_id = 1;
                  if ($update) {
                    $h->bc_id = $bc_id;
                  } else {
                    $h->bc_id = $barcode_id;
                  }
                  $h->save();

                  $this->db->trans_complete();

                  if ($this->db->trans_status() === FALSE) {
                    $h->db->trans_rollback();
                    $stock->db->trans_rollback();
                    echo 0;
                  } else {
                    $this->db->trans_commit();
                    echo 1;
                  }
    
          }
         




        }

    public function delete_product() {
      if($this->input->method() == 'post' && array_key_exists('id', $_POST)){
         
         $b = new Barcode();
         $b->load(trim($this->input->post('id')));
         $b->on_delete = date('Y-m-d h:i:s a');
         $b->save();

         if ($b->db->affected_rows() > 0) {
            echo 1;
         } else {
           echo 0;
         }

      }

    }

    public function history_out() {
      if (array_key_exists('bc_id' , $_POST)) {


        $h = new stock_out_history();
        
        $bc_id = trim($this->input->post('bc_id'));

        $list = $h->gets(($bc_id));

        if (!empty($list)) {
          $data = array();
          foreach ($list as $log) {
            $date = date_create($log->date_out);
            $data[] = array(
              'date' => my_date($log->date_out) . ' | ' . html_escape(ucwords($log->time_out)) ,
              // 'user' => ucwords($log->l_name . ', ' . $log->f_name) ,
              'type' => ucwords($log->type) ,
              'qty' => '<strong>' . number_format($log->quantity) . '</strong>' ,
            );
          }
          echo json_encode($data);
        }
      }

    }

    public function prod_history() {
      if (array_key_exists('bc_id' , $_POST)) {
        $h = new History_stock_in();
        $bc_id = trim($this->input->post('bc_id'));
        $list = $h->get_stock_history($bc_id);
        if (!empty($list)) {
          $data = array();
          foreach ($list as $log) {
            $date = date_create($log->date_in);
            $data[] = array(
              'date' => my_date($log->date_in) . ' | ' . html_escape(ucwords($log->time_in)) ,
              'user' => ucwords($log->l_name . ', ' . $log->f_name) ,
              'type' => ucwords($log->type) ,
              'qty' => '<strong>' . number_format($log->quantity) . '</strong>' ,
            );
          }
          echo json_encode($data);
        }
      }

    }


    public function get_detail() {
      if (array_key_exists('bc_id' , $_POST)) {
        $bc_id = trim($this->input->post('bc_id'));
        $b = new Barcode();
        $details = $b->get_details($bc_id);
        if (!empty($details)) {
          $datea = array();
          foreach ($details as $d) {
            $data[] = array(
              'name' => ucwords($d->prod_name) ,
              'sub' => ucwords($d->prod_subname) ,
              'size' => $d->size ,
              'created' => my_date($d->prod_info_date_inputted) ,
              'qty' => number_format($d->quantity) ,
              'type' => ucwords($d->prod_type) ,
              'class' => ucwords($d->prod_class) ,
              'supplier' => ucwords($d->prod_manufacturer) ,
              'expire' => ucwords($d->prod_date_exp) ,
              'made' => ucwords($d->prod_made_date) ,
              'package' => ucwords($d->prod_packaging_type) ,
              'class' => ucwords($d->prod_class) ,
              'weight' => $d->prod_weight . strtoupper($d->unit) ,
              'description' => ucfirst($d->prod_desc) ,
              'image' => '<img src="' . html_escape(base_url('uploads/' . $d->prod_image)) . '" class="img-responsive">'
            );
          }
          echo json_encode($data);
        }
      }

    }

    public function details($id = FALSE) {
      if (empty($id)) {
        redirect('product ');
      }

      $data = array(
        'id' => $id ,
        'title' => 'Product Details' ,
        'heading' => 'Product Details' ,
        'user_info' => $this->userInfo
      );
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
    
      $this->load->view('profile/product/product_details' , $data);
      $this->load->view('templates/footer');

    }


    public function get_product_type() {
      $type = new Product_type();
      $d = array();
      foreach ($type->get() as $type) {
        $d[] = array(
          'id' => $type->prod_type_id ,
          'type' => $type->prod_type
        );
      }

      echo json_encode($d);
    }

    public function add_product_type() {

      $type = new Product_type();

      if (array_key_exists('type' , $_POST)) {

        $type->prod_type = ucwords(trim($this->input->post('type')));
        $type->prod_type_desc = ucwords(trim($this->input->post('type_description')));

        if ($_FILES['image']['error'] == 0) {
          $this->do_upload('image' , 'product_type');
          $file = $this->upload->data('file_name');
          $type->prod_type_image = 'product_type/' . $file;
        }
        $type->save();

      }
      if ($type->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }
    }


    public function add_product_class() {

      if (array_key_exists('type' , $_POST)) {
        $class = new Product_class();
        $class->prod_class = ucwords(trim($this->input->post('prod_class')));
        $class->prod_type_id = ucwords(trim($this->input->post('type')));
        $class->prod_class_desc = ucwords(trim($this->input->post('class_description')));
        $class->save();
        if ($class->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }

      }

    }


    public function get_product_class() {
      $type_id = $this->input->get('type_id');

      $type = new Product_class();
      $d = array();
      foreach ($type->get_class($type_id) as $class) {
        $d[] = array(
          'id' => $class->prod_class_id ,
          'class' => ucwords($class->prod_class)
        );
      }
      echo json_encode($d);
    }

    public function get_product_size() {

      $s = new Size();
      $d = array();
      foreach ($s->get() as $size) {
        $d[] = array(
          'id' => $size->prod_size_id ,
          'size' => $size->size_type
        );
      }
      echo json_encode($d);
    }

    public function add_size() {
      $s = new Size();
      if (array_key_exists('size' , $_POST)) {
        $s->size_type = strtoupper(trim($this->input->post('size')));
        $s->save();
        if ($s->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }
    }


    public function add_weight() {
      $w = new Weight();
      if (array_key_exists('weight' , $_POST)) {
        $w->unit = ucwords(trim($this->input->post('weight')));
        $w->save();
        if ($w->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }
    }

    public function get_product_weight() {
      $w = new Weight();
      $d = array();
      foreach ($w->get() as $weight) {
        $d[] = array(
          'id' => $weight->prod_wu_id ,
          'weight' => $weight->unit
        );
      }
      echo json_encode($d);
    }

    public function get_stock_in_type() {
      $s = new stock_in_type();
      $d = array();
      foreach ($s->get_stock_in_type() as $type) {
        $d[] = array(
          'id' => $type->type_id ,
          'type' => $type->type
        );
      }
      echo json_encode($d);
    }


    public function get_product_package() {

      $p = new Products();
      foreach ($p->get() as $new_p) {
        $d[] = array(
          $new_p->prod_packaging_type
        );
      }
      echo json_encode($d);
    }




  }
