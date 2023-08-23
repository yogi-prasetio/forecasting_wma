<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('UserModel');
        $this->load->model('BarangModel');
        $this->load->model('PesananModel');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()	{
		$this->load->view('index');
	}

	public function Dashboard()	{
		$data['title'] = "Dashboard";

		$data['jml_pelanggan'] = $this->UserModel->getCustomerCount();
		$data['jml_stok'] = $this->BarangModel->getStok();
		$data['jml_transaksi'] = $this->PesananModel->getPesananCount();
		$isi =  $this->template->load('admin/Dashboard',$data);
		$this->load->view('Template', $data);
	}

	public function Utama()	{
		$data['title'] = "Dashboard";
		$id_user = $_SESSION['id_user'];
		$data['jml_stok'] = $this->BarangModel->getStok();
		$data['jml_pesanan'] = $this->PesananModel->getPesananUserCount($id_user);
		$isi =  $this->template->load('pelanggan/Dashboard',$data);
		$this->load->view('Template', $data);
	}

}
