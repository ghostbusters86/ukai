<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
  }

  function index() {  
    $user = $this->M_user->select_user();
    $data = array(
      'title' => 'Dasboard Admin UKAI',
      'user'  => $user,
      'isi' => 'admin/user_v'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

  function add()  {  
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
    $i  = $this->input;
    if ($valid->run()===false) {
    $data = array('title' => 'Dasboard Admin UKAI',
                  'isi' => 'admin/user_t'
                    );
    $this->load->view("admin/layout/wrapper", $data, false);
    } else {
      if ( ! $this->upload->do_upload('foto'))
      {
      $error = array('error' => $this->upload->display_errors());
      print_r($error);
    }else{
        $i  = $this->input;
        $data = array(
          'nama_lengkap'         =>  $i->post('nama_lengkap'),
          'jk_user'            =>  $i->post('jk_user'),
          'email'       =>  $i->post('email'),
          'universitas_user'       =>  $i->post('universitas_user'),
          'password'       =>  md5($i->post('password')),
          'nohp_user'       =>  $i->post('nohp_user'),
          'foto'  =>  $this->upload->data('file_name'),
          'akses_level'       =>  $i->post('akses_level'));

        $this->M_user->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong>User Baru</strong></center>');
        redirect('/admin/user/');
      }
    } 
  }
  
  function edit($id_user) {  
  $edit =$this->M_user->detail($id_user);

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
    // $valid->set_rules(
    //   'password',
    //   'password',
    //   'required',
    //   array(
    //     'required'  =>  'Anda belum mengisikan Password.')
    // );
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
    $data = array('title' => 'Dasboard Admin UKAI',
                  'isi' => 'admin/user_e',
                  'edit' => $edit
                    );
    $this->load->view("admin/layout/wrapper", $data, false);
    } else {
      if ( ! $this->upload->do_upload('foto'))
      {
        $data = array(
          'nama_lengkap'    =>  $i->post('nama_lengkap'),
          'jk_user'         =>  $i->post('jk_user'),
          'email'           =>  $i->post('email'),
          'universitas_user'=>  $i->post('universitas_user'),
          'nohp_user'       =>  $i->post('nohp_user'),
          'foto'            =>  $i->post('gambar_lama'),
          'akses_level'     =>  $i->post('akses_level'));
        $this->M_user->edit($data,$id_user);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong>User</strong></center>');
        redirect('/admin/user/');
    }else{
        $data = array(
          'nama_lengkap'    =>  $i->post('nama_lengkap'),
          'jk_user'         =>  $i->post('jk_user'),
          'email'           =>  $i->post('email'),
          'universitas_user'=>  $i->post('universitas_user'),
          'nohp_user'       =>  $i->post('nohp_user'),
          'foto'            =>  $this->upload->data('file_name'),
          'akses_level'     =>  $i->post('akses_level'));

        $this->M_user->edit($data,$id_user);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong>User</strong></center>');
        redirect('/admin/user/');
      }
    } 
  }

  public function delete($id) {
    $data = array('id'  =>  $id);
    $this->M_user->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/user');
  } 

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */