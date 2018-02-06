<?php
  /**
   * Created by PhpStorm.
   * User: Pc1
   * Date: 3/9/2016
   * Time: 2:38 PM
   */
  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  class Products extends MY_Model {

    const DB_TABLE = "product_main_info";
    const DB_TABLE_PK = "prod_id";

    public $prod_id;
    public $prod_type_id;
    public $prod_class;
    public $prod_size_id;
    public $prod_wu_id;

    public $prod_size;
    public $prod_weight;
    public $prod_image;
    public $prod_name;
    public $prod_subname;
    public $prod_packaging_type;
    public $prod_manufacturer;
    public $prod_benefits;
    public $prod_desc;
    public $prod_made_date;
    public $prod_date_exp;
    public $prod_info_date_inputted;
    public $view;
    public $on_delete;
    public $option;
    public $email;
    public $contact_number;


    /*
    *this get product information
    *but no price, quantity and barcode
    */
    public function get_product_info() {
      $this->toJoin = array(
        'weight' => 'products' ,
        'size' => 'products' ,
        'product_type' => 'products' ,
        'product_class' => 'products' ,
        'products' => 'barcode' ,
      );

      return $this->get();
    }


    /*
    *@param id: product id
    *return object
    * get all information by its product id
    */
    public function get_product_full_info($id = FALSE) {
      $this->toJoin = array(
        'product_class' => 'products' ,
        'product_type' => 'products' ,
        'barcode' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'stock_in' => 'barcode' ,
        'price' => 'barcode'
      );
      $this->db->where('barcode.prod_id = ' . $id);

      return $this->get();
    }

    public function display_web() {
      $this->toJoin = array(
        'product_class' => 'products' ,
        'product_type' => 'products' ,
        'barcode' => 'products' , 
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode'
      );


      return $this->get();

    }


    public function get_all() {
      $this->toJoin = array(
        'product_class' => 'products' ,
        'product_type' => 'products' ,
        'barcode' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode'
      );


      return $this->get();
    }


    public function get_active_product() {
      $this->toJoin = array(
        'barcode' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'stock_in' => 'barcode'
      );
      $this->db->where('quantity > 0');
      $this->db->order_by('prod_name');

      return $this->get();
    }

    public function get_inactive_product() {
      $this->toJoin = array(
        'barcode' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'stock_in' => 'barcode'
      );
      $this->db->where('quantity < 1');
      $this->db->order_by('prod_name');

      return $this->get();
    }

    public function get_product_by_type_id($id = FALSE) {
      $this->toJoin = array(
        'barcode' => 'products' ,
        'size' => 'products' ,
        'price' => 'barcode' ,
        'weight' => 'products'
      );
      $this->db->where('product_main_info.on_delete IS NULL');
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where(array(
        'product_main_info.prod_type_id' => $id ,
        'price >' => 0
      ));

      return $this->get();
    }

    public function get_all_product() {

      $this->toJoin = array(
        'barcode' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'stock_in' => 'barcode'
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->order_by('prod_name');

      return $this->get();
    }


    public function get_unprice() {
      $this->toJoin = array(
        'product_class' => 'products' ,
        'product_type' => 'products' ,
        'barcode' => 'products' ,
      );
      $this->db->where('product_main_info.on_delete IS NULL');

      return $this->get();
    }

    public function get_selected_barcode_id($id = FALSE) {
      $this->toJoin = array(
        'product_class' => 'products' ,
        'product_type' => 'products' ,
        'barcode' => 'products' ,
        'price' => 'barcode'
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where('barcode.bc_id = ' . $id);

      return $this->get();
    }

    public function get_existing_product($barcode = FALSE) {
      $this->toJoin = array(
        'product_class' => 'products' ,
        'product_type' => 'products' ,
        'weight' => 'products' ,
        'size' => 'products' ,
        'barcode' => 'products' ,
        'stock_in' => 'barcode'
      );
      $this->db->where('product_main_info.on_delete IS NULL');
       $this->db->where("product_main_info.option != 'no'");
      $this->db->where('barcode.on_delete IS NULL');
      $this->db->where('barcode = ' . $barcode);

      return $this->get();

    }


  }