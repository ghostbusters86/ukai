<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profil extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
	}

	public function index(){
	$this->load->view('edit_profil');
	}

}

/* End of file edit_profil.php */
/* Location: ./application/controllers/edit_profil.php */