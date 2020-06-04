<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_booster extends CI_Controller {


  public function __construct()   
  {
    parent::__construct();
    $this->load->model('M_paket_booster');
    $this->load->model('M_bab_booster');
    $this->load->model('M_soal');  
    $this->load->helper('text');   
  }

  public function index() {     
  
    $select_paket  = $this->M_paket_booster->select_paket_booster();
    $semua  = $this->M_paket_booster->count_semua();
    $publish  = $this->M_paket_booster->count_published();
    $pending  = $this->M_paket_booster->count_pending();
    $paket_booster_published = $this->M_paket_booster->select_published();
    $paket_booster_pending = $this->M_paket_booster->select_pending();  

    $data = array(  
      'title' => 'Dasboard Admin UKAI',
      'semua' => $semua,  
      'publish' => $publish,
      'pending' => $pending,
      'select_paket' => $select_paket,
      'paket_booster_published' => $paket_booster_published,
      'paket_booster_pending' => $paket_booster_pending,
      'isi' => 'admin/paket_booster_V'
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
        'isi' => 'admin/paket_booster_T'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $slug = url_title($this->input->post('kode_paket'), 'dash', TRUE);
        $data = array(
          'nama_booster'         =>  $i->post('nama_booster'),
          'desk_booster'            =>  $i->post('desk_booster'),
          'harga_booster'       =>  $i->post('harga_booster'),
          'kode_paket'       =>  $i->post('kode_paket'),
          'created'       =>  $i->post('created'),
          'status_booster'      =>  $i->post('status_booster'),
          'slug'      =>  $slug);

        $this->M_paket_booster->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil menambahkan data <strong> Paket Boster Baru</strong></center>');
        redirect('/admin/paket_booster');
      }
    }       
  
  public function edit($slug) {          
    $edit  = $this->M_paket_booster->detail($slug);

    $bab_booster = $this->M_bab_booster->select_bab_booster($edit->id_booster);
    $semua  = $this->M_bab_booster->count_semua($edit->id_booster);
    $publish  = $this->M_bab_booster->count_published($edit->id_booster);
    $pending  = $this->M_bab_booster->count_pending($edit->id_booster);
    $bab_publish = $this->M_bab_booster->select_bab_published($edit->id_booster);
    $bab_pending = $this->M_bab_booster->select_bab_pending($edit->id_booster);
     
  
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
        'bab_booster' => $bab_booster,
        'semua' =>  $semua,
        'publish' =>  $publish,  
        'pending' =>  $pending,   
        'bab_publish' =>  $bab_publish,
        'bab_pending' =>  $bab_pending,  
        'isi'   => 'admin/paket_booster_E'
      );
      $this->load->view("admin/layout/wrapper", $data, false);
      

    }else{
        $i  = $this->input;
        $slug = url_title($this->input->post('kode_paket'), 'dash', TRUE);
        $data = array(
          'nama_booster'         =>  $i->post('nama_booster'),
          'desk_booster'            =>  $i->post('desk_booster'),
          'harga_booster'       =>  $i->post('harga_booster'),
          'kode_paket'       =>  $i->post('kode_paket'),
          'created'       =>  $i->post('created'),
          'status_booster'      =>  $i->post('status_booster'),
          'slug'      =>  $slug);

        $this->M_paket_booster->edit($data,$slug);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Paket Boster </strong></center>');
        redirect('/admin/paket_booster');
      }
    }

  public function delete($id) {
    $data = array('id'  =>  $id);
    $this->M_paket_booster->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/paket_booster');
  }

   public function add_bab($slug) {    
    
    $add_bab = $this->M_paket_booster->detail($slug);
    $paket = $this->M_paket_booster->select_bab($add_bab->id_booster);
      // echo "<pre>";
      // print_r($paket);
      // exit();

    $valid = $this->form_validation;
    $valid->set_rules(
      'id_booster',
      'id_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan ID Booster.') 
    );
    
    $valid->set_rules(
      'nama_bab_booster',
      'nama_bab_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama BAB Booster.')
    );
    $valid->set_rules(
      'time_bab_booster',
      'time_bab_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Waktu BAB Booster.')
    );
    $valid->set_rules(
      'status_bab_booster',
      'status_bab_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Status BAB Booster.')
    );
    $valid->set_rules( 
      'kode_soal',
      'kode_soal',   
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Soal.')
    );

    if ($valid->run()===false) {
      $data = array(
        'title'   => 'Dasboard Admin Ukai - Ubah BAB Booster',  
        'paket' => $paket, 
        'add_bab' => $add_bab, 
        'isi' => 'admin/paket_bab_booster_t'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{   
        $i  = $this->input;
        $slug = url_title($this->input->post('kode_soal'), 'dash', TRUE);
        $data = array(
          'id_booster'            =>  $i->post('id_booster'),
          'nama_bab_booster'       =>  $i->post('nama_bab_booster'),
          'desk_bab_booster'       =>  $i->post('desk_bab_booster'),
          'time_bab_booster'       =>  $i->post('time_bab_booster'),
          'status_bab_booster'      =>  $i->post('status_bab_booster'),
          'kode_soal'             =>  $i->post('kode_soal'),
          'slug'      =>  $slug);

        $this->M_bab_booster->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil menambahkan data <strong> BAB Booster Baru</strong></center>');
        redirect('/admin/paket_booster/edit/'.$add_bab->slug);
      }   
    }

     public function edit_bab($slug) {  
    $edit  = $this->M_bab_booster->detail($slug); 
    $paket_booster = $this->M_paket_booster->select_paket_booster($edit->id_booster);  

    $soal = $this->M_soal->listing();
    // echo "<pre>";
    // print_r($paket_booster);
    // exit();
    $valid = $this->form_validation;
    $valid->set_rules(
      'id_booster',  
      'id_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan ID Booster.') 
    );
    
    $valid->set_rules(
      'nama_bab_booster',
      'nama_bab_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Nama BAB Booster.')
    );
    $valid->set_rules(
      'time_bab_booster',
      'time_bab_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Waktu BAB Booster.')
    );
    $valid->set_rules(
      'status_bab_booster',
      'status_bab_booster',
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Status BAB Booster.')
    );
    $valid->set_rules(
      'kode_soal',
      'kode_soal',   
      'required',
      array(
        'required'  =>  'Anda belum mengisikan Kode Soal.')
    );

    if ($valid->run()===false) {
      $data = array(
        'title' => 'Dasboard Admin Ukai- Tambah BAB Booster',  
        'edit'  => $edit, 
        'soal' => $soal, 
        'paket_booster'  => $paket_booster,  
        'isi'   => 'admin/paket_bab_booster_e'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $slug = url_title($this->input->post('kode_soal'), 'dash', TRUE);
        $data = array(  
          'id_booster'             =>  $i->post('id_booster'),
          'nama_bab_booster'       =>  $i->post('nama_bab_booster'),
          'desk_bab_booster'       =>  $i->post('desk_bab_booster'),
          'time_bab_booster'       =>  $i->post('time_bab_booster'),
          'status_bab_booster'     =>  $i->post('status_bab_booster'),
          'kode_soal'              =>  $i->post('kode_soal'),
          'slug'      =>  $slug);

        $this->M_bab_booster->edit($data,$slug);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Bab Booster Baru</strong></center>');
        redirect('/admin/paket_booster/edit/'.$edit->slug);
      }
    }

  public function delete_bab($id) {
    $data = array('id'  =>  $id);
    $this->M_bab_booster->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/bab_booster');
  }

  public function add_soal($id_bab_booster) {  
    $paket_bab_booster = $this->M_bab_booster->select_bab_published();
    $soal_bab_booster = $this->M_bab_booster->detail($id_bab_booster);

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
        'paket_bab_booster' => $paket_bab_booster,   
        'soal_bab_booster' => $soal_bab_booster,  
        'isi' => 'admin/paket_booster_soal_t'
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
          'kunci_soal'      =>  $i->post('kunci_soal'),
          'pembahasan_soal'      =>  $i->post('pembahasan_soal'));

        $this->M_soal->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Menambahkan data <strong> Soal Baru</strong></center>');
        redirect('/admin/paket_booster/edit_bab/'.$soal_bab_booster->id_bab_booster);
      }   
    }


   public function edit_soal($id_soal) {    
    $edit  = $this->M_soal->detail_booster($id_soal); 
    $bab_booster = $this->M_bab_booster->select_bab_booster();

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
        'isi'   => 'admin/paket_booster_soal_e'
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
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Soal Reguler </strong></center>');
        redirect('/admin/paket_booster/edit_bab/'.$edit->id_bab_booster);
      }
    }

    public function delete_soal($id) {
    $soal  = $this->M_soal->detail($id); 
    $data = array(
      'id'  =>  $id,
      'soal'=>  $soal);
    $this->M_paket_bab_booster->delete($data);
    $this->M_soal->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/paket_bab_booster/edit/'.$soal->id_bab_booster);
  }


}

/* End of file paket_booster.php */
/* Location: ./application/controllers/admin/paket_booster.php */