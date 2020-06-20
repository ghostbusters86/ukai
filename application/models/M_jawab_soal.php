<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jawab_soal extends CI_Model {

	public function __construct()
    {
      parent::__construct();
      $this->load->database(); 
    }

    public function detail_reguler($kode_paket)
    {
      $this->db->select('*');
      $this->db->from('transaksi');  
      $this->db->join('paket_reguler', 'paket_reguler.kode_paket = transaksi.kode_paket');
      $this->db->where('paket_reguler.kode_paket', $kode_paket);
      $this->db->where('transaksi.id_user', $this->session->userdata('id_user'));
      $query  = $this->db->get();
      return $query->row();
    }
    public function detail_booster($slug)
    {
      $this->db->select('*');
      $this->db->from('transaksi');  
      $this->db->join('paket_booster', 'paket_booster.kode_paket = transaksi.kode_paket');
      $this->db->where('paket_booster.slug', $slug);
      $this->db->where('transaksi.id_user', $this->session->userdata('id_user'));
      $query  = $this->db->get();
      return $query->row();
    }
    public function detail_bab_booster($kode_soal)
    {
      $this->db->select('*');
      $this->db->from('bab_booster'); 
      $this->db->join('paket_booster', 'paket_booster.id_booster = bab_booster.id_booster'); 
      $this->db->where('kode_soal', $kode_soal);
      $query  = $this->db->get();
      return $query->row();
    }
    public function bab_booster($id_booster)
    {
      $this->db->select('*,bab_booster.kode_soal as kode_soal');
      $this->db->from('bab_booster');  
       $this->db->join('ambil_soal', 'bab_booster.kode_soal = ambil_soal.kode_soal','left');
      $this->db->where('id_booster', $id_booster);
      $this->db->where('status_bab_booster', '1');
      $query  = $this->db->get();
      return $query->result();
    }
    public function update_jawab($data){
      $this->db->where('id_soal',$data['id_soal']);
      $this->db->where('kode_mulai',$data['kode_mulai']);
      $this->db->update('jawaban',$data);
    }
    public function update_score($data){
      $this->db->where('kode_mulai',$data['kode_mulai']);
      $this->db->update('ambil_soal',$data);
    }
    public function count_sudah($kode_mulai)
    {
      $this->db->select('*');
      $this->db->from('jawaban');
      $this->db->where('kode_mulai', $kode_mulai);
      $this->db->where('status_answer', '1');
      $user  =   $this->db->count_all_results();
      return $user;
    }
    public function count_belum($kode_mulai)
    {
      $this->db->select('*');
      $this->db->from('jawaban');
      $this->db->where('kode_mulai', $kode_mulai);
      $this->db->where('status_answer', '0');
      $user  =   $this->db->count_all_results();
      return $user;
    }
    public function count_ragu($kode_mulai)
    {
      $this->db->select('*');
      $this->db->from('jawaban');
      $this->db->where('kode_mulai', $kode_mulai);
      $this->db->where('status_answer', '2');
      $user  =   $this->db->count_all_results();
      return $user;
    }
    public function count_jawaban($kode_mulai)
    {
      $this->db->select('jawaban.jawaban as jawab, soal.kunci_soal as kunci');
      $this->db->from('jawaban');
      $this->db->join('soal', 'soal.id_soal = jawaban.id_soal');
      $this->db->where('kode_mulai', $kode_mulai);
      $query  =   $this->db->get();
      return $query->result();
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
    public function get_paket_booster($kode_mulai)
    {
      $this->db->select('*');
      $this->db->from('ambil_soal');  
      $this->db->join('bab_booster', 'bab_booster.kode_soal = ambil_soal.kode_soal');
      $this->db->join('paket_booster', 'paket_booster.kode_paket = ambil_soal.kode_paket');
      $this->db->join('user', 'user.id_user = ambil_soal.id_user');
      $this->db->where('kode_mulai', $kode_mulai);
      $query  = $this->db->get();
      return $query->row();
    }
    public function get_indikator($kode_mulai)
    {
      $this->db->select('soal.id_soal as id_soal,jawaban.jawaban as jawaban, jawaban.status_answer as status_answer');
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
    public function pembahasan1($id_soal)
    {
      $this->db->select('*');
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
    public function get_pembahasan($id_soal)
    {
      $this->db->select('*');
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