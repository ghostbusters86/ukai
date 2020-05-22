<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_reguler extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('M_paket_reguler');
    $this->load->helper('text');
  }

  public function index() {  
    $paket_reguler = $this->M_paket_reguler->select_paket_reguler();

    $semua  = $this->M_paket_reguler->count_semua();
    $publish  = $this->M_paket_reguler->count_publish();
    $pending  = $this->M_paket_reguler->count_pending();
    $paket_reguler_published = $this->M_paket_reguler->select_pending();
    $paket_reguler_pending = $this->M_paket_reguler->select_published();

    $data = array(
      'title' => 'Dasboard Admin UKAI',
      'paket_reguler' => $paket_reguler,
      'semua' => $semua,
      'publish' => $publish,
      'pending' => $pending,
      'paket_reguler_published' => $paket_reguler_published,
      'paket_reguler_pending' => $paket_reguler_pending,
      'isi' => 'admin//paket_reguler/paket_reguler_V'
    );
    $this->load->view("admin/layout/wrapper", $data, false);     
  }

    public function add() {  
    $valid = $this->form_validation;
    $valid->set_rules(
      'nama_reguler',
      'nama_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama reguler.') 
    );
    
    $valid->set_rules(
      'desk_reguler',
      'desk_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama Deskripsi reguler.')
    );
    $valid->set_rules(
      'harga_reguler',
      'harga_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Harga Reguler.')
    );
    $valid->set_rules(
      'status_reguler',
      'status_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Status reguler.')
    );
    $valid->set_rules(
      'kode_paket',
      'kode_paket',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Paket.')
    );
    $valid->set_rules(
      'kode_soal',
      'kode_soal',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Soal.')
    );

    $valid->set_rules(
      'time_reguler',
      'time_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Waktu.')
    );

    if ($valid->run()===false) {
      $data = array(
        'title'   => 'Dasboard Admin Ukai- Tambah Paket reguler',   
        'isi' => 'admin/paket_reguler/paket_reguler_T'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(
          'nama_reguler'         =>  $i->post('nama_reguler'),
          'desk_reguler'            =>  $i->post('desk_reguler'),
          'harga_reguler'       =>  $i->post('harga_reguler'),
          'kode_paket'       =>  $i->post('kode_paket'),
          'kode_soal'       =>  $i->post('kode_soal'),
          'time_reguler'       =>  $i->post('time_reguler'),
          'created'       =>  $i->post('created'),
          'status_reguler'      =>  $i->post('status_reguler'));

        $this->M_paket_reguler->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> Paket Reguler Baru</strong></center>');
        redirect('/admin/paket_reguler');
      }
    }

  public function edit($id_reguler) {    
    $edit  = $this->M_paket_reguler->detail($id_reguler); 

    $valid = $this->form_validation;
    $valid->set_rules(
      'nama_reguler',
      'nama_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama reguler.') 
    );
    
    $valid->set_rules(
      'desk_reguler',
      'desk_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama Deskripsi reguler.')
    );
    $valid->set_rules(
      'harga_reguler',
      'harga_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Harga Reguler.')
    );
    $valid->set_rules(
      'status_reguler',
      'status_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Status reguler.')
    );
    $valid->set_rules(
      'kode_paket',
      'kode_paket',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Paket.')
    );
    $valid->set_rules(
      'kode_soal',
      'kode_soal',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Soal.')
    );

    $valid->set_rules(
      'time_reguler',
      'time_reguler',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Waktu.')
    );


    if ($valid->run()===false) {
      $data = array(
        'title' => 'Dasboard Admin Ukai- Ubah Paket reguler',  
        'edit'  => $edit,  
        'isi'   => 'admin/paket_reguler/paket_reguler_E'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(
          'nama_reguler'         =>  $i->post('nama_reguler'),
          'desk_reguler'            =>  $i->post('desk_reguler'),
          'harga_reguler'       =>  $i->post('harga_reguler'),
          'kode_paket'       =>  $i->post('kode_paket'),
          'kode_soal'       =>  $i->post('kode_soal'),
          'time_reguler'       =>  $i->post('time_reguler'),
          'created'       =>  $i->post('created'),
          'status_reguler'      =>  $i->post('status_reguler'));

        $this->M_paket_reguler->edit($data,$id_reguler);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Paket Reguler Baru</strong></center>');
        redirect('/admin/paket_reguler');
      }
    }

  public function delete($id) {
    $data = array('id'  =>  $id);
    $this->M_paket_reguler->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/paket_reguler');
  }

}

/* End of file paket_reguler.php */
/* Location: ./application/controllers/admin/paket_reguler.php */