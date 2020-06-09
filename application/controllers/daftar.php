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

    $config['upload_path']          = './img/img_user/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 3000;
    $config['max_width']            = 2000;
    $config['max_height']           = 2000;
    $config['encrypt_name']         = TRUE;

    $this->load->library('upload', $config);

    if ($valid->run()===false) {

      $this->load->view("daftar", false);
    }else{
      if ( ! $this->upload->do_upload('foto'))
      {
        $error = array('error' => $this->upload->display_errors());
        print_r($error);

    }else{
      $nama_lengkap = $this->input->post('nama_lengkap');
      $email = $this->input->post('email');
      $password = md5($this->input->post('password'));
      $nohp_user = $this->input->post('nohp_user');
      $jk_user = $this->input->post('jk_user');
      $universitas_user = $this->input->post('universitas_user');
      $foto = $this->upload->data('file_name');
      $akses_level = $this->input->post('akses_level');

      $user['email'] = $email;
      $user['nama_lengkap'] = $nama_lengkap;
      $user['password'] = $password;
      $user['nohp_user'] = $nohp_user;
      $user['jk_user'] = $jk_user;
      $user['universitas_user'] = $universitas_user;
      $user['foto'] = $foto;
      $user['akses_level'] = $akses_level;

      $id = $this->M_user->add($user);
            //set up email   

      $subject  = "Pendaftaran Akun Teman Ukai";
      $message =  $this->load->view('email/email_register',$user,true);         
      $config = array(       
          'protocol' => 'smtp',
          'charset' => 'utf-8',
          'smtp_host' => 'ssl://smtp.gmail.com',
          'smtp_port' => '465',
          'smtp_user' => 'yudafadilah248@gmail.com', // change it to yours
          'smtp_pass' => 'fadilah12345', // change it to yours
          'smtp_username' => 'temanukai.com',
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'wordwrap' => TRUE
      );
          
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@temanukai.com','Teman Ukai');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        //sending email
        if($this->email->send()){
          $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> User</strong></center>');
        }
        else{
          $this->session->set_flashdata('notifikasi', $this->email->print_debugger());
        }
        redirect('/daftar');
      }
    }
  }

} 

/* End of file daftar.php */
/* Location: ./application/controllers/daftar.php */