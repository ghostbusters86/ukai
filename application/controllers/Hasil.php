<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
	}

	public function index() {
	$this->load->view('hasil');
	}

}

/* End of file Hasil.php */
/* Location: ./application/controllers/Hasil.php */