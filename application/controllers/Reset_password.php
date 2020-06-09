<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		$this->load->model('M_user');
	}
  
     public function index()  
     {  
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
         
         if($this->form_validation->run() == FALSE) {  
             $data['title'] = 'Reset Password';  
             $data['metades'] = 'Reset Password';  
             $this->load->view('reset_password',$data);  
         }else{  
             $email = $this->input->post('email');   
             $clean = $this->security->xss_clean($email);  
             $userInfo = $this->M_user->getUserInfoByEmail($clean);  
               
             if(!$userInfo){  
               $this->session->set_flashdata('sukses', '<center>email address salah, <strong> silakan coba lagi.</strong></center');  
               redirect(site_url('reset_password'),'refresh');   
             }    
               
             //build token 
             if($this->form_validation->run()){

             		$this->load->library('email');
             		$config = array();
             		$config['charset'] = 'utf-8';
             		$config['useragent'] = 'Codeigniter';
             		$config['protocol']= "smtp";
             		$config['mailtype']= "html";
			        $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
			        $config['smtp_port']= "465";
			        $config['smtp_timeout']= "5";
			        $config['smtp_user']= "yudafadilah248@gmail.com"; // isi dengan email kamu
			        $config['smtp_pass']= "fadilah12345"; // isi dengan password kamu
			        $config['crlf']="\r\n";       
			        $config['newline']="\r\n"; 
			        $config['wordwrap'] = TRUE;
			        //memanggil library email dan set konfigurasi untuk pengiriman email

			        $this->email->initialize($config);
			        //konfigurasi pengiriman
			        $this->email->from($config['smtp_user']);
			        $this->email->to($this->input->post('email'));
			        $this->email->subject("Reset Password User temanukai.com");

			        $token = $this->M_user->insertToken($userInfo->id_user);              
			        $qstring = $this->base64url_encode($token);  
			        $url =  "<p>Anda melakukan permintaan reset password</p>";       
			        $url .="<a href='".site_url('reset_password/new_password/token/'.$qstring)."'>Klik Reset Password</a>" ;  
			        $this->email->message($url);
			        
			        if($this->email->send())
			        {
			        	$this->session->set_flashdata('sukses', "silahkan cek email <b>".$this->input->post('email').'</b> untuk melakukan reset password');  
			        	redirect(site_url('home'),'refresh');   
			        }
			        
			        echo "<br><br><a href='".site_url("member-login")."'>Kembali ke Menu Login</a>";

			    }else {
				$this->load->view('reset_password');
			}                       
           
         }  
         
     }  
   
     public function new_password()  
     {  
       $token = $this->base64url_decode($this->uri->segment(4));           
       $cleanToken = $this->security->xss_clean($token);  
         
       $user_info = $this->M_user->isTokenValid($cleanToken); //either false or array();          
         
       if(!$user_info){  
         $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');  
         redirect(site_url('reset_password'),'refresh');   
       }    
   
       $data = array(  
         'title'=> 'Halaman Reset Password',  
         'nama_lengkap'=> $user_info->nama_lengkap,   
         'email'=>$user_info->email,   
         'token'=>$this->base64url_encode($token)  
       );  
         
       $this->form_validation->set_rules('password', 'Password', 'required');  
       $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         
         
       if ($this->form_validation->run() == FALSE) {    
         $this->load->view('new_reset_password', $data);  
       }else{  
                           
         $post = $this->input->post(NULL, TRUE);          
         $cleanPost = $this->security->xss_clean($post);          
         $hashed = md5($cleanPost['password']);          
         $cleanPost['password'] = $hashed;  
         $cleanPost['id_user'] = $user_info->id_user;  
         unset($cleanPost['passconf']);          
         if(!$this->M_user->updatePassword($cleanPost)){  
           $this->session->set_flashdata('sukses', 'Update password gagal.');  
         }else{  
           $this->session->set_flashdata('sukses', '<center>Password anda sudah diperbaharui.<strong> Silakan login.</strong></center>');  
         }  
         redirect(site_url('home'),'refresh');         
       }  
     }  
       
   public function base64url_encode($data) {   
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
   }   
   
   public function base64url_decode($data) {   
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
   }    


}

/* End of file reset_password.php */
/* Location: ./application/controllers/admin/reset_password.php */