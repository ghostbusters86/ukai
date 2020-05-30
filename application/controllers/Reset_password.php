<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}
	}

	public function index()
	{
		$this->load->view('reset_password');
	}

	public function send_mail() {   

		$from_email = "yudafadilah248@gmail.com"; 
		$to_email = $this->input->post('email'); 

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => $from_email,
			'smtp_pass' => 'fadilah12345',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");   

		$this->email->from($from_email, 'KP-MAK Universitas Gadjah Mada'); 
		$this->email->to($to_email);
		$this->email->subject('Pusat KPMAK'); 
		$this->email->message('Pendaftaran Seminar telah berhasil.'); 

         //Send mail 
		if($this->email->send()){
			$this->session->set_flashdata("sukses","Email berhasil terkirim."); 
			redirect(base_url('admin/bukti'));
		}else {
			$this->session->set_flashdata("sukses","Email gagal dikirim."); 
			redirect(base_url('admin/bukti'));
		} 
	}



}

/* End of file reset_password.php */
/* Location: ./application/controllers/admin/reset_password.php */