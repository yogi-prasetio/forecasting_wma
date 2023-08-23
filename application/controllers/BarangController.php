<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BarangModel');
        $this->load->model('PesananModel');
    }

    public function index(){
        $data['title'] = 'Data Stok Barang';
        $data['barang']= $this->BarangModel->load();
        $isi =  $this->template->load('admin/Barang',$data);
        $this->load->view('Template',$isi);
    }

    public function GetStokBarang(){
        $data['title'] = 'Pemesanan Barang';
        $data['barang']= $this->BarangModel->loadStok();
        $isi =  $this->template->load('pelanggan/Pemesanan',$data);
        $this->load->view('Template',$isi);   
    }

    public function AddBarang(){
        $data['title'] = 'Stok Barang';
        $data['type'] = 'Tambah';
        $data['stok']= $this->BarangModel->getStokSisa();
        $isi =  $this->template->load('admin/FormBarang',$data);
        $this->load->view('Template',$isi);   
    }

    public function Insert(){
        $name = $this->input->post('name');
        $harga = $this->input->post('harga');
        $bulan = $this->input->post('bulan');
        $stok_sisa = $this->input->post('stok_sisa');
        $stok_awal = $this->input->post('stok_awal');
        $stok_ready = $this->input->post('stok_ready');

        $new_stok = $stok_awal+$stok_sisa;
        $data = $this->BarangModel->cekBulan($bulan);
        if($data){
            $id = $data->id_barang;
            $nama = $data->nama_barang;
            $month = $data->bulan;
            $stok_a = $data->stok_awal+$stok_awal;
            $stok = $data->stok_ready+$stok_awal;
            $this->BarangModel->update($id, $name, $month, $harga, $stok_a, $stok);
            $this->session->set_flashdata('success','Data barang diperbarui karena bulan sudah ada!');
            redirect('BarangController');
        } else {
            $this->BarangModel->insert($name, $harga, $bulan, $new_stok, $stok_ready);
            $this->session->set_flashdata('success','Data barang berhasil ditambahkan!');
            redirect('BarangController');
        }
        
    }

    public function UpdateBarang(){
        $data['title'] = 'Stok Barang';
        $data['type'] = 'Update';
        $data['barang']= $this->BarangModel->getBarangById($this->uri->segment(3));
        $isi =  $this->template->load('admin/FormBarang',$data);
        $this->load->view('Template',$isi);   
    }

    public function Update(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $harga = $this->input->post('harga');
        $bulan = $this->input->post('bulan');
        $stok_awal = $this->input->post('stok_awal');
        $stok_ready = $this->input->post('stok_ready');

        $result = $this->BarangModel->update($id, $name, $bulan, $harga, $stok_awal, $stok_ready);
        if ($result){          
          $this->session->set_flashdata('success','Data barang berhasil diperbarui!');
          redirect('BarangController');    
        } else {
          $this->session->set_flashdata('failed','Data barang gagal diperbarui!');
        }   
    }

    public function Delete(){
        $check = $this->PesananModel->GetBarang($this->uri->segment(3));
        if ($check>0){
            $this->session->set_flashdata('failed','Data barang gagal dihapus!');
            redirect('BarangController');
        } else {            
            $this->BarangModel->delete($this->uri->segment(3));
            $this->session->set_flashdata('success','Data barang berhasil dihapus!');
            redirect('BarangController');    
        }
    }
}