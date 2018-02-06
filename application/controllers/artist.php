<?php
/**
 * Created by PhpStorm.
 * User: RedZ
 * Date: 27/02/2016
 * Time: 12:04 PM
 */
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Artist extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('artist_model');
  }


  public function index() {
    $users = new User();
    $data = array(
      'title' => 'Artist Information',
      // 'heading' => 'User Account List' ,
      // 'user' => $users->lists() ,
      'user_info' => $this->userInfo
    );
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/nav', $data);
    $this->load->view('profile/artist/artist_list', $data);
    $this->load->view('templates/footer');
  }
  
  public function delete(){
     if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {
          
          $artist = new Artist_model();
          $artist->load(trim($this->input->post('id')));
          $artist->delete();
          // $artist->save();

          if($this->db->affected_rows() > 0){
            echo 1;
          }
          else{
            echo 0;
          }

     }
  }

  public function update(){
     if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {
          
          $artist = new Artist_model();
          $artist->load(trim($this->input->post('id')));
          $artist->fname = trim($this->input->post('fname'));
          $artist->midname = trim($this->input->post('midname'));
          $artist->lastname = trim($this->input->post('lastname'));
          $artist->contact_number = trim($this->input->post('contact'));
          $artist->address = trim($this->input->post('address'));
          $artist->save();

          if($this->db->affected_rows() > 0){
            echo 1;
          }
          else{
            echo 0;
          }

     }
  }

  public function get_by_id(){
     if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {
      
      $artist = new Artist_model();
      $result = $artist->get_by_id(trim($this->input->post('id')));
      $data =array();

      if(!empty($result)){
        foreach ($result as $temp) {
          $data[] =array(
            'id'=>$temp->ar_id,
            'fname'=>ucwords($temp->fname),
            'midname'=>ucwords($temp->midname),
            'lastname'=>ucwords($temp->lastname),
            'contact'=>$temp->contact_number,
            'address'=>ucfirst($temp->address)
            );
        }

      }
       echo json_encode($data);

     }
  }

  public function get_artist() {

    $a = new Artist_model();

    $artist_list = $a->get();

    $data = array();

    if (!empty($artist_list)) {
      $i = 1;
      foreach ($a->get() as $temp) {
        $data[] = array(
          'count' => $i++,
          'name' => ucwords($temp->fname) . ' ' . ucwords($temp->midname) . ' ' . ucwords($temp->lastname),
          'contact' => html_escape($temp->contact_number),
          'address' => ucwords($temp->address),
          'action' => '
            <a href="#update-artist-dialog" data-toggle="modal" class="btn btn-xs btn-white" onclick="update(' . $temp->ar_id . ')"><span class="fa fa-pencil"></span></a>
            <button class="btn btn-xs btn-white" onclick="remove_artist(' . $temp->ar_id . ')"><span class="fa fa-remove"></span></button>'
        );
      }
    }
    echo json_encode(array('data' => $data));

    // echo json_encode($data);
  }

  public function create() {
    if ($this->input->method() == 'post') {

      $a = new Artist_model();
      $a->fname = trim($this->input->post('fname'));
      $a->midname = trim($this->input->post('midname'));
      $a->lastname = trim($this->input->post('lastname'));
      $a->contact_number = trim($this->input->post('contact_number'));
      $a->address = trim($this->input->post('address'));
      $a->save();

      if ($this->db->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }

    }
  }
}