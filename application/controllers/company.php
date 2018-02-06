<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

  class Company extends MY_Controller {


    public function __construct() {
      parent::__construct();
      $this->load->model('company_model');
      $this->load->model('Reciept_info');
    }

    public function index() {

      $com = new Company_model();
      if (!empty($com->get())) {
        foreach ($com->get() as $temp) {
          $data_temp = array(
            'name'=>$temp->name,
            'id'=>$temp->ci_id,
            'logo'=>$temp->logo,
            'address'=>$temp->address,
            'email'=>$temp->email,
            'phone'=>$temp->phone,
            'postal_code'=>$temp->postal_code,
            'postal_code'=>$temp->postal_code,
            'tin_number'=>$temp->tin_number,
            );
        }
      }

      $receipt = new Reciept_info();

      if (!empty($receipt->get())) {
        foreach ($receipt->get() as $temp) {
          $receipt_data = array(
            'pn'=>$temp->pn,
            'min'=>$temp->min,
            'sn'=>$temp->serial_number,
            'accdtn_date'=>$temp->accreditation_date,
            'accdtn_no'=>$temp->accreditation_no,
            'note'=>$temp->note,
            'si'=>$temp->si,
            );
        }
      }

  
   
      $data = array(
        'title' => 'Company Information' ,
        'heading' => 'Company Information' ,
        'user_info' => $this->userInfo,
        'data'=>$data_temp,
        'receipt'=>$receipt_data,
      );

      // print_r($data);
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('profile/company/company_view' , $data);
      $this->load->view('templates/footer');
    }

    public function accdtn_date(){
      if (array_key_exists('pk', $_POST)) {
          
          $r = new Reciept_info();
          $r->load(trim($this->input->post('pk')));
          $r->accreditation_date = trim($this->input->post('value'));
          $r->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }

    public function accdtn_no(){
      if (array_key_exists('pk', $_POST)) {
          
          $r = new Reciept_info();
          $r->load(trim($this->input->post('pk')));
          $r->accreditation_no = trim($this->input->post('value'));
          $r->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }

    public function serial(){
      if (array_key_exists('pk', $_POST)) {
          
          $r = new Reciept_info();
          $r->load(trim($this->input->post('pk')));
          $r->serial_number = trim($this->input->post('value'));
          $r->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }

    public function min(){
      if (array_key_exists('pk', $_POST)) {
          
          $r = new Reciept_info();
          $r->load(trim($this->input->post('pk')));
          $r->min = trim($this->input->post('value'));
          $r->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }


    public function si(){
      if (array_key_exists('pk', $_POST)) {
          
          $r = new Reciept_info();
          $r->load(trim($this->input->post('pk')));
          $r->si = trim($this->input->post('value'));
          $r->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }


    public function note(){
      if (array_key_exists('pk', $_POST)) {
          
          $r = new Reciept_info();
          $r->load(trim($this->input->post('pk')));
          $r->note = trim($this->input->post('value'));
          $r->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }

    /*company information*/

    public function upload(){
        if(array_key_exists('id', $_POST)){
          
          $id = trim($this->input->post('id'));
          $com = new Company_model();

          $com->load($id);
          if ($_FILES['image']['error'] == 0) {
          $this->do_upload('image' , 'company');
          $file = $this->upload->data('file_name');
            $com->logo = 'company/' . $file;
            $com->save();
        }  
        }
    }

    public function email(){
      if (array_key_exists('pk', $_POST)) {
          
          $com = new Company_model();
          $com->load(trim($this->input->post('pk')));
          $com->email = trim($this->input->post('value'));
          $com->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }

    public function tin_number(){
      if (array_key_exists('pk', $_POST)) {
          
          $com = new Company_model();
          $com->load(trim($this->input->post('pk')));
          $com->tin_number = trim($this->input->post('value'));
          $com->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }

    public function postal_code(){
      if (array_key_exists('pk', $_POST)) {
          
          $com = new Company_model();
          $com->load(trim($this->input->post('pk')));
          $com->postal_code = trim($this->input->post('value'));
          $com->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }

    public function phone(){
      if (array_key_exists('pk', $_POST)) {
          
          $com = new Company_model();
          $com->load(trim($this->input->post('pk')));
          $com->phone = trim($this->input->post('value'));
          $com->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }


    public function store_name(){
      if (array_key_exists('pk', $_POST)) {
          
          $com = new Company_model();
          $com->load(trim($this->input->post('pk')));
          $com->name = trim($this->input->post('value'));
          $com->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }

    public function address(){
      if (array_key_exists('pk', $_POST)) {
          
          $com = new Company_model();
          $com->load(trim($this->input->post('pk')));
          $com->address = trim($this->input->post('value'));
          $com->save();

          if ($this->db->affected_rows() > 0) {
            echo 1;
          }
      }
    }
  }
