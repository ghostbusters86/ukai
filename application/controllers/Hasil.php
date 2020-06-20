<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
		$this->load->model('M_jawab_soal');
	}

	public function index() {
	$this->load->view('hasil');
	}
	public function soal($kode_mulai)
	{
		$get_paket = $this->M_jawab_soal->get_paket($kode_mulai);
		$sudah = $this->M_jawab_soal->count_sudah($kode_mulai);
		$belum = $this->M_jawab_soal->count_belum($kode_mulai);
		$ragu = $this->M_jawab_soal->count_ragu($kode_mulai);
		$jawaban = $this->M_jawab_soal->count_jawaban($kode_mulai);
		$benar=0;
		foreach ($jawaban as $key => $value) {
			if ($value->jawab==$value->kunci) {
				$benar++;
			}
		}
		$penyelesaian['sudah'] = $sudah;
		$penyelesaian['belum'] = $belum;
		$penyelesaian['ragu'] = $ragu;
		$penyelesaian['total'] = $sudah+$belum+$ragu;
		$penyelesaian['benar'] = $get_paket->benar;
		$penyelesaian['salah'] = $get_paket->salah;
		$penyelesaian['score'] = $get_paket->score;
		$indikator = $this->M_jawab_soal->get_indikator($kode_mulai);
		if ($this->uri->segment(4)==null||$this->uri->segment(4)<=0||$this->uri->segment(4)>$penyelesaian['total']) {
			redirect('hasil/soal/'.$kode_mulai.'/1');
		} 
		$soal = $this->M_jawab_soal->pembahasan1($indikator[$this->uri->segment(4)-1]->id_soal);
		$soal->jawaban = $indikator[$this->uri->segment(4)-1]->jawaban;
		$data = array(  
			'title'	=> 'Paket Soal',
			'metades' => 'Paket Soal',
			'isi' => 'hasil',
			'detail' => $get_paket,
			'indikator' => $indikator,
			'soal' => $soal,
			'penyelesaian' => $penyelesaian,
		);
		// echo "<pre>";
		// print_r($data);
		// exit();
		$this->load->view('layout/wrapper',$data,false);
	}
	public function soal_booster($kode_mulai)
	{
		$get_paket = $this->M_jawab_soal->get_paket_booster($kode_mulai);
		// $get_paket->berakhir = date($get_paket->berakhir,strtotime('+24 hours'));
		$sudah = $this->M_jawab_soal->count_sudah($kode_mulai);
		$belum = $this->M_jawab_soal->count_belum($kode_mulai);
		$ragu = $this->M_jawab_soal->count_ragu($kode_mulai);
		$penyelesaian['sudah'] = $sudah;
		$penyelesaian['belum'] = $belum;
		$penyelesaian['ragu'] = $ragu;
		$penyelesaian['total'] = $sudah+$belum+$ragu;
		$penyelesaian['benar'] = $get_paket->benar;
		$penyelesaian['salah'] = $get_paket->salah;
		$penyelesaian['score'] = $get_paket->score;
		$indikator = $this->M_jawab_soal->get_indikator($kode_mulai);
		if ($this->uri->segment(4)==null||$this->uri->segment(4)<=0||$this->uri->segment(4)>$penyelesaian['total']) {
			redirect('hasil/soal_booster/'.$kode_mulai.'/1');
		} 
		$soal = $this->M_jawab_soal->pembahasan1($indikator[$this->uri->segment(4)-1]->id_soal);
		$soal->jawaban = $indikator[$this->uri->segment(4)-1]->jawaban;
		$data = array(  
			'title'	=> 'Paket Soal',
			'metades' => 'Paket Soal',
			'isi' => 'v_hasil_booster',
			'detail' => $get_paket,
			'indikator' => $indikator,
			'soal' => $soal,
			'penyelesaian' => $penyelesaian,
		);
		// echo "<pre>";
		// print_r($data);
		// exit();
		$this->load->view('layout/wrapper',$data,false);
	}
	public function get_soal()
	{

		if (isset($_POST) && $_POST != array()) {
			$data = $this->M_jawab_soal->get_pembahasan($_POST['id']);
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

/* End of file Hasil.php */
/* Location: ./application/controllers/Hasil.php */