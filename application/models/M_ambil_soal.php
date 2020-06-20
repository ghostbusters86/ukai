<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ambil_soal extends CI_Model {

	public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function select_ambil_soal()
    {
      $this->db->select('*');
      $this->db->from('ambil_soal');  
      $this->db->join('user', 'ambil_soal.id_user = user.id_user');
      $this->db->order_by('id_ambil_soal', 'DESC');  
      $query  = $this->db->get();
      return $query->result();
    }
    public function delete($data)
    {
      $this->db->where('id_ambil_soal',$data['id']);
      $this->db->delete('ambil_soal');
    }
    public function delete_jawaban($kode_mulai)
    {
      $this->db->where('kode_mulai',$kode_mulai);
      $this->db->delete('jawaban');
    }
    public function add($data)
    {
        $this->db->insert('ambil_soal', $data);
    }

    public function detail($data){
       $this->db->select('*');
      $this->db->from('ambil_soal');  
      $this->db->where('id_ambil_soal', $data['id']);  
      $query  = $this->db->get();
      return $query->row();
    }

    public function edit($data,$id_ambil_soal){
      $this->db->where('id_ambil_soal',$id_ambil_soal);
      $this->db->update('ambil_soal',$data);
    }

}

/* End of file M_ambil_ambil_soal.php */
/* Location: ./application/models/M_ambil_ambil_soal.php */