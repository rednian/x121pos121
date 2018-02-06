<?php
/**
 * Created by PhpStorm.
 * User: RedZ
 * Date: 22/02/2016
 * Time: 11:20 AM
 */

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Reports extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('barcode');
    $this->load->model('products');
    $this->load->model('price');
    $this->load->model('stock_in');
    $this->load->model('Display_in');
    $this->load->model('service_info');
    $this->load->model('service_rendered');
    $this->load->model('user');
    $this->load->model('trans_code');
    $this->load->model('Artist_model');
    $this->load->model('Package');
    $this->load->model('stock_out_history');
    $this->load->model('sales_report');
  }


  public function summary_reports(){



    $start = trim($this->input->post('start'));
    $end = trim($this->input->post('end'));

    $sales_report = new sales_report();

 $date = $total_net  = $service_net =  $net = $commission = $total_services = $total_product = $total_gross = $gross = $qty = $price = 0; 

 

    if(!empty($start) && !empty($end)){

      $date = $start;

      $result = $sales_report->get_by_date($start,$end);

    }
    else{

      $result = $sales_report->get_all();

    }





   

    $data = array();

    if(!empty($result)){
      foreach ($result as $temp) {

        $price = $temp->prod_price + $temp->service_price;

        $qty = $temp->service_qty + $temp->package_qty + $temp->quantity;


        $net += $temp->mark_up * $qty;

        $gross = $price * $qty;
        
        $total_gross +=$gross;

        $total_product += $temp->prod_price * $qty;
        $total_services += $temp->service_price * $qty;
        $commission +=  $temp->commission;

        $service_net = $total_services - $commission;


        $total_net = $service_net + $net;


        $data[] =array(
          'date'=>$temp->date_rendered.''.$temp->date_out,
          'name'=>ucwords(strtolower($temp->service_name1)).''.ucwords(strtolower($temp->package_name1)).''.ucwords(strtolower($temp->prod_name)),
          'amount'=>number_format($price,2),
          'qty'=>number_format($qty),
          'gross'=>number_format($gross,2),
          'total_gross'=>number_format($total_gross,2),
          'total_product'=>number_format($total_product,2),
          'total_services'=>number_format($total_services,2),
          'total_commission'=>number_format($service_net,2),
          'total_product_net'=>number_format($net,2),
          'total_net'=>number_format($total_net,2),
          'artits_commission'=>number_format($commission,2),
          );
      }
    }
    // echo "<pre>";
    // print_r($data);
    echo json_encode(array('data'=>$data));

 
  }





  public function get_all(){
    
    $service_rendered = new Service_rendered();

    $start = trim($this->input->post('start'));
    $end = trim($this->input->post('end'));
    $result = '';
    $data =array();


  


    if(empty($start) && empty($end)){
      $result = $service_rendered->get_all();
    }
    else{
      $start = @date_create($start);
      $start = date_format($start, 'Y-m-d');

      $end = @date_create($end);
      $end = date_format($end, 'Y-m-d');

      $result = $service_rendered->get_by_date($start, $end);
    }

  $commission_total = $net_total = $grand_total = $net = $commission = $amount = $qty = $total = 0;

    if(!empty($result)){

      // echo "<pre>";

      foreach ($result as $temp) {

          $amount = $temp->service_price;

          $qty = $temp->service_qty + $temp->package_qty;



          $commission = $temp->commission;
          // $commission = $commission * $qty;

          $commission_total += $commission;

          $total = $amount * $qty;

          $grand_total += $total;

          $net = $total - $commission;

          $net_total += $net;

          // print_r($temp);

        $data[] = array(
          'date'=>$temp->date_rendered,
          'name'=>ucwords($temp->s_name).''.ucwords($temp->p_name),
          'amount'=>number_format($amount,2),
          'qty'=>number_format($qty),
          'total'=>number_format($total,2),
          'commission'=>number_format($commission,2) == 0 ? '-' : number_format($commission,2) ,
          'net_income'=>number_format($net,2),
          'grand_total'=>number_format($grand_total,2),
          'net_total'=>number_format($net_total,2),
          'total_commission'=>number_format($commission_total,2),
          );
      }

    }

    echo json_encode(array('data'=>$data));
    // print_r($data);


  }

  /*+++++++++++++++++++++++++++++++++++++++++++++++++
    +                artist                         +
    +++++++++++++++++++++++++++++++++++++++++++++++++
  */
  public function artist(){

    $artist_model = new Artist_model();

        $data = array(
          'title' => 'Artist Report' ,
          'heading' => 'Artist Report' ,
          'user_info'=>$this->userInfo,
          'artist'=>$artist_model->get()
        );

        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/nav',$data);
        $this->load->view('reports/artist',$data);
        $this->load->view('templates/footer');
  }


  public function get_artist(){
     
     $artist_model = new Artist_model();

     $result = $artist_model->get();

     $data =array();

     if(!empty($result)){
      foreach ($result as $temp) {
        $data[] =array(
          'name'=> ucwords($temp->fname).' '.ucwords($temp->midname).' '.ucwords($temp->lastname),
          'id'=>$temp->ar_id
          );
      }

      
     }
     echo json_encode($data);

  }

  public function artist_detail(){
    if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {
      
    

    $artist_model = new Artist_model();

    // $start = trim($this->input->post('start'));
    // $end = trim($this->input->post('end'));
    $id = trim($this->input->post('id'));

    $result = $artist_model->artist_detail($id);

    $data =array();

    if(!empty($result)){
      foreach ($result as $temp) {
        $data[] = array(
          'artist'=>ucwords($temp->fname).' '.ucwords($temp->midname).' '.ucwords($temp->lastname),
          'commission'=>number_format($temp->commission,2),
          'date'=>my_date($temp->date),
          'service'=>ucwords($temp->service_name),
          );
      }

    }

    echo json_encode(array('data'=>$data));
  }

  }

  public function artist_report_by_date(){
    if($this->input->method() == 'post'){
      $start = trim($this->input->post('start'));
      $end = trim($this->input->post('end'));
      $id = trim($this->input->post('id'));

      $start = @date_create($start);
      $start = date_format($start, 'Y-m-d');

      $end = @date_create($end);
      $end = date_format($end, 'Y-m-d');


      $artist_model = new Artist_model();



      $result = $artist_model->artist_report_by_date($start, $end,$id);
      $data =array();

      if(!empty($result)){
        foreach ($result as $temp) {
          $data[] = array(
            'artist'=>ucwords($temp->fname).' '.ucwords($temp->midname).' '.ucwords($temp->lastname),
            'commission'=>number_format($temp->commission,2),
            'date'=>my_date($temp->date),
            'service'=>ucwords($temp->service_name),
            );
        }

      }

      echo json_encode(array('data'=>$data));


    }

  }

  public function artist_report_all(){

  



    $artist_model = new Artist_model();



    $result = $artist_model->all_report();
    $data =array();

    if(!empty($result)){
      foreach ($result as $temp) {
        $data[] = array(
          'artist'=>ucwords($temp->fname).' '.ucwords($temp->midname).' '.ucwords($temp->lastname),
          'commission'=>number_format($temp->commission,2),
          'date'=>my_date($temp->date),
          'service'=>ucwords($temp->service_name),
          );
      }

    }

    echo json_encode(array('data'=>$data));

  }


  /*+++++++++++++++++++++++++++++++++++++++++++++++++
    +               monitoring                      +
    +++++++++++++++++++++++++++++++++++++++++++++++++
  */


  public function monitoring(){
        $data = array(
          'title' => 'Monitoring' ,
          'heading' => 'Monitoring' ,
          'user_info'=>$this->userInfo
        );

        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/nav',$data);
        $this->load->view('reports/monitoring',$data);
        $this->load->view('templates/footer');
  }

  public function consumable_list(){
    
    $b = new Barcode();
    $data = array();
    $i = 0;
    
    $result = $b->get_consumable();
    if(!empty($result)){
      foreach ($result as $temp) {
          $i++;
        $data[] = array(
          'name'=>$temp->prod_name,
          'barcode'=>'<strong>'.$temp->barcode.'</strong>', 
          'count'=>$i,
          'price'=>$temp->price + $temp->vat,
          'qty'=>$temp->quantity,
          'make'=>$temp->prod_made_date,
          'expire'=>$temp->prod_date_exp,
          'description'=>ucfirst($temp->prod_desc),
          );
      
      }
      echo json_encode(array('data'=>$data));
    }
  }

  public function get_consumable(){
    $b = new Barcode();
    $data = $b->get_consumable();

    $total_price = $total_qty = $total = 0;

    foreach ($data as $d) {
  
      $total_price += product_retail($d->price,$d->mark_up,   $d->vat);
      $total_qty += $d->quantity;
      $total =+ product_retail($d->price,$d->mark_up, $d->vat)*$d->quantity;

      $list[] = array(
        'name' => ucwords($d->prod_name),
        'qty' => number_format($d->quantity),
        'price' => '&#8369; '.number_format(product_retail($d->price,$d->mark_up, $d->vat),2),
        'sub'=>'&#8369; '.number_format(product_retail($d->price,$d->mark_up, $d->vat)*$d->quantity,2),
        'total_qty'=>number_format($total_qty),
        'total_price'=>'&#8369; '.number_format($total_price,2),
        'total'=>'&#8369; '.number_format($total,2),
      );
    }
    echo json_encode($list);
  }

  /*+++++++++++++++++++++++++++++++++++++++++++++++++
    +                 Sales                         +
    +++++++++++++++++++++++++++++++++++++++++++++++++
  */

  public function all_transaction(){
    // echo "<pre>";

      $start = trim($this->input->post('start'));
      $end = trim($this->input->post('end'));

      $stock_out_history = new Stock_out_history();

      if(!empty($start) && !empty($end)){
        $result = $stock_out_history->sales_by_date($start, $end);
      }
      else{
        $result = $stock_out_history->sales_all();
      }

     

    $total_net = $total_gross = $net =  $qty = $gross = $income = $retail_price =  $supplier_price = 0;
    
     $data= array();

     $grand_total = 0;
      
      if(!empty($result)){

          foreach ($result as $temp) {

            $supplier_price = $temp->vat + $temp->price;

            $retail_price = $temp->vat + $temp->price + $temp->mark_up;

            $income = $retail_price - $supplier_price;

            $qty = $temp->quantity;

            $gross = $retail_price * $qty;
            $total_gross += $gross;

            $net = $income * $qty;
            $total_net += $net;

            $data[] = array(
              'date'=>$temp->date_out,
              'name'=>ucwords($temp->prod_name),
              'supplier_price'=>number_format($supplier_price,2),
              'retail_price'=>number_format($retail_price,2),
              'income'=>number_format($income,2),
              'qty'=>number_format($qty),
              'gross'=>number_format($gross,2),
              'net'=>number_format($net,2),
              'total_gross'=>number_format($total_gross,2),
              'total_net'=>number_format($total_net,2),
              );
          }
      }
    
      echo json_encode(array('data'=>$data));
    
  }




  public function   get_transaction_by_date(){
     $grand_total = 0;

    if(array_key_exists('start',$_POST)){

      $t = new Trans_code();

      $start = trim($this->input->post('start'));
      $end = trim($this->input->post('end'));

     $result =  $t->get_current_day_sales2($start, $end);

     $data =array();  

     if(!empty($result)){
        foreach ($result as $temp) {
          $data[] = array(
             'date'=>$temp->t_date,
              'code'=>$temp->t_code,
              'qty'=>$temp->quantity1,
              'total'=>number_format($temp->price,2),
              'grand_total'=>number_format($grand_total,2),
              'id'=>$temp->tc_id,
            'action'=>'<button class="btn btn-xs btn-white" onclick="sales_detail('.$temp->tc_id.')"><span class="fa fa-folder-open-o"></span></button>',
            );
        }
     }

      // if(!empty($result)){
        

        //  $discount_total = $profit_tot al = $grand_total = $total = $income = 0;

        // foreach($result as $p){

        //   $total = product_retail($p->price, $p->mark_up, $p->vat)*$p->quantity;

        //   $income = $p->mark_up * $p->quantity;

        //   $grand_total += $total;

        //   $profit_total += $income;


          // $data[] = array(
          //   'grand_total'=>' &#8369; '.number_format($grand_total,2),
          //   'total_income'=>' &#8369; '.number_format($profit_total,2),  
          //   'date'=>$p->t_date,
          //     'trans_code' => html_escape($p->t_code) ,
          //   'description'=>ucwords(substr($p->prod_name, 0,10)),
          //   'price'=>' &#8369; ' .number_format($p->price + $p->vat,2), 
          //   'markup'=>' &#8369; ' .number_format($p->mark_up,2),
          //   'income'=>'<b>&#8369; ' .number_format($income,2).'</b>',
          //   'retail'=>' &#8369; ' .product_retail($p->price, $p->mark_up, $p->vat),
          //   'quantity'=>number_format($p->quantity),
          //   'tax'=>' &#8369; ' .number_format($p->vat,2),
          //   'discount'=>' &#8369; ' .number_format($p->discount,2),
          //   'total'=>'<b> &#8369; ' .number_format($total,2).'</b>',
          //   );
        
        // }
        echo json_encode(array('data'=>$data));
      // }
    }
  }

      public function sales_reports() {


        $rendered = $this->service_rendered->get_rendered_services();
    //    $payment = $this->payment->get_current_day_sales();
        $i = new Stock_in();
        $data = array(
          'title' => 'Sales Reports' ,
          'heading' => 'Sales Reports' ,
    //      'payment'=>$payment,
          'user_info'=>$this->userInfo
        );

        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/nav',$data);
        $this->load->view('reports/sales-report-view' , $data);
        $this->load->view('templates/footer');
      }

      public function test(){
        
        $stock_out_history = new Stock_out_history();
        
        $start =trim($this->input->post('start'));
        $end =trim($this->input->post('end'));

        $data =array();

        if(empty($start) && empty($end)){
          $start = date('Y-m-d');
          $end = date('Y-m-d');
        }
        
        $result = $stock_out_history->sales_by_date($start, $end);


        $price = $total = $retail = $qty =  0;

          if (!empty($result)) {
            foreach ($result as $temp) {

              $price  = $temp->price + $temp->vat;

              $qty = $temp->quantity;

              $retail = $temp->mark_up + $price;

              $data[] =array(
                'date'=>my_date($temp->date_out),
                'name'=>ucwords($temp->prod_name),
                'original_price'=>number_format($price,2),
                'retail'=>number_format($retail,2),
                'qty'=>number_format($qty),
                'total'=>number_format($qty),
                );
            }
          }

          echo json_encode(array('data'=>$data));
      

      }

     

      public function detail_report(){

          $t = new Trans_code();
          
          $id = trim($this->input->post('id'));

          $data =array();

            $discount_total = $profit_total = $grand_total = $total = $income = $qty =  0;

          $result = $t->get_detail($id);

          if(!empty($result)){
           foreach ($result as $temp) {

            $total = product_retail($temp->price, $temp->mark_up, $temp->vat)*$temp->quantity;

            $income = $temp->mark_up * $temp->quantity;

            $grand_total += $total;

            $profit_total += $income;

            $qty += $temp->quantity;

             $data[] = array(
              'barcode'=>html_escape($temp->barcode),
              'name'=>html_escape(ucwords($temp->prod_name)),
              'original_price'=>html_escape(number_format($temp->price + $temp->vat,2)),
              'markup'=>html_escape(number_format($temp->mark_up,2)),
              'retail'=>html_escape(number_format($temp->mark_up + $temp->price + $temp->vat,2)),
              'qty'=>html_escape(number_format($temp->quantity)),
              'tax'=>html_escape(number_format($temp->vat,2)),
              'discount'=>html_escape(number_format($temp->discount,2)),
              'income'=>html_escape(number_format($income,2)),
              'total'=> html_escape(number_format($total,2)),
              );
           }
          }

          echo json_encode(array('data'=>$data));


  
      }

    public function detail_reports($id = false){

        $t = new Trans_code();


          $data = array(
            'title' => 'Sales Reports' ,
            'heading' => 'Sales Reports' ,
           'data'=>$t->get_detail(38),
            'user_info'=>$this->userInfo
          );
          $this->load->view('templates/header' , $data);
          $this->load->view('templates/sidebar',$data);
          $this->load->view('templates/nav',$data);
          $this->load->view('reports/sales/detail' , $data);
          $this->load->view('templates/footer');
    }






  public function all_reports(){

    $t = new Trans_code();

    $result = $t->get_all_sales();

    $data = array();

    $discount_total = $profit_total = $grand_total = $total = $income = 0;

    if(!empty($result)){

      foreach ($result as $p) {
        
        $total = product_retail($p->price, $p->mark_up, $p->vat)*$p->quantity;

        $income = $p->mark_up * $p->quantity;

        $grand_total += $total;

        $profit_total += $income;

        $data[] = array(
          'grand_total'=>' &#8369; '.number_format($grand_total,2),
          'total_income'=>' &#8369; '.number_format($profit_total,2),
          'date'=>$p->t_date,
          'trans_code'=>$p->t_code,
          'description'=>ucwords(substr($p->prod_name, 0,10)),
          'price'=>' &#8369; ' .number_format($p->price + $p->vat,2),
          'markup'=>' &#8369; ' .number_format($p->mark_up,2),
          'income'=>'<b>&#8369; ' .number_format($income,2).'</b>',
          'retail'=>' &#8369; ' .product_retail($p->price, $p->mark_up, $p->vat),
          'quantity'=>number_format($p->quantity),
          'tax'=>' &#8369; ' .number_format($p->vat,2),
          'discount'=>' &#8369; ' .number_format($p->discount,2),
          'total'=>'<b> &#8369; ' .number_format($total,2).'</b>',
          );

      }
      echo json_encode($data);
    }

  }

  public function get_package_all(){
      $r = new Service_rendered();
  
    $payment = $r->get_package();
    $data =array();
    if(!empty($payment)) {
      $revenue = 0;
      $vat = 0;
      foreach ($payment as $sales) {
        $revenue += $sales->sub;
        $vat +=$sales->vat;
        $date = date_create($sales->date_rendered);
        $date = date_format($date , 'F d, Y');
        $data[] = array(
          'name' => $sales->package_name ,
          'price' =>number_format($sales->price , 2) ,
          'vat'=>'%'.number_format($sales->vat),
          'num' => number_format($sales->number) ,
          'date' => $date ,
          'total' => number_format($sales->sub + $sales->vat, 2) ,
          'revenue'=>number_format($revenue,2),
          'vat'=>number_format($vat,2),
          'net'=>number_format($revenue-$vat,2),
        );
      }
    }
    echo json_encode(array('data'=>$data));
  }

  public function get_package_sales_by_date(){
      $r = new Service_rendered();
    $start = $this->input->post('start');
    $end = $this->input->post('end');

    $payment = $r->get_current_package_sales($start,$end);
    $data =array();
    if(!empty($payment)) {
      $revenue = 0;
      $vat = 0;
      foreach ($payment as $sales) {
        $revenue += $sales->sub;
        $vat +=$sales->vat;
        $date = date_create($sales->date_rendered);
        $date = date_format($date , 'F d, Y');
        $data[] = array(
          'name' => $sales->package_name ,
          'price' =>number_format($sales->price , 2) ,
          'vat'=>'%'.number_format($sales->vat),
          'num' => number_format($sales->number) ,
          'date' => $date ,
          'total' => number_format($sales->sub , 2) ,
          'revenue'=>number_format($revenue,2),
          'vat'=>number_format($vat,2),
          'net'=>number_format($revenue-$vat,2),
        );
      }
    }
    echo json_encode(array('data'=>$data));
  }

  public function get_service_all(){
      $r = new Service_rendered();
    $start = $this->input->post('start');
    $end = $this->input->post('end');

    $payment = $r->get_sales();
    $data =array();
    if(!empty($payment)) {
      $revenue = 0;
      $vat = 0;
      foreach ($payment as $sales) {
        $revenue += $sales->sub;
        $vat +=$sales->vat;
        $date = date_create($sales->date_rendered);
        $date = date_format($date , 'F d, Y');
        $data[] = array(
          'name' => $sales->service_name ,
          'price' =>number_format($sales->price , 2) ,
          'vat'=>'%'.number_format($sales->vat),
          'num' => number_format($sales->number) ,
          'date' => $date ,
          'total' => number_format($sales->sub + $sales->vat , 2) ,
          'revenue'=>number_format($revenue,2),
          'vat'=>number_format($vat,2),
          'net'=>number_format($revenue-$vat,2),
        );
      }
    }
    echo json_encode(array('data'=>$data));
  }


  public function get_service_sales_by_date(){
      $r = new Service_rendered();
    $start = $this->input->post('start');
    $end = $this->input->post('end');

    $payment = $r->get_current_day_sales($start,$end);
    $data =array();
    if(!empty($payment)) {
      $revenue = 0;
      $vat = 0;
      foreach ($payment as $sales) {
        $revenue += $sales->sub;
        $vat +=$sales->vat;
        $date = date_create($sales->date_rendered);
        $date = date_format($date , 'F d, Y');
        $data[] = array(
          'name' => $sales->service_name ,
          'price' =>number_format($sales->price , 2) ,
          'vat'=>'%'.number_format($sales->vat),
          'num' => number_format($sales->number) ,
          'date' => $date ,
          'total' => number_format($sales->sub + $sales->vat, 2) ,
          'revenue'=>number_format($revenue,2),
          'vat'=>number_format($vat,2),
          'net'=>number_format($revenue-$vat,2),
        );
      }
    }
    echo json_encode(array('data'=>$data));
  }

  public function get_product_sales_by_date(){
  
    if(array_key_exists('start',$_POST)){

      $t = new Trans_code();

      $start = trim($this->input->post('start'));
      $end = trim($this->input->post('end'));

      $result = $t->get_current_day_sales($start,$end);
      $data =array();
      if(!empty($result)){
        

         $discount_total = $profit_total = $grand_total = $total = $income = 0;

        foreach($result as $p){

          $total = product_retail($p->price, $p->mark_up, $p->vat)*$p->quantity;

          $income = $p->mark_up * $p->quantity;

          $grand_total += $total;

          $profit_total += $income;


          $data[] = array(
            'grand_total'=>' &#8369; '.number_format($grand_total,2),
            'total_income'=>' &#8369; '.number_format($profit_total,2),
            'date'=>$p->t_date,
              'trans_code' => html_escape($p->t_code) ,
            'description'=>ucwords(substr($p->prod_name, 0,10)),
            'price'=>' &#8369; ' .number_format($p->price + $p->vat,2), 
            'markup'=>' &#8369; ' .number_format($p->mark_up,2),
            'income'=>'<b>&#8369; ' .number_format($income,2).'</b>',
            'retail'=>' &#8369; ' .product_retail($p->price, $p->mark_up, $p->vat),
            'quantity'=>number_format($p->quantity),
            'tax'=>' &#8369; ' .number_format($p->vat,2),
            'discount'=>' &#8369; ' .number_format($p->discount,2),
            'total'=>'<b> &#8369; ' .number_format($total,2).'</b>',
            );
        
        }
        echo json_encode($data);
      }
    }

  }


   /*+++++++++++++++++++++++++++++++++++++++++++++++++
    +                 Inventory                      +
    ++++++++++++++++++++++++++++++++++++++++++++++++++  
  */ 


  public function product_inventory(){
    // if ($this->input->method() == 'post') {
        
        $value = trim($this->input->post('value'));

        $b = new Barcode();

        $data = array();
        
        $i = 0;

        $selling = $consumable = $all_product =  $t =0;

        $status  = '';

        $result = $b->product_inventory($value);
        if(!empty($result)){
          foreach ($result as $temp) {

              $i++;



              if($temp->option == 'yes'){
                
                $status = 'Selling';
                
                $selling++;  
              }
              else{

                $status = 'Consumable';

                $consumable++;
              }
                 $t++;
                // $all_product  = $selling + $consumable;

                // if($selling == 0 || $consumable == 0){
                //   $all_product = $t;
                // }
            

            $data[] = array(
              'barcode'=>'<strong>'.$temp->barcode.'</strong>',
              'name'=>ucwords($temp->prod_name),
              'count'=>$i,
              'price'=>number_format($temp->price + $temp->vat + $temp->mark_up,2),
              'qty'=>$temp->quantity,
              'expiration'=>my_date($temp->prod_date_exp),
              'status'=>$status,
              'all'=> number_format($t),
              'selling'=> number_format($selling),
              'consumable'=> number_format($consumable),
              );
          
          }
          
        }

        echo json_encode(array('data'=>$data));
    // }
  }

  public function  get_available_packages(){
    
    $packge = new Package();
    
    $result = $packge->get();

    $data =array();
    $total_price = 0;
    $count = 0;

    if (!empty($result)) {
      foreach ($result as $temp) {

          $total_price += get_service_sale_price($temp->price,$temp->vat);

        $data[] =array(
          'count'=>$count +1,
          'name'=>ucwords($temp->package_name),
          'price'=>number_format($temp->price + $temp->vat, 2),
          'type'=>ucwords($temp->type),
          'description'=>ucwords($temp->description),
          'total'=>'&#8369; '.number_format($total_price)                                                                                                                                                                                                                                                                                                                                                                                  
          );
        $count++;
      }
    }

    echo json_encode(array('data'=>$data));
  }

 
  public function get_available_services(){

    $s = new service_info();

    $total_price = 0;

    if(!empty($s->get_info_list())){


      $num = 0;
        foreach ($s->get_info_list() as $list) {

          $total_price += get_service_sale_price($list->price,$list->vat);

          $data[] =array(
            'count'=>$num+1,
            'type'=>ucwords($list->service_type),
            'class'=>ucwords($list->service_class),
            'description'=>ucwords($list->service_desc),
            'name'=>ucwords($list->service_name),
            'price'=>'&#8369; '.number_format(get_service_sale_price($list->price,$list->vat),2),
            'total'=>number_format($num++),
            'total_price'=>'&#8369; '.number_format($total_price,2)
            );

        }
        echo json_encode(array('data'=>$data)); 
    }

  }

  public function inventory_reports() {

    $service = $this->service_info->get_info_list();
    $rendered = $this->service_rendered->get_rendered_services();
    
    $i = new Stock_in();
    $data = array(
      'title' => 'Inventory Reports' ,
      'heading' => 'Inventory Reports' ,
      'inventory' => $i->get_all_inventory_levels() ,
      'low' => $i->get_low_stock(),
      'onhand' => $i->get_on_hand(),
      'available_services'=>$service,
      'user_info'=>$this->userInfo
    );
    $this->load->view('templates/header' , $data);
    $this->load->view('templates/sidebar',$data);
    $this->load->view('templates/nav',$data);
    $this->load->view('reports/inventory-report-view' , $data);
    $this->load->view('templates/footer');
  }





}
