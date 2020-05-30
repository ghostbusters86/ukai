<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

public function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
  }

	public function index()  {  
    $valid = $this->form_validation;
    $valid->set_rules(
      'nama_lengkap',
      'nama_lengkap',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama Lengkap.') 
    );
    
    $valid->set_rules(
      'jk_user',
      'jk_user',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jenis Kelamin.')
    );
    $valid->set_rules(
      'nohp_user',
      'nohp_user',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan No Handphone.')
    );
    $valid->set_rules(
      'email',
      'email',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Email.')
    );
    $valid->set_rules(
      'password',
      'password',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Password.')
    );
    $valid->set_rules(
      'universitas_user',
      'universitas_user',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama Universitas.')
    );

    if ($valid->run()===false) {

      $this->load->view("daftar", false);

    }else{
        $i  = $this->input;
        $data = array(
          'nama_lengkap'         =>  $i->post('nama_lengkap'),
          'jk_user'            =>  $i->post('jk_user'),
          'email'       =>  $i->post('email'),
          'universitas_user'       =>  $i->post('universitas_user'),
          'password'       =>  md5($i->post('password')),
          'nohp_user'       =>  $i->post('nohp_user'),
          'akses_level'       =>  $i->post('akses_level'));

        $this->M_user->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> User</strong></center>');
        redirect('/daftar');
      }
    }	
	
}

/* End of file daftar.php */
/* Location: ./application/controllers/daftar.php */