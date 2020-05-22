<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jawaban extends CI_Model {

	public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function select_jawaban()
    {
      $this->db->select('*');
      $this->db->from('jawaban');  
      $this->db->order_by('id_jawaban', 'DESC');  
      $query  = $this->db->get();
      return $query->result();
    }
    public function delete($data)
    {
      $this->db->where('id_jawaban',$data['id']);
      $this->db->delete('jawaban');
    }
    public function add($data)
    {
        $this->db->insert('jawaban', $data);
    }

    public function detail($id_jawaban){
      $query=$this->db->get_where('jawaban',array('id_jawaban'=> $id_jawaban));
      return $query->row();
    }

    public function edit($data,$id_jawaban){
      $this->db->where('id_jawaban',$id_jawaban);
      $this->db->update('jawaban',$data);
    }


}

/* End of file M_jawaban.php */
/* Location: ./application/models/M_jawaban.php */