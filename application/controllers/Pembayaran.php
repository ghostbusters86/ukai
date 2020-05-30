<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
	}

	public function index()
	{
		$this->load->view('pembayaran');
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/admin/Pembayaran.php */