<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
		$this->load->model('M_user');
		$this->load->model('M_soal');
        $this->load->model('M_paket_reguler');
        $this->load->model('M_paket_booster');
	}

	public function soal($slug) {
		$get_user = $this->M_user->get_user($this->session->userdata('id_user'));
		$paket_r  = $this->M_paket_reguler->detail($slug); 
		// $soal  = $this->M_soal->detail(); 
		$paket_b  = $this->M_paket_booster->detail($slug); 
		echo "<pre>";
		print_r($paket_b);
		exit();

		$data = array(	'paket_r' => $paket_r, 
						'paket_b' => $paket_b,
						'soal' => $soal,
						'get_user' => $get_user
					);

		$this->load->view('informasi',$data);
	}

}

/* End of file informasi.php */
/* Location: ./application/controllers/informasi.php */