<?php
Class M_login extends CI_Model{
  Public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function login_admin()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );

    $query = $this->db->get_where('tb_admin', $data);

    if ($query->num_rows() == 1) {
      return TRUE;  
    } else {
      return FALSE;
    }
  }

  public function get_admin()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    ); 

    $query = $this->db->get_where('tb_admin', $data);
    return $query;
  }

  public function add($data)
  {
    $this->db->insert('user',$data);
  }
  public function listing(){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->order_by('id_user','DESC');
    $query  = $this->db->get();
    return $query->result();
  }
  public function detail($id){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id_user', $id);
    $this->db->order_by('id','DESC');
    $query  = $this->db->get();
    return $query->row();
  }
  public function edit($data){
    $this->db->where('id_user', $data['id_user']);
    $this->db->update('user', $data);
  }
  public function login($email, $password){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where(array( 'email'  =>  $email,
      'password'  =>  $password));
    $this->db->order_by('id_user','DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row();
  }
  public function delete($data)
  {
    $this->db->where('id_user',$data['id_user']);
    $this->db->delete('user', $data);
  }
}
?>
