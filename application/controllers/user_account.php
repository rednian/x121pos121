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

  class User_account extends MY_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('user');
      $this->load->model('position');
      $this->load->model('User_accessibility_option');
    }

    /**
     *display the main dashboard
     */
    public function index() {
      $users = new User();
      $data = array(
        'title' => 'User Account List' ,
        'heading' => 'User Account List' ,
        'user' => $users->lists() ,
        'user_info' => $this->userInfo
      );
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('profile/user_account/user_account' , $data);
      $this->load->view('templates/footer');

    }

    public function is_password_exist(){
     if ($this->input->method() == 'post' && array_key_exists('password', $_POST)) {
        
        $user = new User();

         $valid = FALSE;

        $password = trim($this->input->post('password'));

        $user_password = $user->is_password_exist($password);

        if(!empty($user_password)){
          $valid = TRUE;
        }

        echo json_encode(array('valid'=>$valid));

      }
    }

    public function get_accessibility(){
      if ($this->input->method() == 'post' && array_key_exists('id', $_POST)) {
          
          $access = new User_accessibility_option();
          
          $user_id = trim($this->input->post('id'));

          if (!empty($access->get_list($user_id))) {
              
              foreach ($access->get_list($user_id) as $temp) {
                $data[] = array(
                  'id'=>$temp->am_id,
                  );
              }

              echo json_encode($data);
          }
      }
    }

    public function update($id = FALSE , $pos_id = FALSE) {
      if (!empty($id)) {
        $a = new User();
        $a->load($id);
        $a->f_name = trim($this->input->post('fname'));
        $a->m_name = trim($this->input->post('midname'));
        $a->l_name = trim($this->input->post('lastname'));
        $a->save();

        $p = new Position();


        if ($a->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }
    }

    public function remove_user() {
      if (array_key_exists('id' , $_POST)) {
        $id = trim($this->input->post('id'));
        $u = new User();
        $u->load($id);
        $u->on_delete = date('Y-m-d h:i:s a');
        $u->save();

        if ($u->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }
    }

    public function active_users() {
      $users = new User();
      $data = array();
      $disable2 = '';
      if($this->userInfo['username'] != 'admin'){
        $disable2 = 'disabled';
      }
      foreach ($users->lists() as $u) {
        $disable = '';


        if (strtolower($u->username) == 'admin') {
          $disable = 'disabled';
        }
        $data[] = array(
          'name' => ucwords($u->l_name) . ', ' . ucwords($u->f_name) . ' ' . substr($u->m_name , 0 , 1) ,
          'image' => '<img style="width:60px;height:60px" class="img-circle img-thumbnail hidden-print hidden-xs" src="' . base_url('uploads/' . $u->img_path) . '">' ,
          'username' => $u->username ,
          'position' => $u->position ,
          'date' => my_date($u->date_created) ,
          'delete' => '<button '.$disable2.' ' . $disable . ' onclick="delete_user(' . $u->acc_id . ')" class="hidden-print btn btn-white
          btn-xs"><span class="fa fa-trash "></span></button>' ,
          'view' => '<a  href="' . base_url('user_account/profile/' . base64_encode($u->acc_id)) . '"
          class="btn
          btn-white btn-xs hidden-print"><span class="fa fa-folder-open-o "></span></a>' ,
          'update' => '<button '.$disable2.' onclick="update_user_view(' . $u->acc_id . ')" class="hidden-print btn btn-white
          btn-xs" data-toggle="modal" data-target="#update-user-dialog"><span class="fa fa-pencil "></span></button>'
        );
      } 
      echo json_encode($data);
    }

    public function get_users() {
      $users = new User();
      $view_path = base_url('user_account/profile');
      foreach ($users->lists() as $user) {
        $d[] = array(
          'name' => ucwords($user->l_name . ', ' . $user->f_name . ' ' . $user->m_name) ,
          'position' => ucwords($user->position) ,
          'username' => ucfirst($user->username) ,
          'date' => my_date($user->date_created) ,

        );
      }
      echo json_encode($d);

    }


    /*
     * display the form
     * */
    public function create_new_user() {

      $data = array(
        'title' => 'Create New User' ,
        'heading' => 'Create New User' ,
        'user_info' => $this->userInfo
      );
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('profile/user_account/create_user_view' , $data);
      $this->load->view('templates/footer');

    }

    public function change_pic(){
      if(array_key_exists('image',$_FILES)){
          $id = $this->input->post('id');
        $u = new User();
        $u->load($id);

        if ($_FILES['image']['error'] == 0) {
          $this->do_upload('image' , 'users');
          $file = $this->upload->data('file_name');
          $u->img_path= 'users/' . $file;
          $u->save();

            /*search the image name*/
            
          if($u->db-> affected_rows() > 0){ 
            echo 1;
          }
          else{
            echo 0;
          }
        }
       
      }
    
    }

    public function setting() {
      if (array_key_exists('old' , $_POST)) {
        $password = trim($this->input->post('new_pass'));
        $username = strtolower($this->userInfo['username']);
        $user = $this->session->userdata('logged_in');
        $u = new User();
        $u->load($user['id']);



        $u->password = crypt(sha1($password) , sha1($username));
        $u->save();
        if ($u->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }

      }
    }

    /*
     * add new user to database
     * */
    public function update_user() {
      if (array_key_exists('id' , $_POST)) {
        $id = trim($this->input->post('id'));
        $u = new User();
        $u->load($id);
        $u->f_name = trim($this->input->post('fname'));
        $u->m_name = trim($this->input->post('midname'));
        $u->l_name = trim($this->input->post('lastname'));
        $u->pos_id = trim($this->input->post('position'));
        $u->save();

        if(array_key_exists('accessibility', $_POST)){

          $access = new User_accessibility_option();
          $user = $this->session->userdata('logged_in');
          $access->db->delete('User_accessibility_option' , array('acc_id' => $id));

          foreach ($this->input->post('accessibility') as $temp) {
              $data[] = array(
                'am_id'=>$temp,
                'acc_id'=>$id
                );
          }
            $this->db->insert_batch('User_accessibility_option' , $data);

        }
       
        if ($u->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }

    }

    public function add_user() {
      if(array_key_exists('fname',$_POST)) {
        $user = new User();
        $user->f_name = ucwords($this->input->post('fname'));
        $user->m_name = ucwords($this->input->post('midname'));
        $user->l_name = ucwords($this->input->post('lastname'));
        $user->username = strtolower($this->input->post('username'));
        $user->password = crypt(sha1($this->input->post('password')) , sha1(strtolower($this->input->post('username'))));
        $user->pos_id = $this->input->post('position');
        $user->img_path = 'default/user.png';
        $user->date_created = date('Y-m-d');
        $user->save();

        $user_id = $user->db->insert_id();

        $access = new User_accessibility_option();
        foreach ($this->input->post('accessibility') as $temp) {
            $data[] = array(
              'am_id'=>$temp,
              'acc_id'=>$user_id
              );
        }

        $this->db->insert_batch('User_accessibility_option' , $data);
        // $access->am_id =  $temp;
        // $access->acc_id = $user_id;
        // $access->save();


        if ($user->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }


    }

    public function logout(){
      $this->load->model('log_history','',TRUE);
      $this->load->model('user','',TRUE);
      $data = $this->session->userdata('logged_in');

      $u = new User();
      $u->load($data['id']);
      $u->status = 0;
      $u->save();
     
     $log = new Log_history();
     $log->login = $data['login'];
     $log->logout =date('F d, Y | h:i:s A');
     $log->acc_id = $data['id'];
     $log->save();

     $this->user->logout();
    }


    /*
     * this does view the user profile
     * */
    public function profile($id = '') {

      $this->load->model('log_history');
      $id = base64_decode($id);

      $log = new log_history();
      $users = new User();

      $access = new User_accessibility_option();
      foreach ($users->get_user($id) as $temp) {
        $user_data = array(
          'image'=>base_url('uploads/'.$temp->img_path),
          'name'=>ucwords($temp->f_name).' '.ucwords($temp->m_name).' '.ucwords($temp->l_name),
          'position'=>ucwords($temp->position),
          'date'=>my_date($temp->date_created),
          'username'=>strtolower($temp->username),
          'id'=>$id
          );
      }


      $data = array(
        'title' => 'User profile' ,
        'user' => $user_data,
        'logs' => $log->get_log_history($id) ,
        'access'=> $access->get_list($id),
        'user_info' => $this->userInfo
      );
      $this->load->view('templates/header' , $data);
      $this->load->view('templates/sidebar' , $data);
      $this->load->view('templates/nav' , $data);
      $this->load->view('profile/user_account/user_profile' , $data);
      $this->load->view('templates/footer');
    }

    public function get_user_by_id() {
      if (array_key_exists('id' , $_POST)) {
        $id = $this->input->post('id');
        $u = new User();
        $result = $u->get_user_by_id($id);
        if (!empty($result)) {
          $data = array();
          foreach ($result as $user) {
            $data[] = array(
              'id' => $user->acc_id ,
              'fname' => $user->f_name ,
              'midname' => $user->m_name ,
              'lastname' => $user->l_name ,
              'pos_id' => $user->pos_id
            );
          }
          echo json_encode($data);
        }

      }
    }

    public function delete_user() {

      $id = $this->input->post('id');
      $user = new User();
      $user->load($id);
      $user->on_delete = date('Y-m-d h:i:s a');
      $user->save();
      if ($user->affected_rows() > 0) {
        echo 1;
      } else {
        echo 0;
      }

    }

    public function update_position(){
       if (array_key_exists('pk', $_POST)) {
          
          $t = new Position();

          $id = trim($this->input->post('pk'));
          $value = trim($this->input->post('value'));
       
          $t->load($id);
          $t->position =  $value;
          $t->save();


        if ($t->db->affected_rows() > 0) {
            echo 1;
        }
        else{
          echo 0;
        }



      }
    }


    public function get_position(){
      $type = new Position();

      $data = array();

      if(!empty($type->get())){
        foreach ($type->get() as $type) {
          $data[] = array(
            'id' => $type->pos_id ,
            'position' =>'<a href="#" class="value" data-type="text" data-pk="'.$type->pos_id.'" >'.ucwords($type->position).'</a>'
          );
        }

      }    
      echo json_encode(array('data'=>$data));
    }

    public function get_position_type() {
      //redirect('product');
      $type = new Position();
      $d = array();
      foreach ($type->get() as $type) {
        $d[] = array(
          'id' => $type->pos_id ,
          'type' => ucwords($type->position)
        );
      }

      echo json_encode($d);
    }

    public function add_position() {
      $position = new Position();

      if (array_key_exists('position' , $_POST)) {
        $position->position = ucwords(trim($this->input->post('position')));
        $position->save();
        if ($position->db->affected_rows() > 0) {
          echo 1;
        } else {
          echo 0;
        }
      }
    }


    /*this will check the username if already taken*/
    public function password_check() {
      if (array_key_exists('old' , $_POST)) {
        $username = strtolower($this->userInfo['username']);
        $password = $this->input->post('old');
        $u = new User();
        $valid = FALSE;
        $data = array();
        $hash_password = crypt(sha1($password) , sha1($username));
        foreach ($u->get_password($hash_password , $username) as $user) {
          if (!empty($user)) {
            $valid = TRUE;

          }
        }
        echo json_encode(array('valid' => $valid));
      }

    }

    public function is_position_exist() {
      $u = new Position();
      $valid = TRUE;
   
      foreach ($u->get() as $temp) {
          if(strtolower($temp->position) == strtolower($this->input->post('position'))){
            $valid = FALSE;
          break;
          }
      }
      echo json_encode(array('valid' => $valid));
    }


    public function is_username_exist() {
      $u = new User();
      $valid = TRUE;
      $username = array();
      foreach ($u->lists() as $user) {
        array_push($username , $user->username);
      }
      if (isset($_POST['username']) && in_array(strtolower($_POST['username']) , $username)) {
        $valid = FALSE;
      }
      echo json_encode(array('valid' => $valid));
    }


  }