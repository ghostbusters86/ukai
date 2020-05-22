<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

     Public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function select_transaksi()
    {
      $this->db->select('*');
      $this->db->from('transaksi');  
      $this->db->order_by('id_transaksi', 'DESC');  
      $query  = $this->db->get();
      return $query->result();
    }
    public function delete($data)
    {
      $this->db->where('id_transaksi',$data['id']);
      $this->db->delete('transaksi');
    }
    public function add($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function detail($id_transaksi){
      $query=$this->db->get_where('transaksi',array('id_transaksi'=> $id_transaksi));
      return $query->row();
    }

    public function edit($data,$id_transaksi){
      $this->db->where('id_transaksi',$id_transaksi);
      $this->db->update('transaksi',$data);
    }

}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */