<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');        
    }

    function index() {
        $data['title'] = "Login";
        $this->load->view('Login', $data);
    }

    function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');    

        // Cek Inputan Username dan Password
        if (empty($username) || empty($password)) {
            $data['error']='Username atau Password kosong!';
            $this->load->view('Login',$data);
        } else {
            $password = md5($password);    
            $result = $this->LoginModel->login($username, $password);

            if ($result) {
                //Set Session
                $data = array(
                    'username' => $result->username,
                    'id_user'=> $result->id_user, 
                    'nama' => $result->nama_user, 
                    'role' => $result->role,
                    'login' => TRUE);
                $this->session->set_userdata($data);

                $data['title'] = 'Dashboard';
                if($result->role == 'admin'){
                    redirect('Page/Dashboard');
                } else {
                    redirect('Page/Utama');
                }
            } else {
                //Username atau Password Salah
                $data['error']='Username atau Password salah!';
                $this->load->view('Login',$data);
            }
        }
    }

    function logout() {
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();  
        redirect('LoginController');
    }

    public function Daftar(){
        $this->load->view('Register');       
    }

    public function Register(){
        $name = $this->input->post('name');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $password = md5($pass);
  
        $result = $this->LoginModel->register($name, $alamat, $no_hp, $username, $password);
        if ($result){
            $this->session->set_flashdata('flash','berhasil!');
            redirect('LoginController');
        } else {
            echo "<script>history.go(-1)</script>";   
        }
    }

}