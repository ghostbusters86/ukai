<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_reguler extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_paket_reguler');
    $this->load->model('M_soal');
    $this->load->helper('text');
  }

  public function index() {  
    $paket_reguler = $this->M_paket_reguler->select_paket_reguler();

    $semua  = $this->M_paket_reguler->count_semua();
    $publish  = $this->M_paket_reguler->count_published();
    $pending  = $this->M_paket_reguler->count_pending();
    $paket_reguler_published = $this->M_paket_reguler->select_published();
    $paket_reguler_pending = $this->M_paket_reguler->select_pending();
   
    $data = array(      
      'title' => 'Dasboard Admin UKAI',
      'paket_reguler' => $paket_reguler,
      'semua' => $semua,
      'publish' => $publish,     
      'pending' => $pending,
      'paket_reguler_published' => $paket_reguler_published,
      'paket_reguler_pending' => $paket_reguler_pending,
      'isi' => 'admin/paket_reguler_V'
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
        'isi' => 'admin/paket_reguler_T'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
      $i = $this->input;
      $url_akhir = $akhir->id_reguler+1;
      $slug = url_title($this->input->post('kode_paket'), 'dash', TRUE);
        $data = array(
          'nama_reguler'         =>  $i->post('nama_reguler'),
          'desk_reguler'            =>  $i->post('desk_reguler'),
          'harga_reguler'       =>  $i->post('harga_reguler'),
          'kode_paket'       =>  $i->post('kode_paket'),
          'kode_soal'       =>  $i->post('kode_soal'),
          'time_reguler'       =>  $i->post('time_reguler'),
          'created'       =>  $i->post('created'),
          'status_reguler'      =>  $i->post('status_reguler'),
          'slug'      =>  $slug );

        $this->M_paket_reguler->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> Paket Reguler Baru</strong></center>');
        redirect('/admin/paket_reguler');
      }
    }

  public function edit($id_reguler) {    
    $edit  = $this->M_paket_reguler->detail($id_reguler); 

    $soal = $this->M_soal->select_soal_reguler($edit->id_reguler);

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
        'soal' => $soal,
        'isi'   => 'admin/paket_reguler_e'
      );
      $this->load->view("admin/layout/wrapper", $data, false);
           

    }else{
        $i  = $this->input;
        $slug = url_title($this->input->post('kode_paket'), 'dash', TRUE);
        $data = array(
          'nama_reguler'         =>  $i->post('nama_reguler'),
          'desk_reguler'            =>  $i->post('desk_reguler'),
          'harga_reguler'       =>  $i->post('harga_reguler'),
          'kode_paket'       =>  $i->post('kode_paket'),
          'kode_soal'       =>  $i->post('kode_soal'),
          'time_reguler'       =>  $i->post('time_reguler'),
          'created'       =>  $i->post('created'),
          'status_reguler'      =>  $i->post('status_reguler'),
          'slug'      =>  $slug );

        $this->M_paket_reguler->edit($data,$id_reguler);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Paket Reguler</strong></center>');
        redirect('/admin/paket_reguler/');
      }   
    }       
  
  public function delete($id) { 
    $data = array('id'  =>  $id);
    $this->M_paket_reguler->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil Menghapus data <strong> Paket Reguler</strong></center>');
    redirect('admin/paket_reguler');  
  }

  public function add_soal($id_reguler) {  
     
    $soal_reguler = $this->M_paket_reguler->detail($id_reguler);
    $paket_reguler = $this->M_paket_reguler->select_soal($soal_reguler->id_reguler);
      

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
        'paket_reguler' => $paket_reguler,   
        'soal_reguler' => $soal_reguler,  
        'isi' => 'admin/paket_reguler_soal_t'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{  
        $i  = $this->input;
        $data = array(
          'kode_soal'         =>  $i->post('kode_soal'),
          'pertanyaan'       =>  $i->post('pertanyaan'),
          'jawaban_a'       =>  $i->post('jawaban_a'),
          'jawaban_b'       =>  $i->post('jawaban_b'),
          'jawaban_c'      =>  $i->post('jawaban_c'),
          'jawaban_d'      =>  $i->post('jawaban_d'),          
          'jawaban_e'      =>  $i->post('jawaban_e'),
          'kunci_soal'      =>  $i->post('kunci_soal'),
          'pembahasan_soal'      =>  $i->post('pembahasan_soal'));

        $this->M_soal->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> Soal Baru</strong></center>');
        redirect('/admin/paket_reguler/edit/'.$soal_reguler->id_reguler);
      }   
    }  

   public function edit_soal($id_soal) {       
    $edit  = $this->M_soal->detail($id_soal); 
    $paket_reguler = $this->M_paket_reguler->select_soal($edit->id_reguler);  

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
        'paket_reguler' => $paket_reguler, 
        'isi'   => 'admin/paket_reguler_soal_e'
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
          'jawaban_e'      =>  $i->post('jawaban_e'),
          'kunci_soal'      =>  $i->post('kunci_soal'),
          'pembahasan_soal'      =>  $i->post('pembahasan_soal'));

        $this->M_soal->edit($data,$id_soal);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Soal Reguler </strong></center>');
        redirect('/admin/paket_reguler/edit/'.$edit->id_reguler);
      }
    }

    public function delete_soal($id) {
    $soal  = $this->M_soal->detail($id); 
    $data = array(
      'id'  =>  $id,
      'soal'=>  $soal);
    $this->M_soal->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data <strong> Soal Reguler</strong></center>');
    redirect('admin/paket_reguler/edit/'.$soal->id_reguler);
  }



}

/* End of file paket_reguler.php */
/* Location: ./application/controllers/admin/paket_reguler.php */