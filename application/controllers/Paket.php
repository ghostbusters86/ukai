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
	}
    
	public function index() {    

	$paket_reguler = $this->M_paket_reguler->select_paket_reguler();
	$paket_booster = $this->M_paket_booster->select_paket_booster();

	$no_paket = 0;
	foreach ($paket_booster as $paket_booster){
		$paket [$no_paket] ['nama_booster'] = $paket_booster->nama_booster;
		$paket [$no_paket] ['harga_booster'] = $paket_booster->harga_booster;
		$bab_booster = $this->M_bab_booster->select_bab_booster($paket_booster->id_booster);

		$no = 0;
		foreach ($bab_booster as $bab_booster)	{
			$paket [$no_paket] ['bab'] [$no] ['nama_bab']=$bab_booster->nama_bab_booster;

		$no++;
		}

		$paket [$no_paket] ['jumlah'] = $no;
		$no_paket++;
	}
	
	
	$data = array(  
			'title'	=> 'Paket Soal',
			'metades' => 'Paket Soal',
			'paket_reguler' => $paket_reguler,
			'bab_booster' => $bab_booster,
			'paket_booster' => $paket_booster
			);    
	echo '<pre>';
	for ($i=0; $i < $no_paket ; $i++) { 
		echo $paket[$i]['nama_booster']."<br>";
		echo $paket[$i]['harga_booster']."<br><ul>";
		for ($j=0; $j < $paket[$i]['jumlah'] ; $j++) { 
			echo "<li>".$paket[$i]['bab'][$j]['nama_bab']."</li>";
		}
		echo "</ul>";
	}
	exit();
		$this->load->view('paket', $data, false);
	}

}

/* End of file paket.php */
/* Location: ./application/controllers/paket.php */  