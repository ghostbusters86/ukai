<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
		$this->load->model('M_paket_reguler');
		$this->load->model('M_paket_booster');
		$this->load->model('M_bab_booster');
		$this->load->model('M_jawab_soal');
		$this->load->helper('string');
	}

	public function index() {    

		$paket_reguler = $this->M_paket_reguler->select_published();
		$paket_booster = $this->M_paket_booster->select_published();
		// echo "<pre>";
		// print_r($pengguna_reguler);
		// print_r($sudah_reguler);
		// exit();
		// $no_paket = 0;
		// foreach ($paket_booster as $paket_booster){
		// 	$paket [$no_paket] ['nama_booster'] = $paket_booster->nama_booster;
		// 	$paket [$no_paket] ['harga_booster'] = $paket_booster->harga_booster;
		// 	$paket [$no_paket] ['slug'] = $paket_booster->slug;
		// 	$bab_booster = $this->M_bab_booster->select_bab_booster($paket_booster->id_booster);

		// 	$no = 0;
		// 	foreach ($bab_booster as $bab_booster)	{
		// 		$paket [$no_paket] ['bab'] [$no] ['nama_bab']=$bab_booster->nama_bab_booster;

		// 		$no++;
		// 	}

		// 	$paket [$no_paket] ['jumlah'] = $no;
		// 	$no_paket++;
		// }


		$data = array(  
			'title'	=> 'Paket Soal',
			'metades' => 'Paket Soal',
			'isi' => 'paket',
			'paket_reguler' => $paket_reguler,
			// 'bab_booster' => $bab_booster,
			// 'no_paket' => $no_paket,
			// 'paket' => $paket,
			'paket_booster' => $paket_booster
		);    
	// echo '<pre>';
	// for ($i=0; $i < $no_paket ; $i++) { 
	// 	echo $paket[$i]['nama_booster']."<br>";
	// 	for ($j=0; $j < $paket[$i]['jumlah'] ; $j++) { 
	// 		echo "<li>".$paket[$i]['bab'][$j]['nama_bab']."</li>";
	// 	}
	// 	echo $paket[$i]['harga_booster']."<br><ul>";
	// 	echo "</ul>";
	// }
	// exit();
		$this->load->view('layout/wrapper', $data, false);
	}
	public function pengguna() {    

		// $paket_pengguna = $this->M_paket_reguler->select_paket_pengguna();
		$sudah_reguler = $this->M_paket_reguler->dikerjakan_pengguna_reguler();
		$sudah_booster = $this->M_paket_reguler->dikerjakan_pengguna_booster();
		$pengguna_reguler = $this->M_paket_reguler->select_pengguna_reguler();
		$pengguna_booster = $this->M_paket_reguler->select_pengguna_booster();


		$data = array(  
			'title'	=> 'Paket Soal',
			'metades' => 'Paket Soal',
			'isi' => 'v_paket_pengguna',
			'sudah_booster' => $sudah_booster,
			'sudah_reguler' => $sudah_reguler,
			'pengguna_booster' => $pengguna_booster,
			'pengguna_reguler' => $pengguna_reguler
		);    
	// echo '<pre>';
	// for ($i=0; $i < $no_paket ; $i++) { 
	// 	echo $paket[$i]['nama_booster']."<br>";
	// 	for ($j=0; $j < $paket[$i]['jumlah'] ; $j++) { 
	// 		echo "<li>".$paket[$i]['bab'][$j]['nama_bab']."</li>";
	// 	}
	// 	echo $paket[$i]['harga_booster']."<br><ul>";
	// 	echo "</ul>";
	// }
	// exit();
		$this->load->view('layout/wrapper', $data, false);
	}
	public function reguler($kode_paket)
	{
		$paket_user = $this->M_jawab_soal->detail_reguler($kode_paket);
		$user = $this->M_jawab_soal->get_user();
		$id  = random_string('alnum',6);
		$data = array(  
			'title'	=> 'Paket Soal',
			'metades' => 'Paket Soal',
			'isi' => 'informasi',
			'detail' => $paket_user,
			'user' => $user,
			'id' => $id,
		);
		$this->load->view('layout/wrapper', $data, false);
	}
	public function booster($kode_paket)
	{
		$paket_user = $this->M_jawab_soal->detail_booster($kode_paket);
		$bab_booster = $this->M_jawab_soal->bab_booster($paket_user->id_booster);
		$user = $this->M_jawab_soal->get_user();
		$id  = random_string('alnum',6);
		$data = array(  
			'title'	=> 'Paket Soal',
			'metades' => 'Paket Soal',
			'isi' => 'v_d_booster',
			'detail' => $paket_user,
			'bab_booster' => $bab_booster,
			'user' => $user,
			'id' => $id,
		);
		// echo "<pre>";
		// print_r($data);
		// exit();
		$this->load->view('layout/wrapper', $data, false);
	}
	public function bab_booster($kode_paket)
	{
		$paket_user = $this->M_jawab_soal->detail_bab_booster($kode_paket);
		$user = $this->M_jawab_soal->get_user();
		$id  = random_string('alnum',6);
		$data = array(  
			'title'	=> 'Paket Soal',
			'metades' => 'Paket Soal',
			'isi' => 'v_informasi_booster',
			'detail' => $paket_user,
			'user' => $user,
			'id' => $id,
		);
		$this->load->view('layout/wrapper', $data, false);
	}

}

/* End of file paket.php */
/* Location: ./application/controllers/paket.php */  