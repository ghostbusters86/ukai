<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct() {   
		parent::__construct();
		if ($this->session->userdata('akses_level') != 'user') {
			redirect('home');
		}	    
		$this->load->model('M_user');
		$this->load->helper(array('form', 'url'));
	}  

	public function index() {
   $get_user = $this->M_user->get_user($this->session->userdata('id_user'));
   if ($get_user['foto'] == "0") {
     $get_user['foto'] = 'profil.png';
   }
   // echo "<pre>";
   // print_r($get_user);
   // exit();
   $data = array(
    'title' => 'Home Teman Ukai UKAI',
      'metades' => 'Platform Penyedia Layanan Latihan Soal UKAI Berbasis Teknologi Akses belajar asik dan santai dengan program kelas online untukmempersiapkan UKAI bagi calon Apoteker baru Indonesia.',
    'isi'   => 'profil',
    'get_user' => $get_user
  );
   $this->load->view('layout/wrapper', $data);
 }

 public function edit_profil($id_user){
   $edit  = $this->M_user->detail($id_user); 

   $valid = $this->form_validation;
   $valid->set_rules(
    'nohp_user',
    'nohp_user',  
    'required',  
    array(         
      'required'  =>  'Anda belum mengisikan Nomer Handphone.') 
  );

   $valid->set_rules(
    'nama_lengkap',
    'nama_lengkap',
    'required',  
    array(
      'required'  =>  'Anda belum mengisikan Kode Transaksi.')
  );
   $valid->set_rules(
    'universitas_user',
    'universitas_user',
    'required',
    array(
      'required'  =>  'Anda belum mengisikan Nama Universitas.')
  );

   $config['upload_path']          = './img/img_user/';
   $config['allowed_types']        = 'gif|jpg|png|jpeg';
   $config['max_size']             = 3000;
   $config['max_width']            = 2000;
   $config['max_height']           = 2000;
   $config['encrypt_name']         = TRUE;


   $this->load->library('upload', $config);
   $i  = $this->input;
   if ($valid->run()===false) {  
     $data = array(
      'title' => 'Home Teman Ukai UKAI',
      'metades' => 'Platform Penyedia Layanan Latihan Soal UKAI Berbasis Teknologi Akses belajar asik dan santai dengan program kelas online untukmempersiapkan UKAI bagi calon Apoteker baru Indonesia.',
      'isi'   => 'edit_profil',
      'edit'     => $edit 
    );   
     $this->load->view('layout/wrapper',$data);

   }else{
    if ( ! $this->upload->do_upload('foto'))
    {   
      $data = array(
        'nama_lengkap'    =>  $i->post('nama_lengkap'),
        'jk_user'         =>  $i->post('jk_user'),
        'email'           =>  $i->post('email'),
        'foto'            =>  $i->post('foto'),
        'universitas_user'=>  $i->post('universitas_user'),
        'nohp_user'       =>  $i->post('nohp_user'));

      $this->M_user->edit($data,$id_user);
      $this->session->set_flashdata('notifikasi', '<center>Data berhasil di update');
      redirect('/profil');
    }
    else   
    {
     $data = array(
      'nama_lengkap'=>  $i->post('nama_lengkap'),
      'jk_user'     =>  $i->post('jk_user'),
      'email'       =>  $i->post('email'),
      'foto'        =>   $this->upload->data('file_name'),
      'universitas_user' =>  $i->post('universitas_user'),
      'nohp_user'   =>  $i->post('nohp_user'));

     $this->M_user->edit($data,$id_user);
     $this->session->set_flashdata('notifikasi', '<center>Data berhasil di update');
     redirect('/profil');
   }
 }
}	

public function reset_password($id_user)  {  
  $edit  = $this->M_user->detail($id_user); 

  $valid = $this->form_validation->set_rules('password', 'Pasword', 'required');
  $valid = $this->form_validation->set_rules('passconf', 'Password anda tidak sesuai', 'required|matches[password]');
  $valid =         $this->form_validation->set_message('required','%s wajib diisi');
  $valid = $this->form_validation->set_error_delimiters('<p class="alert">','</p>');
     
   if ($valid->run()===false) {  
     $data = array(
      'title' => 'Home Teman Ukai UKAI',
      'metades' => 'Platform Penyedia Layanan Latihan Soal UKAI Berbasis Teknologi Akses belajar asik dan santai dengan program kelas online untukmempersiapkan UKAI bagi calon Apoteker baru Indonesia.',
      'isi' => 'edit_profil',
      'edit'     => $edit
    );       
    $this->load->view("layout/wrapper", $data, false);

       }else{  
        $i  = $this->input;
        $data = array(
                  'password'=>  md5($i->post('password'))
                  );         
      
       if ( $this->M_user->updatePassword($data,$id_user)); {
      $this->session->set_flashdata('sukses', 'Update password gagal.'); 
       }
       $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah <strong> Password User </strong></center>');
       redirect('/profil');        
       }  
     } 


}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */   