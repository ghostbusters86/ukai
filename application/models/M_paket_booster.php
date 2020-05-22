<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paket_booster extends CI_Model {

	Public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function select_paket_booster()
    {
      $this->db->select('*');
      $this->db->from('paket_booster');  
      $this->db->order_by('id_booster', 'DESC');  
      $query  = $this->db->get();
      return $query->result();
    }

    public function count_semua()
    {
      $this->db->select('*');
      $this->db->from('paket_booster');
      $status_booster  =   $this->db->count_all_results();
      return $status_booster;
    }
    public function count_publish()  
    {
      $this->db->select('*');
      $this->db->from('paket_booster');
      $this->db->where('status_booster', '1');
      $status_booster  =   $this->db->count_all_results();
      return $status_booster;
    }
    public function count_pending()
    {
      $this->db->select('*');   
      $this->db->from('paket_booster');
      $this->db->where('status_booster', '0');
      $status_booster  =   $this->db->count_all_results();
      return $status_booster;
    }
    public function select_paket()
    {
      $this->db->select('*');
      $this->db->from('paket_booster a');  
      $this->db->order_by('id_booster', 'DESC');
      $query  = $this->db->get();
      return $query->result();
    }
    public function select_published()
    {
      $this->db->select('*');
      $this->db->from('paket_booster a');
      $this->db->where('status_booster', '0');
      $this->db->order_by('id_booster', 'DESC');
      $query  = $this->db->get();
      return $query->result();
    }
    public function select_pending()
    {
      $this->db->select('*');
      $this->db->from('paket_booster a');
      $this->db->where('status_booster', '1');
      $this->db->order_by('id_booster', 'DESC');
      $query  = $this->db->get();
      return $query->result();
    }

    public function delete($data)   
    {
      $this->db->where('id_booster',$data['id']);
      $this->db->delete('paket_booster');
    }
    public function add($data)
    {
        $this->db->insert('paket_booster', $data);
    }

    public function detail($id_booster){
      $query=$this->db->get_where('paket_booster',array('id_booster'=> $id_booster));
      return $query->row();
    }

    public function edit($data,$id_booster){
      $this->db->where('id_booster',$id_booster);
      $this->db->update('paket_booster',$data);
    }

}

/* End of file M_paket_booster.php */
/* Location: ./application/models/M_paket_booster.php */