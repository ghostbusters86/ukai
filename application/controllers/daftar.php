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
      'required|Maaf Email anda sudah terdaftar|is_unique[user.email]|min_length[11]|max_length[50]|valid_email');
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
      $data = array(
        'title'   => 'Daftar Member Ukai',
        'metades' => 'Platform Penyedia Layanan Latihan Soal UKAI Berbasis Teknologi Akses belajar asik dan santai dengan program kelas online untukmempersiapkan UKAI bagi calon Apoteker baru Indonesia.', 
        'isi'     => 'daftar'
      );  
      $this->load->view('layout/wrapper', $data, false);
    }else{
      $i  = $this->input;
      $data = array(
        'nama_lengkap'       =>  $i->post('nama_lengkap'),
        'jk_user'            =>  $i->post('jk_user'),
        'email'              =>  $i->post('email'),
        'universitas_user'   =>  $i->post('universitas_user'),
        'password'           =>  md5($i->post('password')),
        'nohp_user'          =>  $i->post('nohp_user'),
        'akses_level'        =>  $i->post('akses_level'),
        'foto'               =>  '0'
      );

      $this->M_user->add($data);
      $this->send_konfirmasi($data['email'],$data['nama_lengkap'],$data['jk_user'],$data['universitas_user']);
      redirect('/daftar');
    }

  }
  public function send_konfirmasi($email,$nama_lengkap,$jk_user,$universitas_user)
  { 
    $data['email'] = $email;
    $data['nama_lengkap'] = $nama_lengkap;
    $data['jk_user'] = $jk_user;
    $data['universitas_user'] = $universitas_user;
    // echo "<pre>";
    // print_r($data);
    $this->load->view('email/email_register', $data);
    // exit();
    $subject  = "Pendaftaran Akun Teman Ukai";
    $message  = $this->load->view('email/email_register',$data,true);
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
    $this->email->to($data['email']);
    $this->email->subject($subject);
    $this->email->message($message);
    if($this->email->send()){
      $this->session->set_flashdata('notifikasi', '<div class="alert alert-success alert-dismissible fade show"><center>Silahkan Cek Email <strong> Anda</strong></center><button type="button" class=close data-dismiss=alert aria-label=Close>
            <span aria-hidden=true>&times;</span>
            </button></div>');
    } else {
      # code...
      $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger alert-dismissible fade show"><center>Pengiriman Email Gagal <strong> Anda</strong></center><button type="button" class=close data-dismiss=alert aria-label=Close>
            <span aria-hidden=true>&times;</span>
            </button></div>');
      // echo $this->email->print_debugger();
      // exit();  
    }
  }	
  
}

/* End of file daftar.php */
/* Location: ./application/controllers/daftar.php */