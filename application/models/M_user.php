<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

   Public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function select_user()
    {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->order_by('id_user', 'DESC');
      $query  = $this->db->get();
      return $query->result();
    }
    public function delete($data)
    {
      $this->db->where('id_user',$data['id']);
      $this->db->delete('user');
    }
    public function add($data)
    {
        $this->db->insert('user', $data);
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id);
        $query  = $this->db->get();
        return $query->row();
    }

    public function update($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user',$data);
    }
    //fungsi cek level
    function akses_level()
    {
        return $this->session->userdata('akses_level');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }


}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */