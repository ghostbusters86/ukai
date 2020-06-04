<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

   Public function __construct() {
      parent::__construct();
      $this->load->database();
  }   

  public function get_user($id_user){
    $id_user = $this->session->userdata('id_user');
    $this->db->where('id_user',$id_user);
    $this->db->select('*');
    $this->db->from('user');
    $query =$this->db->get();
    return $query->row_array();
}
public function select_user() {
  $this->db->select('*');   
  $this->db->from('user');
  $this->db->order_by('id_user', 'DESC');
  $query  = $this->db->get();
  return $query->result();
}
public function delete($data) {
  $this->db->where('id_user',$data['id']);
  $this->db->delete('user');
}
public function add($data) {
    $this->db->insert('user', $data);
}

public function detail($id_user) {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id_user', $id_user);
    $query  = $this->db->get();
    return $query->row();
}

    public function edit($data,$id_user){
      $this->db->where('id_user',$id_user);
      $this->db->update('user',$data);
    }

    //fungsi cek level
function akses_level() {
    return $this->session->userdata('akses_level');
}

    //fungsi check login
    public function login_user() {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );

        $query = $this->db->get_where('user', $data);

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_login()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );
        
        $query = $this->db->get_where('user', $data);
        return $query;
    }


}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */