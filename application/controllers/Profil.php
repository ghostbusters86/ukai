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

	$data = array('get_user' => $get_user);
	$this->load->view('profil', $data);
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
	$data = array('edit'     => $edit );   
	$this->load->view('edit_profil',$data);

	}else{
		if ( ! $this->upload->do_upload('foto'))
      {   
        $data = array(
          'nama_lengkap'    =>  $i->post('nama_lengkap'),
          'jk_user'         =>  $i->post('jk_user'),
          'email'           =>  $i->post('email'),
          'foto'            =>  $i->post('foto'),  
          'universitas_user'=>  $i->post('universitas_user'),
          'nohp_user'       =>  $i->post('nohp_user'),
          'foto'      =>  $i->post('gambar_lama'));

        $this->M_user->edit($data,$id_user);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong>Profil</strong>');
        redirect('/profil/');
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
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong>Profil</strong>');
        redirect('/profil/');
   	 	}
	}
	}	

  public function ubah_password($id_user){
  $password  = $this->M_user->detail($id_user); 
  // echo "<pre>";
  // print_r($password);
  // exit();
   $valid = $this->form_validation;
    $valid->set_rules(
      'password',
      'password',  
      'required',  
      array(         
        'required'  =>  'Anda belum mengisikan Password.') 
    );
    
    if ($valid->run()===false) {  
      $data = array('password'     => $password );   
      $this->load->view('edit_profil',$data);

    }else{
        $data = array('password'       =>  md5($i->post('password')));
        $this->M_user->edit($data,$id_user);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong>Password</strong></center>');
        redirect('/profil/edit_profil/'.$edit->id_user);
      }
    } 

}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */   