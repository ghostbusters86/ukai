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
			$data = array(
				'title'   => 'Daftar Member Ukai',
				'metades' => 'Platform Penyedia Layanan Latihan Soal UKAI Berbasis Teknologi Akses belajar asik dan santai dengan program kelas online untukmempersiapkan UKAI bagi calon Apoteker baru Indonesia.', 
				'isi'     => 'reset_password'
			);  
			$this->load->view('layout/wrapper', $data, false);
		}else{  
			$email = $this->input->post('email');   
			$clean = $this->security->xss_clean($email);  
			$userInfo = $this->M_user->getUserInfoByEmail($clean);  

			if(!$userInfo){  
				$this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');  
				redirect(site_url('reset_password'),'refresh');   
			}   

             
            //build token   
      $token = $this->M_user->insertToken($userInfo->id_user);
      $qstring = $this->base64url_encode($token);           
      $url = site_url() . 'reset_password/ubah_password/' .$qstring;  
      $link = '<a href="' . $url . '">' . 'Klik link ini' . '</a>';   
     	$data = array('link' => $link );

      $subject  = "Reset Password Teman Ukai";
      $message  = $this->load->view('email/reset_password',$data,true);
      $config   = array(
        'protocol'    => 'smtp',
        'smtp_host'   => 'ssl://mail.temanukai.com',
        'smtp_port'   => '465',
        'smtp_user'   => 'admin@temanukai.com',
        'smtp_pass'   => '@temanukai123',
        'mailtype'    => 'html',
        'charset'     => 'utf-8',
        'wordwrap'    => TRUE
      );
      $this->load->library('email', $config);
    // $this->email->initialize($config); 
      $this->email->set_newline("\r\n");
      $this->email->from('admin@temanukai.com','Teman Ukai');
      $this->email->to($email);
      $this->email->subject($subject);
      $this->email->message($message);   
       // $this->email->message('<strong>Anda melakukan permintaan reset password</strong><br>'.$link);   
         if($this->email->send()){
      $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissible fade show"><center>Silahkan Cek Email <strong> Anda</strong></center><button type="button" class=close data-dismiss=alert aria-label=Close>
            <span aria-hidden=true>&times;</span>
            </button></div>');
      redirect(site_url('home'),'refresh');
    } else {
      # code...
      $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger alert-dismissible fade show"><center>Pengiriman Email Gagal <strong> Anda</strong></center><button type="button" class=close data-dismiss=alert aria-label=Close>
            <span aria-hidden=true>&times;</span>
            </button></div>');
      redirect(site_url('reset_password'),'refresh');
      // echo $this->email->print_debugger();
      // exit();  
    }

        
      // $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
      // password anda.</strong><br>';  
      // $message .= '<strong>Silakan klik link ini:</strong> ' . $link;         

   //           echo $message; //send this through mail  
          echo $this->email->print_debugger();
    exit;   
             //build token   
                       
             // $token = $this->M_user->insertToken($userInfo->id_user);              
             // $qstring = $this->base64url_encode($token);           
             // $url = site_url() . 'reset_password/ubah_password/token/' .$qstring;  
             // $link = '<a href="' . $url . '">' . $url . '</a>';   
               
             // $message = '';             
             // $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
             //     password anda.</strong><br>';  
             // $message .= '<strong>Silakan klik link ini:</strong> ' . $link;         
   
             // echo $message; //send this through mail  
             // exit;     

         } 
	}

	 public function ubah_password($token) {  
	 	$decode = $this->base64url_decode($token);
	 	$cleanToken = $this->security->xss_clean($decode);  
	 	$del_akhir = substr($cleanToken, 0, -2);
     	$ubah = $this->M_user->get_token($del_akhir);
     	
     	// echo "<pre>";
     	// print_r($ubah);
     	// exit();
     	if ($ubah == null) {
     		$this->session->set_flashdata('notifikasi', '<center><strong> Data link Email tidak di temukan  </strong></center>');
     		redirect('home');
     	}
     	$valid = $this->form_validation->set_rules('password', 'Pasword anda belum di isi', 'required');
     	$valid = $this->form_validation->set_rules('passconf', 'Password anda tidak sesuai', 'required|matches[password]');
     	$valid =         $this->form_validation->set_message('required','%s wajib diisi');
     	$valid = $this->form_validation->set_error_delimiters('<p class="alert">','</p>');
     	
     	if ($valid->run()===false) {  
     		$data = array(
				'title'   => 'Daftar Member Ukai',
				'metades' => 'Platform Penyedia Layanan Latihan Soal UKAI Berbasis Teknologi Akses belajar asik dan santai dengan program kelas online untukmempersiapkan UKAI bagi calon Apoteker baru Indonesia.', 
     			'isi' => 'new_reset_password',
     			'ubah'     => $ubah,
     			'token'     => $token,
     		);       
     		$this->load->view("layout/wrapper", $data, false);

     		}else{  
     			$i  = $this->input;
     			$data = array(
     				'password'=>  md5($i->post('password')),
     				'id_user'=> $ubah->id_user,
     			);     	

     			$this->M_user->password_user($data); 
     			    	echo "<pre>";
     	print_r($data);
     	exit();
     		$this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah <strong> Password User </strong></center>');
     		redirect('home');        
     	} 

     }
   // if ($valid->run()===false) {  
   //   $data = array(
   //    'title' => 'Dasboard Admin UKAI',
   //    'isi' => 'admin/user_e',
   //    'edit'     => $edit
   //  );       
   //  $this->load->view("admin/layout/wrapper", $data, false);

   //     }else{  
   //      $i  = $this->input;
   //      $data = array(
   //                'password'=>  md5($i->post('password'))
   //                );         
      
   //     if ( $this->M_user->updatePassword($data,$id_user)); {
   //    $this->session->set_flashdata('sukses', 'Update password gagal.'); 
   //     }
   //     $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah <strong> Password User </strong></center>');
   //     redirect('/admin/user');        
   //     } 
       // $token = $this->base64url_decode($this->uri->segment(4));           
       // $cleanToken = $this->security->xss_clean($token);  
       
       // $user_info = $this->M_user->isTokenValid($cleanToken); //either false or array();          
       
       // if(!$user_info){  
       //   $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');  
       //   redirect(site_url('reset_password'),'refresh');   
       // }    
       
       // $data = array(  
       // 	'title'   => 'Daftar Member Ukai',
       // 	'metades' => 'Platform Penyedia Layanan Latihan Soal UKAI Berbasis Teknologi Akses belajar asik dan santai dengan program kelas online untukmempersiapkan UKAI bagi calon Apoteker baru Indonesia.', 
       // 	'nama_lengkap'=> $user_info->nama_lengkap,   
       // 	'email'=>$user_info->email,   
       // 	'token'=>$this->base64url_encode($token)  
       // );  
       
       // $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
       // $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         
       
       // if ($this->form_validation->run() == FALSE) {      
       //   $data = array(
       //   	'title'   => 'Daftar Member Ukai',
       //   	'metades' => 'Platform Penyedia Layanan Latihan Soal UKAI Berbasis Teknologi Akses belajar asik dan santai dengan program kelas online untukmempersiapkan UKAI bagi calon Apoteker baru Indonesia.', 
       //   	'isi'     => 'new_reset_password'
       //   );  
       //   $this->load->view('layout/wrapper', $data);
       // }else{  
         
       //   $post = $this->input->post(NULL, TRUE);          
       //   $cleanPost = $this->security->xss_clean($post);          
       //   $hashed = md5($cleanPost['password']);          
       //   $cleanPost['password'] = $hashed;  
       //   $cleanPost['id_user'] = $user_info->id_user;  
       //   unset($cleanPost['passconf']);          
       //   if(!$this->M_user->ubah_password($cleanPost)){  
       //     $this->session->set_flashdata('notifikasi', 'Update password gagal.');  
       //   }else{  
       //     $this->session->set_flashdata('notifikasi', 'Password anda sudah  
       //       diperbaharui. Silakan login.');  
       //   }  
       //   redirect(site_url('home'),'refresh');         
       // }  
     
    
    public function base64url_encode($data) {   
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
    }   
    
    public function base64url_decode($data) {   
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
    } 



}

/* End of file reset_password.php */
/* Location: ./application/controllers/admin/reset_password.php */