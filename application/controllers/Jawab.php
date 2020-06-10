<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawab extends CI_Controller {

	public function __construct() {   
		parent::__construct();
	    $this->load->model('M_jawab_soal');
	}

	public function ambil($kode_mulai)
	{
		$paket_user = $this->M_jawab_soal->detail_reguler($this->uri->segment(4));
		$user = $this->M_jawab_soal->get_user();
		$data = array(  
			'kode_soal'	=> $paket_user->kode_soal,
			'kode_mulai' => $kode_mulai,
			'id_user' => $this->session->userdata('id_user'),
			'mulai' => date("Y-m-d H:i:s"),
			'berakhir' => date('Y-m-d H:i:s',strtotime('+'.$paket_user->time_reguler.'minutes')),
		);
		$id_ambil_soal = $this->M_jawab_soal->ambil_soal($data);
		$jawaban = $this->M_jawab_soal->set_jawaban($paket_user->kode_soal);
		$no=0;
		foreach ($jawaban as $key => $value) {
			$set_jawaban[$no]['id_soal'] = $value->id_soal;
			$set_jawaban[$no]['kode_mulai'] = $kode_mulai;
			$set_jawaban[$no]['id_ambil_soal'] = $id_ambil_soal;
			$set_jawaban[$no]['status_answer'] = '0';
		$this->M_jawab_soal->insert_jawaban($set_jawaban[$no]);
		$no++;
		}
		// echo "<pre>";
		// print_r($set_jawaban);
		// exit();
		redirect(site_url('jawab/soal/'.$kode_mulai), 'refresh');
	}
	public function soal($kode_mulai)
	{
		$get_paket = $this->M_jawab_soal->get_paket($kode_mulai);
		$indikator = $this->M_jawab_soal->get_indikator($kode_mulai);
		$soal = $this->M_jawab_soal->soal_1($indikator['0']->id_soal);
		$data = array(  
			'title'	=> 'Paket Soal',
			'metades' => 'Paket Soal',
			'isi' => 'pengerjaan',
			'detail' => $get_paket,
			'indikator' => $indikator,
			'soal' => $soal,
		);
		// echo "<pre>";
		// print_r($data);
		// exit();
		$this->load->view('layout/wrapper',$data,false);
	}
	public function get_soal()
    {
        
        if (isset($_POST) && $_POST != array()) {
            $data = $this->M_jawab_soal->get_soal($_POST['id']);
            $num_rows = $this->M_jawab_soal->num_rows($_POST['id']);
            
            if ($num_rows > 0) {
                echo json_encode($data);
            } else {
                echo "";
            }
        } else {
            show_404();
        }
	}

	
}
