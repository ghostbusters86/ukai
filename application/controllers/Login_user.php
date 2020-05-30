<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {
		//Load Database
	public function __construct() {
		parent::__construct();  
        $this->load->library('form_validation');
		$this->load->model('M_user'); 
	}

	public function index()
	{

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

                //cek validasi
		if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
			$email = $this->input->post("email", TRUE);
			$password = MD5($this->input->post('password', TRUE));

                //checking data via model
			$checking = $this->M_user->check_login('user', array('email' => $email), array('password' => $password));

                //jika ditemukan, maka create session
			if ($checking != FALSE) {
				 $this->session->set_userdata('online',true);
				foreach ($checking as $apps) {

					$session_data = array(
						'id_user_'   => $apps->id_user,
						'email' => $apps->email,
						'password' => $apps->password,
						'nama_user' => $apps->nama_user,
						'akses_level'      => $apps->akses_level
					);
                        //set session userdata
					$this->session->set_userdata($session_data,'online',true);

                        //redirect berdasarkan level user
					if($this->session->userdata("akses_level") == "user"){
						redirect('paket');
					}else{
						$this->session->set_userdata('online',false);
						$this->session->set_flashdata('pesan', 'Akses di Tolak...!');
						redirect('home');
					}

				}
			}else{
				$this->session->set_flashdata('pesan', 'Email atau Password Anda Salah...!');
				redirect('home');
			}

		}else{

			redirect('home');
		}
    } 

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }
	

}

/* End of file Login_user.php */
/* Location: ./application/controllers/admin/Login_user.php */