<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {   
		parent::__construct();
	    //$this->load->model('M_dasbor');
	}

	public function index() {
		$data = array(
			'title' => 'Home Teman Ukai UKAI',
			'metades' => 'Platform Penyedia Layanan Latihan Soal UKAI Berbasis Teknologi Akses belajar asik dan santai dengan program kelas online untukmempersiapkan UKAI bagi calon Apoteker baru Indonesia.',
			'isi' 	=> 'index'
		);
		$this->load->view("layout/wrapper", $data, false);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */  