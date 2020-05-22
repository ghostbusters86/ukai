<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('M_soal');
    $this->load->model('M_bab_booster');
    $this->load->model('M_paket_booster');
    $this->load->model('M_paket_reguler');
  }

  public function index() { 
    $soal = $this->M_soal->listing();

    $data = array(
      'title' => 'Dasboard Admin UKAI',
      'soal' => $soal,
      'isi' => 'admin/soal/soal_V'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

    public function add() {  
    $bab_booster = $this->M_bab_booster->select_bab_booster();
    $paket_booster = $this->M_paket_booster->select_paket_booster();
    $paket_reguler = $this->M_paket_reguler->select_paket_reguler();
    $valid = $this->form_validation;
    $valid->set_rules(
      'kode_soal',
      'kode_soal',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan ID Booster.') 
    );
    
    $valid->set_rules(
      'pertanyaan',
      'pertanyaan',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama BAB Booster.')
    );
    $valid->set_rules(
      'jawaban_d',
      'jawaban_d',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawaban D.')
    );
    $valid->set_rules(
      'jawaban_c',
      'jawaban_c',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawaban C.')
    );
    $valid->set_rules(
      'jawaban_b',
      'jawaban_b',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawaban B.')
    );

    $valid->set_rules(
      'jawaban_a',
      'jawaban_a',   
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawaban A.')
    );

    if ($valid->run()===false) {
      $data = array(
        'title'   => 'Dasboard Admin Ukai- Tambah BAB Booster',   
        'bab_booster' => $bab_booster, 
        'paket_reguler' => $paket_reguler, 
        'isi' => 'admin/soal/soal_T'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(
          'kode_soal'            =>  $i->post('kode_soal'),
          'pertanyaan'       =>  $i->post('pertanyaan'),
          'jawaban_a'       =>  $i->post('jawaban_a'),
          'jawaban_b'       =>  $i->post('jawaban_b'),
          'jawaban_c'      =>  $i->post('jawaban_c'),
          'jawaban_d'      =>  $i->post('jawaban_d'),
          'kunci_soal'      =>  $i->post('kunci_soal'),
          'pembahasan_soal'      =>  $i->post('pembahasan_soal'));

        $this->M_soal->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> Soal Baru</strong></center>');
        redirect('/admin/soal');
      }   
    }

  public function edit($id_soal) {    
    $edit  = $this->M_soal->detail($id_soal); 
    $bab_booster = $this->M_bab_booster->select_bab_booster();
    $paket_reguler = $this->M_paket_reguler->select_paket_reguler();

        $valid = $this->form_validation;
    $valid->set_rules(
      'kode_soal',
      'kode_soal',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Soal.') 
    );
    $valid->set_rules(
      'pertanyaan',
      'pertanyaan',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Pertanyaam.')
    );
    $valid->set_rules(
      'jawaban_d',
      'jawaban_d',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawban D.')
    );
    $valid->set_rules(
      'jawaban_c',
      'jawaban_c',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawban C')
    );
    $valid->set_rules(
      'jawaban_b',
      'jawaban_b',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawban B.')
    );
    $valid->set_rules(
      'jawaban_a',
      'jawaban_a',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Jawban A.')
    );

    if ($valid->run()===false) {
      $data = array(
        'title' => 'Dasboard Admin Ukai - Ubah BAB Booster',  
        'edit'  => $edit,  
        'bab_booster' => $bab_booster, 
        'paket_reguler' => $paket_reguler, 
        'isi'   => 'admin/soal/soal_E'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(  
          'kode_soal'            =>  $i->post('kode_soal'),
          'pertanyaan'       =>  $i->post('pertanyaan'),
          'jawaban_a'       =>  $i->post('jawaban_a'),
          'jawaban_b'       =>  $i->post('jawaban_b'),
          'jawaban_c'      =>  $i->post('jawaban_c'),
          'jawaban_d'      =>  $i->post('jawaban_d'),
          'kunci_soal'      =>  $i->post('kunci_soal'),
          'pembahasan_soal'      =>  $i->post('pembahasan_soal'));

        $this->M_soal->edit($data,$id_soal);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Soal Baru</strong></center>');
        redirect('/admin/soal');
      }
    }

  public function delete($id) {
    $data = array('id'  =>  $id);
    $this->M_soal->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/soal');
  }


}

/* End of file soal.php */
/* Location: ./application/controllers/admin/soal.php */