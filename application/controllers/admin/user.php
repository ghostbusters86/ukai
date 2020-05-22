<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
  }

  function index() {  
    $user = $this->M_user->select_user();
    $data = array(
      'title' => 'Dasboard Admin UKAI',
      'user'  => $user,
      'isi' => 'admin/user/user_V'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

  function add() {  
      $data = array(
      'title' => 'Dasboard Admin UKAI',
      'isi' => 'admin/user/user_T'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

  function edit() {  
      $data = array(
      'title' => 'Dasboard Admin UKAI',
      'isi' => 'admin/user/user_E'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }


}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */