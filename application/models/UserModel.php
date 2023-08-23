<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class UserModel extends CI_Model{

  function __construct() {
    parent::__construct();
  }

  function load() {
    $this->db->where('role', 'pelanggan');
    $this->db->order_by('nama_user', 'asc');
    $query = $this->db->get('tbl_user');
    return $query->result();    
  }


  function getCustomer($id) {
    $this->db->where('id_user', $id);
    $query = $this->db->get('tbl_user');
    return $query->result();   
  }

  function getCustomerCount() {
    $this->db->where('role', 'pelanggan');
    $query = $this->db->get('tbl_user');
    return $query->num_rows();
  }

  function insert($nama, $alamat, $no_hp, $username, $password){
    $data = array(
      'nama_user'=>$nama,  
      'alamat'=>$alamat,
      'role'=>'pelanggan',
      'no_hp'=>$no_hp,
      'username'=>$username,      
      'password'=>$password
    );    
    $query = $this->db->insert('tbl_user', $data);
    return $query;
  }

  function update($id, $nama, $alamat, $no_hp, $username, $password){
    $data = array(
      'id_user'=>$id,
      'nama_user'=>$nama,  
      'alamat'=>$alamat,
      'role'=>'pelanggan',
      'no_hp'=>$no_hp,
      'username'=>$username,      
      'password'=>$password
    );    
    $this->db->where('id_user', $id);
    return $this->db->update('tbl_user', $data);     
  }

  function delete($id) {
    $this->db->where('id_user', $id);
    $query = $this->db->delete('tbl_user');
    return $query;
  }

}
