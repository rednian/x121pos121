<?php
/**
 * Created by PhpStorm.
 * User: RedZ
 * Date: 22/02/2016
 * Time: 11:20 AM
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

  public function __construct() {
    parent::__construct();
    
  }

  public function test(){
    // echo  round(microtime(true) * 1000);
    $num = 1000;
    for ($i=0; $i < $num ; $i++) { 
        if ($i % 2 == 0 && $i != 0) {
            for ($j=100; $j > $i ; $j++) { 
              echo $i.'<br>';
            }
        }
    }
  }
}
