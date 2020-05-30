<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
	}

	public function index()
	{
		$this->load->view('paket.php');
	}

}

/* End of file paket.php */
/* Location: ./application/controllers/paket.php */