<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_booster extends CI_Controller {


  public function __construct()   
  {
    parent::__construct();
    $this->load->model('M_paket_booster');
    $this->load->helper('text');   
  }

  public function index() {

    $semua  = $this->M_paket_booster->count_semua();
    $publish  = $this->M_paket_booster->count_publish();
    $pending  = $this->M_paket_booster->count_pending();
    $select_paket  = $this->M_paket_booster->select_paket();
    $paket_booster_published = $this->M_paket_booster->select_pending();
    $paket_booster_pending = $this->M_paket_booster->select_published();

    $data = array(
      'title' => 'Dasboard Admin UKAI',
      'semua' => $semua,
      'publish' => $publish,
      'pending' => $pending,
      'select_paket' => $select_paket,
      'paket_booster_published' => $paket_booster_published,
      'paket_booster_pending' => $paket_booster_pending,
      'isi' => 'admin//paket_booster/paket_booster_V'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

    public function add() {  
    $valid = $this->form_validation;
    $valid->set_rules(
      'nama_booster',
      'nama_booster',
      'required',  
      array(
        'required'  =>  'Anda belum mengisikan Nama Booster.') 
    );
    
    $valid->set_rules(
      'desk_booster',
      'desk_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama Deskripsi Booster.')
    );
    $valid->set_rules(
      'harga_booster',
      'harga_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Harga Reguler.')
    );
    $valid->set_rules(
      'status_booster',
      'status_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Status Booster.')
    );
    $valid->set_rules(
      'kode_paket',
      'kode_paket',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Paket.')
    );

    if ($valid->run()===false) {
      $data = array(
        'title'   => 'Dasboard Admin Ukai- Tambah Paket Booster',   
        'isi' => 'admin/paket_booster/paket_booster_T'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(
          'nama_booster'         =>  $i->post('nama_booster'),
          'desk_booster'            =>  $i->post('desk_booster'),
          'harga_booster'       =>  $i->post('harga_booster'),
          'kode_paket'       =>  $i->post('kode_paket'),
          'created'       =>  $i->post('created'),
          'status_booster'      =>  $i->post('status_booster'));

        $this->M_paket_booster->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil menambahkan data <strong> Paket Boster Baru</strong></center>');
        redirect('/admin/paket_booster');
      }
    }

  public function edit($id_booster) {    
    $edit  = $this->M_paket_booster->detail($id_booster); 

       $valid = $this->form_validation;
    $valid->set_rules(
      'nama_booster',
      'nama_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama Booster.') 
    );
    
    $valid->set_rules(
      'desk_booster',
      'desk_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama Deskripsi Booster.')
    );
    $valid->set_rules(
      'harga_booster',
      'harga_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Harga Reguler.')
    );
    $valid->set_rules(
      'status_booster',
      'status_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Status Booster.')
    );
    $valid->set_rules(
      'kode_paket',
      'kode_paket',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Paket.')
    );


    if ($valid->run()===false) {
      $data = array(
        'title' => 'Dasboard Admin Ukai- Ubah Paket Booster',  
        'edit'  => $edit,  
        'isi'   => 'admin/paket_booster/paket_booster_E'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(
          'nama_booster'         =>  $i->post('nama_booster'),
          'desk_booster'            =>  $i->post('desk_booster'),
          'harga_booster'       =>  $i->post('harga_booster'),
          'kode_paket'       =>  $i->post('kode_paket'),
          'created'       =>  $i->post('created'),
          'status_booster'      =>  $i->post('status_booster'));

        $this->M_paket_booster->edit($data,$id_booster);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Paket Boster Baru</strong></center>');
        redirect('/admin/paket_booster');
      }
    }

  public function delete($id) {
    $data = array('id'  =>  $id);
    $this->M_paket_booster->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/paket_booster');
  }


}

/* End of file paket_booster.php */
/* Location: ./application/controllers/admin/paket_booster.php */