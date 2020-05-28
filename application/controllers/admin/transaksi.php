<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('M_transaksi');
  }

  public function index() {
    $transaksi = $this->M_transaksi->select_transaksi();
    $data = array(
      'title' => 'Dasboard Admin UKAI',
      'transaksi' => $transaksi,
      'isi' => 'admin/transaksi_v'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }  

  public function add() {  
    $valid = $this->form_validation;
    $valid->set_rules(
      'id_user',
      'id_user',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Bank.') 
    );
    
    $valid->set_rules(
      'kode_transaksi',
      'kode_transaksi',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Transaksi.')
    );
    $valid->set_rules(
      'nominal_transfer',
      'nominal_transfer',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nominal Transfer.')
    );
    $valid->set_rules(
      'kode_paket',
      'kode_paket',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Paket.')
    );
    $valid->set_rules(
      'kode_bank',
      'kode_bank',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Bank.')
    );

    if ($valid->run()===false) {
      $data = array(
        'title'   => 'Dasboard Admin Ukai- Tambah Transaksi',   
        'isi' => 'admin/transaksi_t'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(
          'id_user'         =>  $i->post('id_user'),
          'kode_transaksi'  =>  $i->post('kode_transaksi'),
          'kode_bank'       =>  $i->post('kode_bank'),
          'an_rekening'     =>  $i->post('an_rekening'),
          'kode_paket'      =>  $i->post('kode_paket'),
          'status_transaksi'=>  $i->post('status_transaksi'),
          'nominal_transfer'  =>  $i->post('nominal_transfer'));

        $this->M_transaksi->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> Transaksi Baru</strong></center>');
        redirect('/admin/transaksi');
      }
    }

  public function edit($id_transaksi) {  
    $edit  = $this->M_transaksi->detail($id_transaksi); 

    $valid = $this->form_validation;
    $valid->set_rules(
      'id_user',
      'id_user',  
      'required',  
      array(
        'required'  =>  'Anda belum mengisikan Kode Bank.') 
    );
    
    $valid->set_rules(
      'kode_transaksi',
      'kode_transaksi',
      'required',  
      array(
        'required'  =>  'Anda belum mengisikan Kode Transaksi.')
    );
    $valid->set_rules(
      'nominal_transfer',
      'nominal_transfer',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nominal Transfer.')
    );
    $valid->set_rules(
      'kode_paket',
      'kode_paket',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Paket.')
    );
    $valid->set_rules(
      'kode_bank',
      'kode_bank',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Bank.')
    );

    if ($valid->run()===false) {  
      $data = array(
        'title' => 'Dasboard Admin Ukai- Tambah Transaksi',  
        'edit'  => $edit, 
        'isi'   => 'admin/transaksi_e'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(
          'id_user'         =>  $i->post('id_user'),
          'kode_transaksi'  =>  $i->post('kode_transaksi'),
          'kode_bank'       =>  $i->post('kode_bank'),
          'an_rekening'     =>  $i->post('an_rekening'),
          'kode_paket'      =>  $i->post('kode_paket'),
          'status_transaksi'=>  $i->post('status_transaksi'),
          'nominal_transfer'  =>  $i->post('nominal_transfer'));

        $this->M_transaksi->edit($data,$id_transaksi);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Ubah Transaksi </strong></center>');
        redirect('/admin/transaksi');
      }
    }

  public function delete($id) {
    $data = array('id'  =>  $id);
    $this->M_transaksi->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/transaksi');
  }  


}

/* End of file transaksi.php */
/* Location: ./application/controllers/admin/transaksi.php */