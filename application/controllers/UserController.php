<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('UserModel');    
  }	        

  public function index() {
    $data['title'] = 'Data Pelanggan';
    $data['customer']= $this->UserModel->load();
    $isi =  $this->template->load('admin/User',$data);
    $this->load->view('Template',$isi);
  }

  public function AddPelanggan() {
    $data['title'] = 'Pelanggan';
    $data['type'] = 'Tambah';
    $isi =  $this->template->load('admin/FormUser',$data);
    $this->load->view('Template',$isi);
  }

  public function Insert(){
    $name = $this->input->post('name');
    $alamat = $this->input->post('alamat');
    $no_hp = $this->input->post('no_hp');
    $username = $this->input->post('username');
    $pass = $this->input->post('password');
    $password = md5($pass);

    $result = $this->UserModel->insert($name, $alamat,  $no_hp, $username, $password);
    if($result){
      $this->session->set_flashdata('success','Data pelanggan berhasil ditambahkan!');
      redirect('UserController');   
    } else {
      $this->session->set_flashdata('failed','Data pelanggan berhasil ditambahkan!');
      echo "<script>history.go(-1)</script>";         
    } 
  }

  public function UpdateCustomer() {
    $data['title'] = 'Pelanggan';
    $data['type'] = 'Update';
    $data['customer']= $this->UserModel->getCustomer($this->uri->segment(3));
    $isi =  $this->template->load('admin/FormUser',$data);
    $this->load->view('Template',$isi);
  }
  
  public function Update(){
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $alamat = $this->input->post('alamat');
    $no_hp = $this->input->post('no_hp');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $password = md5($password);

    $result = $this->UserModel->update($id, $name, $alamat, $no_hp, $username, $password);
    if ($result){
      $this->session->set_flashdata('success','Data pelanggan berhasil diperbarui!');
      redirect('UserController');   
    } else {
      echo "<script>history.go(-1)</script>";   
      $this->session->set_flashdata('failed','Data pelanggan berhasil diperbarui!');
    }   
  }

}
