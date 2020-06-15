<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

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
  public function delete($id) {
      $data = array('id'  =>  $id);
      $jawab = $this->M_ambil_soal->detail($data);
      // echo "<pre>";
      // print_r($jawab);
      // exit();
      $this->M_ambil_soal->delete($data);
      $this->M_ambil_soal->delete_jawaban($jawab->kode_mulai);
      $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
      redirect('admin/hasil');
    }

  


}

/* End of file ambil_ambil_soal.php */
/* Location: ./application/controllers/admin/ambil_ambil_soal.php */