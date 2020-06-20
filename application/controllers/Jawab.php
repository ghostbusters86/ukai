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
		// echo "<pre>";
		// print_r($set_jawaban);
		// exit();

		$data = array(  
			'kode_soal'	=> $paket_user->kode_soal,
			'kode_paket'	=> $paket_user->kode_paket,
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
		redirect(site_url('jawab/soal/'.$kode_mulai), 'refresh');
	}
	public function ambil_booster($kode_mulai)
	{
		$paket_user = $this->M_jawab_soal->detail_bab_booster($this->uri->segment(4));
		$user = $this->M_jawab_soal->get_user();
		// echo "<pre>";
		// print_r($paket_user);
		// exit();

		$data = array(  
			'kode_soal'	=> $paket_user->kode_soal,
			'kode_paket'	=> $paket_user->kode_paket,
			'kode_mulai' => $kode_mulai,
			'id_user' => $this->session->userdata('id_user'),
			'mulai' => date("Y-m-d H:i:s"),
			'berakhir' => date('Y-m-d H:i:s',strtotime('+'.$paket_user->time_bab_booster.'minutes')),
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
		redirect(site_url('jawab/soal_booster/'.$kode_mulai), 'refresh');
	}
	public function soal($kode_mulai)
	{
		if (isset($_POST['jawaban'])) {
			$i  = $this->input;
			$jawab = array(
				'id_soal'=>  $i->post('id_soal'),
				'jawaban'=>  $i->post('jawaban'),
				'kode_mulai'=>  $i->post('kode_mulai'),
				'status_answer'=>  '1',
			);

			if (isset($_POST['status_answer'])) {
				$jawab['status_answer'] = $i->post('status_answer');
			}
		$this->M_jawab_soal->update_jawab($jawab);
			
		} 
		$get_paket = $this->M_jawab_soal->get_paket($kode_mulai);
		$indikator = $this->M_jawab_soal->get_indikator($kode_mulai);
		$sudah = $this->M_jawab_soal->count_sudah($kode_mulai);
		$belum = $this->M_jawab_soal->count_belum($kode_mulai);
		$ragu = $this->M_jawab_soal->count_ragu($kode_mulai);
		$penyelesaian['sudah'] = $sudah;
		$penyelesaian['belum'] = $belum;
		$penyelesaian['ragu'] = $ragu;
		$penyelesaian['total'] = $sudah+$belum+$ragu;
		if ($this->uri->segment(4)<=0||$this->uri->segment(4)>$penyelesaian['total']) {
			redirect('jawab/soal/'.$kode_mulai.'/1');
		} 
		$no=1;
		foreach ($indikator as $key => $value) {
			$list_soal[$no]['id_soal'] = $value->id_soal;
			$list_soal[$no]['jawaban'] = $value->jawaban;
			$list_soal[$no]['status_answer'] = $value->status_answer;
			$list_soal[$no]['no_soal'] = $no;
			$no++;
		}
		$soal = $this->M_jawab_soal->soal_1($list_soal[$this->uri->segment(4)]['id_soal']);
			$data = array(  
				'title'	=> 'Paket Soal',
				'metades' => 'Paket Soal',
				'isi' => 'v_pengerjaan',
				'detail' => $get_paket,
				'list_soal' => $list_soal,
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
		if (isset($_POST['jawaban'])) {
			$i  = $this->input;
			$jawab = array(
				'id_soal'=>  $i->post('id_soal'),
				'jawaban'=>  $i->post('jawaban'),
				'kode_mulai'=>  $i->post('kode_mulai'),
				'status_answer'=>  '1',
			);

			if (isset($_POST['status_answer'])) {
				$jawab['status_answer'] = $i->post('status_answer');
			}
		$this->M_jawab_soal->update_jawab($jawab);
			
		} 
		$get_paket = $this->M_jawab_soal->get_paket_booster($kode_mulai);
		$indikator = $this->M_jawab_soal->get_indikator($kode_mulai);
		$sudah = $this->M_jawab_soal->count_sudah($kode_mulai);
		$belum = $this->M_jawab_soal->count_belum($kode_mulai);
		$ragu = $this->M_jawab_soal->count_ragu($kode_mulai);
		$penyelesaian['sudah'] = $sudah;
		$penyelesaian['belum'] = $belum;
		$penyelesaian['ragu'] = $ragu;
		$penyelesaian['total'] = $sudah+$belum+$ragu;
		if ($this->uri->segment(4)<=0||$this->uri->segment(4)>$penyelesaian['total']) {
			redirect('jawab/soal_booster/'.$kode_mulai.'/1');
		} 
		$no=1;
		foreach ($indikator as $key => $value) {
			$list_soal[$no]['id_soal'] = $value->id_soal;
			$list_soal[$no]['jawaban'] = $value->jawaban;
			$list_soal[$no]['status_answer'] = $value->status_answer;
			$list_soal[$no]['no_soal'] = $no;
			$no++;
		}
		$soal = $this->M_jawab_soal->soal_1($list_soal[$this->uri->segment(4)]['id_soal']);
			$data = array(  
				'title'	=> 'Paket Soal',
				'metades' => 'Paket Soal',
				'isi' => 'v_pengerjaan_booster',
				'detail' => $get_paket,
				'list_soal' => $list_soal,
				'soal' => $soal,
				'penyelesaian' => $penyelesaian,
			);
			// echo "<pre>";
			// print_r($data);
			// exit();
			$this->load->view('layout/wrapper',$data,false);
		
	}
	public function selesai_reguler($kode_mulai)
	{
		$jawaban = $this->M_jawab_soal->count_jawaban($kode_mulai);
		$benar=0;
		$total=0;
		foreach ($jawaban as $key => $value) {
			if ($value->jawab==$value->kunci) {
				$benar++;
			}
			$total++;
		}
		$data = array(
			'kode_mulai' => $kode_mulai, 
			'benar' => $benar, 
			'salah' => $total-$benar, 
			'score' => ($benar/$total)*100, 
		);
		$this->M_jawab_soal->update_score($data);
		redirect(site_url('hasil/soal/'.$kode_mulai), 'refresh');
	}
	public function selesai_booster($kode_mulai)
	{
		$jawaban = $this->M_jawab_soal->count_jawaban($kode_mulai);
		$benar=0;
		$total=0;
		foreach ($jawaban as $key => $value) {
			if ($value->jawab==$value->kunci) {
				$benar++;
			}
			$total++;
		}
		$data = array(
			'kode_mulai' => $kode_mulai, 
			'benar' => $benar, 
			'salah' => $total-$benar, 
			'score' => ($benar/$total)*100, 
		);
		$this->M_jawab_soal->update_score($data);
		redirect(site_url('hasil/soal_booster/'.$kode_mulai), 'refresh');
	}
	public function soal_ajax($kode_mulai)
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
