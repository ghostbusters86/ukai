<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jawab_soal extends CI_Model {

	public function __construct()
    {
      parent::__construct();
      $this->load->database(); 
    }

    public function detail_reguler($kode_soal)
    {
      $this->db->select('*');
      $this->db->from('transaksi');  
      $this->db->join('paket_reguler', 'paket_reguler.kode_paket = transaksi.kode_paket');
      $this->db->where('paket_reguler.kode_soal', $kode_soal);
      $this->db->where('transaksi.id_user', $this->session->userdata('id_user'));
      $query  = $this->db->get();
      return $query->row();
    }
    public function get_user()
    {
      $this->db->select('*');
      $this->db->from('user');  
      $this->db->where('id_user', $this->session->userdata('id_user'));
      $query  = $this->db->get();
      return $query->row();
    }
    public function get_paket($kode_mulai)
    {
      $this->db->select('*');
      $this->db->from('ambil_soal');  
      $this->db->join('paket_reguler', 'paket_reguler.kode_soal = ambil_soal.kode_soal');
      $this->db->join('user', 'user.id_user = ambil_soal.id_user');
      $this->db->where('kode_mulai', $kode_mulai);
      $query  = $this->db->get();
      return $query->row();
    }
    public function get_indikator($kode_mulai)
    {
      $this->db->select('soal.id_soal as id_soal');
      $this->db->from('jawaban');  
      $this->db->join('soal', 'soal.id_soal = jawaban.id_soal');
      $this->db->where('kode_mulai', $kode_mulai);
      $this->db->order_by('id_jawaban','ASC');
      $query  = $this->db->get();
      return $query->result();
    }
    public function set_jawaban($kode_soal)
    {
      $this->db->select('id_soal');
      $this->db->from('soal');  
      $this->db->where('kode_soal', $kode_soal);
      $this->db->order_by('RAND()');
      $query  = $this->db->get();
      return $query->result();
    }
    public function soal_1($id_soal)
    {
      $this->db->select('id_soal as id_soal, pertanyaan as pertanyaan, jawaban_a as jawaban_a, jawaban_b as jawaban_b,jawaban_c as jawaban_c,jawaban_d as jawaban_d,jawaban_e as jawaban_e');
      $this->db->from('soal');  
      $this->db->where('id_soal', $id_soal);
      $query  = $this->db->get();
      return $query->row();
    }
    public function get_soal($id_soal)
    {
      $this->db->select('id_soal as id_soal, pertanyaan as pertanyaan, jawaban_a as jawaban_a, jawaban_b as jawaban_b,jawaban_c as jawaban_c,jawaban_d as jawaban_d,jawaban_e as jawaban_e');
      $this->db->from('soal');  
      $this->db->where('id_soal', $id_soal);
      $query  = $this->db->get();
      return $query->row();
    }
    public function num_rows($id_soal)
    {
      $this->db->select('id_soal as id_soal, pertanyaan as pertanyaan, jawaban_a as jawaban_a, jawaban_b as jawaban_b,jawaban_c as jawaban_c,jawaban_d as jawaban_d,jawaban_e as jawaban_e');
      $this->db->from('soal');  
      $this->db->where('id_soal', $id_soal);
      $query  = $this->db->get();
      return $query->num_rows();
    }

    public function ambil_soal($data)
    {   
        $this->db->insert('ambil_soal', $data);
        return $this->db->insert_id();
    }

    public function insert_jawaban($data)
    {   
        $this->db->insert('jawaban', $data);
    }



}

/* End of file M_soal.php */
/* Location: ./application/models/M_soal.php */