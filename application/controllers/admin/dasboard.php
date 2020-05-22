<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //$this->load->model('M_dasbor');
  }

  function index() {
    $data = array(
      'title' => 'Dasboard Admin UKAI',
      'isi' => 'admin/dasboard'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

}

/* End of file dasboard.php */
/* Location: ./application/controllers/admin/dasboard.php */