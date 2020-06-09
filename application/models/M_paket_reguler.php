<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paket_reguler extends CI_Model {

	Public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function select_paket_reguler()
    {
      $this->db->select('*');
      $this->db->from('paket_reguler');  
      $this->db->order_by('id_reguler', 'DESC');
      $query  = $this->db->get();
      return $query->result();
    }

    public function paket_user()
    {
      $this->db->select('*');
      $this->db->from('paket_reguler');  
      $this->db->order_by('id_reguler', 'DESC');
      $query  = $this->db->get();
      return $query->result();
    }
                 
    public function count_semua()  
    {
      $this->db->select('*');
      $this->db->from('paket_reguler');
      $publish  =   $this->db->count_all_results();
      return $publish;
    }
    public function count_published()
    {
      $this->db->select('*');
      $this->db->from('paket_reguler');
      $this->db->where('status_reguler', '1');  
      $publish =   $this->db->count_all_results();
      return $publish;  
    }
    public function count_pending()
    {
      $this->db->select('*');   
      $this->db->from('paket_reguler');
      $this->db->where('status_reguler', '0');
      $pending  =   $this->db->count_all_results();
      return $pending;
    }  

    public function select_published()
    { 
      $this->db->select('*');
      $this->db->from('paket_reguler');
      $this->db->where('status_reguler', '1');  
      $this->db->order_by('id_reguler', 'DESC');
      $query  = $this->db->get();  
      return $query->result();
    }
    public function select_pending()
    {
      $this->db->select('*');
      $this->db->from('paket_reguler');
      $this->db->where('status_reguler', '0');
      $this->db->order_by('id_reguler', 'DESC');
      $query  = $this->db->get();
      return $query->result();
    }  

    public function soal_reguler($id_reguler) {
      $this->db->select('*');
      $this->db->from('paket_reguler');
      $this->db->where('id_reguler',$id_reguler); 
      $query = $this->db->get();
      return $query->row();  
    } 
    
    public function select_soal($id_reguler)
    { 
      $this->db->select('*');
      $this->db->from('paket_reguler');
      $this->db->where('id_reguler', $id_reguler);  
      $this->db->order_by('id_reguler', 'DESC');
      $query  = $this->db->get();  
      return $query->row();
    }  
     
    public function delete($data)   
    {  
      $this->db->where('id_reguler',$data['id']);
      $this->db->delete('paket_reguler');
    }     
    public function add($data)
    {
        $this->db->insert('paket_reguler', $data);   
    }

    // public function detail($id_reguler){
    //   $query=$this->db->get_where('paket_reguler',array('id_reguler'=> $id_reguler));
    //   return $query->row();
    // }

    public function detail($id_reguler)   
    {
      $this->db->select('paket_reguler.*');
      $this->db->from('paket_reguler');  
      $this->db->where('id_reguler',$id_reguler);
      $query  = $this->db->get();
      return $query->row();
    }

    public function get_frontend($slug)   
    {
      $this->db->select('paket_reguler.*');
      $this->db->from('paket_reguler');  
      $this->db->where('slug',$slug);
      $query  = $this->db->get();
      return $query->row();
    }
  
    public function edit($data,$id_reguler){
      $this->db->where('id_reguler',$id_reguler);
      $this->db->update('paket_reguler',$data);
    }

}

/* End of file M_paket_reguler.php */
/* Location: ./application/models/M_paket_reguler.php */