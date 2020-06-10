<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{      
		$this->load->view('welcome_message');
	}
	public function send_email($register_id,$register_email)
	{
		$data['id_registar'] = $register_id;
		$this->load->view('email/email_register', $data);
		$subject 	= "Pendaftaran Akun Teman Ukai";
		$message	= $this->load->view('email/email_register',$data,true);
		$config 	= array(
			'protocol'  	=> 'smtp',
			'smtp_host' 	=> 'ssl://mail.temanukai.com',
			'smtp_port' 	=> '465',
			'smtp_user'  	=> 'info@temanukai.com',
			'smtp_pass'  	=> '@temanukai123',
			'mailtype'  	=> 'html',
			'charset'    	=> 'utf-8',
			'wordwrap'   	=> TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('info@temanukai.com','Teman Ukai');
		$this->email->to($register_email);
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send()){
			
		} else {
			# code...
			echo $this->email->print_debugger();
			exit();  
		}
	}
}
