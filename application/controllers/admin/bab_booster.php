  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bab_booster extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('M_bab_booster');
    $this->load->model('M_paket_booster');
    $this->load->helper('text');
  }

  public function index() {
    $bab_booster = $this->M_bab_booster->select_bab_booster();

    $semua  = $this->M_bab_booster->count_semua();
    $publish  = $this->M_bab_booster->count_publish();
    $pending  = $this->M_bab_booster->count_pending();
    $bab_publish = $this->M_bab_booster->select_bab_publish();
    $bab_pending = $this->M_bab_booster->select_bab_pending();

    $data = array(   
      'title' => 'Dasboard Admin UKAI',
      'bab_booster' => $bab_booster,
      'semua' =>  $semua,
      'publish' =>  $publish,  
      'pending' =>  $pending,
      'bab_publish' =>  $bab_publish,
      'bab_pending' =>  $bab_pending,
      'isi' => 'admin/bab_booster/bab_booster_V'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }
 
    public function add() {  
    $paket_booster = $this->M_paket_booster->select_paket_booster();

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
        'paket_booster' => $paket_booster, 
        'isi' => 'admin/bab_booster/bab_booster_T'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(
          'id_booster'            =>  $i->post('id_booster'),
          'nama_bab_booster'       =>  $i->post('nama_bab_booster'),
          'desk_bab_booster'       =>  $i->post('desk_bab_booster'),
          'time_bab_booster'       =>  $i->post('time_bab_booster'),
          'status_bab_booster'      =>  $i->post('status_bab_booster'),
          'kode_soal'=>  $i->post('kode_soal'));

        $this->M_bab_booster->add($data);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil menambahkan data <strong> BAB Booster Baru</strong></center>');
        redirect('/admin/bab_booster');
      }
    }

  public function edit($id_bab_booster) {  
    $paket_booster = $this->M_paket_booster->select_paket_booster();  
    $edit  = $this->M_bab_booster->detail($id_bab_booster); 

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
        'paket_booster'  => $paket_booster,  
        'isi'   => 'admin/bab_booster/bab_booster_E'
      );
      $this->load->view("admin/layout/wrapper", $data, false);

    }else{
        $i  = $this->input;
        $data = array(  
          'id_booster'             =>  $i->post('id_booster'),
          'nama_bab_booster'       =>  $i->post('nama_bab_booster'),
          'desk_bab_booster'       =>  $i->post('desk_bab_booster'),
          'time_bab_booster'       =>  $i->post('time_bab_booster'),
          'status_bab_booster'     =>  $i->post('status_bab_booster'),
          'kode_soal'              =>  $i->post('kode_soal'));

        $this->M_bab_booster->edit($data,$id_bab_booster);
        $this->session->set_flashdata('notifikasi', '<center>Berhasil Merubah data <strong> Bab Booster Baru</strong></center>');
        redirect('/admin/bab_booster');
      }
    }

  public function delete($id) {
    $data = array('id'  =>  $id);
    $this->M_bab_booster->delete($data);
    $this->session->set_flashdata('notifikasi', '<center>Berhasil menghapus data');
    redirect('admin/bab_booster');
  }


}

/* End of file bab_booster.php */
/* Location: ./application/controllers/admin/bab_booster.php */