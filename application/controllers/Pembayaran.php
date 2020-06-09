<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}		
        $this->load->model('M_transaksi');
        $this->load->model('M_user');
        $this->load->model('M_paket_reguler');
        $this->load->model('M_paket_booster');
    	$this->load->helper('text');

	}  
  
	public function paket_reg($slug) {
		$get_user = $this->M_user->get_user($this->session->userdata('id_user'));
		$paket_r  = $this->M_paket_reguler->get_frontend($slug); 
		$invoice = $this->M_transaksi->get_no_inv();

		$valid = $this->form_validation;
		$valid->set_rules(  
			'id_user',
			'id_user',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Nama.') 
		);
    
		$valid->set_rules(
			'an_rekening',
			'an_rekening',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Nama Pembayar.') 
		);

		$valid->set_rules(
			'kode_transaksi',
			'kode_transaksi',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Kode Transaksi.')
		);
		$valid->set_rules(
			'nominal_transfer',
			'nominal_transfer',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Nominal Transfer.')
		);
		$valid->set_rules(
			'kode_paket',
			'kode_paket',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Kode Paket.')
		);
		// $valid->set_rules(
		// 	'bukti_transfer',
		// 	'bukti_transfer',
		// 	'required',
		// 	array(
		// 		'required'  =>  'Anda belum mengisikan Bukti Transfer.')
		// );
		$valid->set_rules(
			'kode_bank',
			'kode_bank',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Kode Bank.')
		);
  
		$config['upload_path']          = './img/img_transaksi/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$config['encrypt_name']         = TRUE;

		$this->load->library('upload', $config);
		$i  = $this->input;
		if ($valid->run()===false) {
		$data 	= array('invoice' => $invoice,
						'paket_r' => $paket_r,
						'get_user' => $get_user,
						'title' => 'Pembayaran',
						'metades' => 'Pembayaran'
						);
		$this->load->view("pembayaran_reg", $data);
		} else {
			if ( ! $this->upload->do_upload('bukti_transfer'))
			{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
        $i  = $this->input;
        $data = array(
          'id_user'         =>  $get_user['id_user'],
          'kode_transaksi'  =>  $i->post('kode_transaksi'),
          'kode_bank'       =>  $i->post('kode_bank'),
          'an_rekening'     =>  $i->post('an_rekening'),
          'kode_paket'      =>  $i->post('kode_paket'),
          'tanggal'      =>  $i->post('tanggal'),
          'status_transaksi'=>  $i->post('status_transaksi'),
          'bukti_transfer'	=>  $this->upload->data('file_name'),
          'nominal_transfer'  =>  $i->post('nominal_transfer'));

        $this->M_transaksi->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil mengeirim Transaksi <strong> Data akan segera di Proses </strong></center>');
        redirect('/paket/');
      }
	}
}

	public function paket_bs($slug) {
		$get_user = $this->M_user->get_user($this->session->userdata('id_user'));
		$paket_b  = $this->M_paket_booster->detail($slug); 
		$invoice = $this->M_transaksi->get_no_inv();
		
		$valid = $this->form_validation;
		$valid->set_rules(  
			'id_user',
			'id_user',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Nama.') 
		);

		$valid->set_rules(
			'an_rekening',
			'an_rekening',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Nama Pembayar.') 
		);

		$valid->set_rules(
			'kode_transaksi',
			'kode_transaksi',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Kode Transaksi.')
		);
		$valid->set_rules(
			'nominal_transfer',
			'nominal_transfer',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Nominal Transfer.')
		);
		$valid->set_rules(
			'kode_paket',
			'kode_paket',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Kode Paket.')
		);
		$valid->set_rules(
			'kode_bank',
			'kode_bank',
			'required',
			array(
				'required'  =>  'Anda belum mengisikan Kode Bank.')
		);
  
		$config['upload_path']          = './img/img_transaksi/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$config['encrypt_name']         = TRUE;
  
		$this->load->library('upload', $config);
		$i  = $this->input;
		if ($valid->run()===false) {
		$data 	= array('invoice' => $invoice,
						'paket_b' => $paket_b,
						'get_user' => $get_user,
						'title' => 'Pembayaran',
						'metades' => 'Pembayaran'
						);
		$this->load->view("pembayaran_bs", $data);
		} else {   
			if ( ! $this->upload->do_upload('bukti_transfer'))
			{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
        $i  = $this->input;
        $data = array(
          'id_user'         =>  $get_user['id_user'],
          'kode_transaksi'  =>  $i->post('kode_transaksi'),
          'kode_bank'       =>  $i->post('kode_bank'),
          'an_rekening'     =>  $i->post('an_rekening'),
          'kode_paket'      =>  $i->post('kode_paket'),
          'tanggal'      =>  $i->post('tanggal'),
          'status_transaksi'=>  $i->post('status_transaksi'),
          'bukti_transfer'	=>  $this->upload->data('file_name'),
          'nominal_transfer'  =>  $i->post('nominal_transfer'));

        $this->M_transaksi->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil mengeirim Transaksi <strong> Data akan segera di Proses </strong></center>');
        redirect('/paket/');
      }
	}
}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/admin/Pembayaran.php */         