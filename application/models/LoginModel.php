<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class LoginModel extends CI_Model{

  function __construct() {
    parent::__construct();
  }

  function login($username, $password){
   $this->db->select('*');
   $this->db->from('tbl_user');
   $this->db->where('username', $username);
   $this->db->where('password', $password); 
   $this->db->limit(1);
   $query = $this->db->get();
   return ($query->num_rows() > 0) ? $query->row() : FALSE;
 }

 function register($nama, $alamat, $no_hp, $username, $password){
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

}