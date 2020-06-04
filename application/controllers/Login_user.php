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
  	
		$email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->db->select('*');
        $this->db->from('user'); 
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get();  
        $result = $query->result_array(); 

		if ($this->form_validation->run() === FALSE) { 
            redirect('home');
        } else {
            $login_user   = $this->M_user->login_user();  

            if ($login_user) {    
                $this->session->set_userdata('online',true);
                $get_user = $this->M_user->get_login();
                $row_user = $get_user->row();

                $session_user = array( 'hak'          => 'user',
                                       'id_user' 	  => $query-> row('id_user'),
                                       'nama_lengkap' => $query->row('nama_lengkap'));

                $this->session->set_userdata($session_user);
                redirect('paket');
                }else{
                    $this->session->set_userdata('online',false); }
                    
            if (!$login_user) {
              $this->session->set_flashdata('pesan', 'Email atau Password Anda Salah...!');
              redirect('home');
            }
        }
         

    } 

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }
	

}

/* End of file Login_user.php */
/* Location: ./application/controllers/admin/Login_user.php */