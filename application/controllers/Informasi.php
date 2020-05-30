<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
	}

	public function index() {

	$this->load->view('informasi');
	}

}

/* End of file informasi.php */
/* Location: ./application/controllers/informasi.php */