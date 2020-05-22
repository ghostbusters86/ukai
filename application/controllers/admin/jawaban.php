<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawaban extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
   $this->load->model('M_jawaban');
   $this->load->helper('text');
  }

  public function index() {
    $jawaban = $this->M_jawaban->select_jawaban();

    $data = array(
      'title' => 'Dasboard Admin UKAI',
      'jawaban' => $jawaban,
      'isi' => 'admin/jawaban/jawaban_V'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

    public function add() {  
    $valid = $this->form_validation;
    $valid->set_rules(
      'Status_answer',
      'Status_answer',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawaban.') 
    );

    if ($valid->run()===false) {
      $data = array(
        'title'   => 'Dasboard Admin Ukai - Tambah Jawaban',   
        'isi' => 'admin/jawaban/jawaban_T'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(
          'id_jawaban'    =>  $i->post('id_jawaban'),
          'id_soal'       =>  $i->post('id_soal'),
          'id_ambil_soal'  =>  $i->post('id_ambil_soal'),
          'Status_answer'  =>  $i->post('Status_answer'),
          'created'      =>  $i->post('created'),
          'modified'    =>  $i->post('modified'));

        $this->M_jawaban->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil menambahkan data <strong>jawaban Baru</strong></center>');
        redirect('/admin/jawaban');
      }
    }

  public function edit($id_jawaban) {    
    $edit  = $this->M_jawaban->detail($id_jawaban); 

    $valid = $this->form_validation;
    $valid->set_rules(
      'Status_answer',
      'Status_answer',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawaban.') 
    );

    if ($valid->run()===false) {
      $data = array(
        'title' => 'Dasboard Admin Ukai- Tambah BAB Booster',  
        'edit'  => $edit,  
        'isi'   => 'admin/jawaban/jawaban_E'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(  
          'id_jawaban'    =>  $i->post('id_jawaban'),
          'id_soal'       =>  $i->post('id_soal'),
          'id_ambil_soal'  =>  $i->post('id_ambil_soal'),
          'Status_answer'  =>  $i->post('Status_answer'),
          'created'      =>  $i->post('created'),
          'modified'    =>  $i->post('modified'));

        $this->M_jawaban->edit($data,$id_jawaban);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Jawaban </strong></center>');
        redirect('/admin/jawaban');
      }
    }

  public function delete($id) {
    $data = array('id'  =>  $id);
    $this->M_jawaban->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/jawaban');
  }

}

/* End of file jawaban.php */
/* Location: ./application/controllers/admin/jawaban.php */