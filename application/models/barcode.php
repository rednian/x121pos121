<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 3/9/2016
   * Time: 2:54 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Barcode extends MY_Model {

    const DB_TABLE = "barcode";
    const DB_TABLE_PK = "bc_id";

    public $bc_id;
    public $barcode;
    public $prod_id;
    public $on_delete;

    public function get_consumable_id($name = false){
      $this->toJoin = array(
        'products' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
        'stock_in' => 'barcode' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option = 'no'");
       $this->db->where("product_main_info.prod_name",$name);
      $this->db->where('barcode.on_delete IS NULL');
      // $this->db->where('stock_in.quantity <= 10');

      return $this->get();
    }

      public function product_inventory($data = false){
        
        $this->toJoin = array(
          'products' => 'barcode' ,
//          'product_type' => 'products' ,
          // 'product_class' => 'products' ,
          'weight' => 'products' ,
          'size' => 'products' ,
          'price' => 'barcode' ,
          'stock_in' => 'barcode' ,
        );

        $this->db->where('product_main_info.on_delete IS NULL');
        
        $this->db->where('barcode.on_delete IS NULL');
        
        if($data == 'selling'){

   
         $this->db->where("product_main_info.option = 'yes'");
        }
        else if($data == 'consumable'){


         $this->db->where("product_main_info.option = 'no'");
        }


        return $this->get();
      }

       public function add_by_barcode($barcode = FALSE) {
      $this->toJoin = array(
        'products' => 'barcode' ,
        'stock_in' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where('pricing.price > 0');
      $this->db->where('quantity > 0');
        $this->db->where(array('barcode.barcode' => trim($barcode)));

      return $this->get();
    }

    public function get_details($id=false){
      $this->toJoin = array(
        'products' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
        'stock_in' => 'barcode' ,
      );  
      $this->db->where('product_main_info.on_delete IS NULL');
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where('barcode.bc_id',$id);
      return $this->get();
    }

    public function get_list(){
      $this->toJoin = array(  
        'products' => 'barcode' ,
//        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
        'stock_in' => 'barcode' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');
      $this->db->where('barcode.on_delete IS NULL');
      // $this->db->order_by('option');
      $this->db->order_by('product_main_info.prod_id DESC');
      return $this->get();
    }

    public function get_low_product() {
      $this->toJoin = array(
        'products' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
        'stock_in' => 'barcode' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where('stock_in.quantity <= 10');

      return $this->get();
    }

    public function get_inactive() {
      $this->toJoin = array(
        'products' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
        'stock_in' => 'barcode' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where('stock_in.quantity = 0');

      return $this->get();
    }

    public function get_all() {
      $this->toJoin = array(
        'products' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
        'stock_in' => 'barcode' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      return $this->get();
    }

    public function get_on_hand() {
      $this->toJoin = array(
        'products' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
        'stock_in' => 'barcode' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where('stock_in.quantity > 0');

      return $this->get();
    }


    public function stock_out_list() {
      $user = $this->session->userdata('logged_in');
      $this->toJoin = array(
        'products' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
        'temp_table' => 'barcode' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where('temp_table.acc_id' , $user['id']);
      $this->db->where('pricing.price > 0');
      $this->db->order_by('temp_table.last_update','DESC');

      return $this->get();
    }

    public function get_available_products($barcode = FALSE) {
      $this->toJoin = array(
        'products' => 'barcode' ,
        'stock_in' => 'barcode' ,
//        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');
      $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where('pricing.price > 0');
      $this->db->where('quantity >= 0');
      // $this->db->order_by('prod_name ASC');
      $this->db->order_by('quantity DESC');
      if (!empty($barcode)) {
        $this->db->where(array('barcode.barcode' => trim($barcode)));
        $this->db->or_where("product_main_info.prod_name LIKE '{$barcode}%'");
      }

      return $this->get();
    }

    public function get_barcode($barcode = FALSE) {

       $this->toJoin = array(
        'products' => 'barcode'
        );
      
      $this->db->where(array('barcode' => $barcode));
      $this->db->where('barcode.on_delete IS NULL');

      return $this->get();
    }

    /*retrive information if barcode already exist
    * use in product monitoring class
     * is_barcode_exist function
    */
    public function get_product_by_barcode($barcode = FALSE) {
      $this->toJoin = array(
        'products' => 'barcode' ,
        'stock_in' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
      );
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where(array('barcode' => $barcode));

      return $this->get();
    }

    public function get_unprice_product_by_id($id = FALSE) {
      $this->toJoin = array(
        'products' => 'barcode' ,
        'price' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'size' => 'products' ,
        'weight' => 'products' ,
      );
      $this->db->where('pricing_id' , trim((int)$id));

      return $this->get();
    }

    public function get_unprice_product() {
      $this->toJoin = array(
        'products' => 'barcode' ,
        'price' => 'barcode' ,
        'product_type' => 'products' ,
        // 'product_class' => 'products' ,
        'size' => 'products' ,
        'weight' => 'products' ,
      );
      $this->db->where('pricing.price' , 0);

      return $this->get();
    }
  }