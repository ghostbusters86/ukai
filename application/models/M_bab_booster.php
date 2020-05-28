<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bab_booster extends CI_Model {

	 Public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function select_bab_booster()
    {
      $this->db->select('bab_booster.*, paket_booster.*');
      $this->db->from('bab_booster');
      $this->db->join('paket_booster', 'paket_booster.id_booster = bab_booster.id_booster', 'left');
      $this->db->order_by('id_bab_booster', 'DESC');  
      $query  = $this->db->get();
      return $query->result();
    }
     
      public function count_semua()  
    {      
      $this->db->select('*');
      $this->db->from('bab_booster');
      $publish  =   $this->db->count_all_results();
      return $publish;
    }
    public function count_published()
    {
      $this->db->select('*');
      $this->db->from('bab_booster');
      $this->db->where('status_bab_booster', '1');
      $publish  =   $this->db->count_all_results();
      return $publish;
    }   
    public function count_pending()
    {
      $this->db->select('*');     
      $this->db->from('bab_booster');
      $this->db->where('status_bab_booster', '0');
      $pending  =   $this->db->count_all_results();
      return $pending;
    }
    public function select_bab_published()
    {
      $this->db->select('bab_booster.*, paket_booster.*');
      $this->db->from('bab_booster');
      $this->db->join('paket_booster', 'paket_booster.id_booster = bab_booster.id_booster', 'left');
      $this->db->where('status_bab_booster', '1');
      $this->db->order_by('id_bab_booster', 'DESC');
      $query  = $this->db->get();
      return $query->result();  
    }
    public function select_bab_pending()
    {
      $this->db->select('bab_booster.*, paket_booster.*');
      $this->db->from('bab_booster');
      $this->db->join('paket_booster', 'paket_booster.id_booster = bab_booster.id_booster', 'left');
      $this->db->where('status_bab_booster', '0');
      $this->db->order_by('id_bab_booster', 'DESC');
      $query  = $this->db->get();
      return $query->result();
    }

    public function delete($data)
    {
      $this->db->where('id_bab_booster',$data['id']);
      $this->db->delete('bab_booster');
    }
    public function add($data)  
    {  
        $this->db->insert('bab_booster', $data);
    }

    public function detail($id_bab_booster){
      $query = $this->db->get_where('bab_booster',array('id_bab_booster'=> $id_bab_booster));
      return $query->row();
    }

    public function edit($data,$id_bab_booster){
      $this->db->where('id_bab_booster',$id_bab_booster);
      $this->db->update('bab_booster',$data);
    }

}  

/* End of file M_bab_booster.php */
/* Location: ./application/models/M_bab_booster.php */