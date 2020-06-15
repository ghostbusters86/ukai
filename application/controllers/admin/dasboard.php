<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {

  public function __construct()
  {   

    parent::__construct();
    $this->load->model('M_dasbor');
  }

  function index() {
    $peserta = $this->M_dasbor->count_peserta();
    $reguler = $this->M_dasbor->count_reguler();
    $booster = $this->M_dasbor->count_booster();
    $soal = $this->M_dasbor->count_soal();
    $universitas = $this->M_dasbor->count_university();
    $data = array(
      'title' => 'Dasboard Admin UKAI',
      'peserta' => $peserta,
      'reguler' => $reguler,
      'booster' => $booster,
      'soal' => $soal,
      'universitas' => $universitas,
      'isi' => 'admin/dasboard'
    );
    $this->load->view("admin/layout/wrapper", $data, false);
  }

}