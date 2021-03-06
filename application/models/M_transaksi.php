<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

     Public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function get_no_inv() {
      $q = $this->db->query("SELECT MAX(RIGHT(kode_transaksi,4)) AS kd_max FROM transaksi");
      $kd = "";
      if($q->num_rows()>0){
        foreach($q->result() as $k){
          $tmp = ((int)$k->kd_max)+1;
          $kd = sprintf("%04s", $tmp);
        }
      }else{
        $kd = "0001";
      }        
      $tp = '@TU2';
      return $tp . $kd;  
    }
    public function select_transaksi_reguler()
    {
      $this->db->select('*');
      $this->db->from('transaksi'); 
      $this->db->join('paket_reguler', 'paket_reguler.kode_paket = transaksi.kode_paket'); 
      $this->db->join('user', 'user.id_user = transaksi.id_user'); 
      $this->db->order_by('transaksi.id_transaksi', 'DESC');  
      $query  = $this->db->get();
      return $query->result();
    }
    public function select_transaksi_booster()
    {
      $this->db->select('*');
      $this->db->from('transaksi'); 
      $this->db->join('paket_booster', 'paket_booster.kode_paket = transaksi.kode_paket'); 
      $this->db->join('user', 'user.id_user = transaksi.id_user'); 
      $this->db->order_by('transaksi.id_transaksi', 'DESC');  
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
      $this->db->select('*');
      $this->db->from('transaksi'); 
      $this->db->join('user', 'user.id_user = transaksi.id_user'); 
      $this->db->where('transaksi.id_transaksi', $id_transaksi);  
      $query  = $this->db->get();
      return $query->row();
    }

    public function edit($data,$id_transaksi){
      $this->db->where('id_transaksi',$id_transaksi);
      $this->db->update('transaksi',$data);
    }

}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */