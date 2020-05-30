<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

		public function __construct() {   
	    parent::__construct();
	    if ($this->session->userdata('akses_level') != 'user') {
	    	redirect('home');
	    }
		}

	public function index() {
		$this->load->view("profil");
	}

}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */