<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
/**
 * Created by PhpStorm.
 * User: Pc1
 * Date: 3/11/2016
 * Time: 12:24 PM
 */

function my_date($date = FALSE, $time = FALSE) {

  $date = date_create($date);
  if (!empty($time)) {
    $date = date_format($date, 'F d, Y');
    $date = $date . ' | ' . $time;
  } else {
    $date = date_format($date, 'F d, Y');
  }

  return $date;
}

function discounted_price($price = false, $markup = false, $vat = false, $discount = false){
  
  $price = $price + $markup + $vat;
  $discount = $price * $discount/100; 
  $discounted_price = $price - $discount;

  return $discounted_price;


}


function product_retail($price = false, $markup = false, $vat = false) {
  // $markup = $markup;
  // $new_price = ($price + $vat)*($markup*100);
  $new_price = ($price + $vat) + $markup;
return $new_price;
}

function get_vat($price = FALSE) {
  $vat = ($price / 1.12) * 0.12;

  return $vat;
}

function get_net_price($price = FALSE) {
  $vat = ($price / 1.12) * 0.12;
  $price = $price - $vat;

  return $price;
}


function get_service_sale_price($price = FALSE, $vat = FALSE) {
  return $price + $vat;
}

function get_trans_code() {
  return substr(strtoupper(sha1(date('Y'))), 0, 4) . '-' . substr(strtoupper(sha1(date('M'))), 0,
    4) . '-' . substr(strtoupper(sha1(time())), 0, 4);
}



function service_status($status = FALSE) {
  $class = '';
  if ($status == 'available') {
    $class = 'label-success';
  } else {
    $class = 'label-danger';
  }

  return '<span class="label ' . $class . '">' . $status . '</span>';
}

function get_price($price = FALSE, $mark_up = FALSE, $vat = FALSE) {
  return ($price + $mark_up) + $vat;
}

function toArray($obj) {
  if (is_object($obj)) {
    $obj = (array)$obj;
  }
  if (is_array($obj)) {
    $new = array();
    foreach ($obj as $key => $val) {
      $new[$key] = toArray($val);
    }
  } else {
    $new = $obj;
  }

  return $new;
}


?>
