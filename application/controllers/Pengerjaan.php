<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengerjaan extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
	}

	public function index() {
	$this->load->view('pengerjaan');
	}

}

/* End of file Pengerjaan.php */
/* Location: ./application/controllers/Pengerjaan.php */