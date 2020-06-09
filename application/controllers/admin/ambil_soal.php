<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambil_soal extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('M_ambil_soal');
  }

  public function index() { 
    $ambil_soal = $this->M_ambil_soal->select_ambil_soal();

    $data = array(  
      'title' => 'Dasboard Admin UKAI',
      'ambil_soal' => $ambil_soal,
      'isi' => 'admin/ambil_soal_v'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

  public function add() {  
    $valid = $this->form_validation;
    $valid->set_rules(
      'kode_soal',
      'kode_soal',
      'required',
      array(
        'required'  =>  'Anda belum Kode Soal.') 
    );

    if ($valid->run()===false) {
      $data = array(
        'title'   => 'Dasboard Admin Ukai- Tambah Ambil Soal Booster',   
        'isi' => 'admin/ambil_soal_t'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
      $i  = $this->input;
      $data = array(
        'kode_soal'    =>  $i->post('kode_soal'),
        'id_user'      =>  $i->post('id_user'),
        'mulai'         =>  $i->post('mulai'), 
        'berakhir'      =>  $i->post('berakhir'));

      $this->M_ambil_soal->add($data);
      $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> ambil soal Baru</strong></center>');
      redirect('/admin/ambil_soal');
    }
  }

    public function delete($id) {
      $data = array('id'  =>  $id);
      $this->M_soal->delete($data);
      $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
      redirect('admin/soal');
    }


}

/* End of file ambil_ambil_soal.php */
/* Location: ./application/controllers/admin/ambil_ambil_soal.php */