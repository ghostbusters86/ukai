<?php
  Class M_dasbor extends CI_Model{
  Public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function count_peserta()
    {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('akses_level !=', 'admin');
      $user  =   $this->db->count_all_results();
      return $user;
    }
    public function count_reguler()
    {
      $this->db->select('*');
      $this->db->from('paket_reguler');
      $reguler  =   $this->db->count_all_results();
      return $reguler;
    }
    public function count_booster()
    {
      $this->db->select('*');
      $this->db->from('paket_booster');
      $booster  =   $this->db->count_all_results();
      return $booster;
    }
    public function count_soal()
    {
      $this->db->select('*');
      $this->db->from('soal');
      $soal =   $this->db->count_all_results();
      return $soal;
    }
    public function count_university()
    {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->group_by("universitas_user");
      $university  =   $this->db->count_all_results();
      return $university;
    }

  }
?>
