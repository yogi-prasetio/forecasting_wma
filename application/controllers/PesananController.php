<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesananController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('PesananModel');    
    $this->load->model('UserModel');    
    $this->load->model('BarangModel');
    $this->load->library('fpdf');
    $this->load->library('form_validation');
  }	        

  public function index() {
    $data['title'] = 'Data Pesanan';
    $data['pesanan']= $this->PesananModel->load();
    $data['stok']= $this->BarangModel->getStokSisa();
    $isi =  $this->template->load('admin/Pesanan',$data);
    $this->load->view('Template',$isi);
  }

  public function AddPesanan() {
    $data['title'] = 'Pemesanan Barang';
    $data['pelanggan']= $this->UserModel->load();
    $data['barang']= $this->BarangModel->loadStok();

    $isi =  $this->template->load('admin/FormPesanan',$data);
    $this->load->view('Template',$isi);
  }

  public function Insert(){
    $id_barang = $this->input->post('id_barang');
    $id_user = $this->input->post('id_user');
    $tgl_penjualan = $this->input->post('tgl_penjualan');
    $jumlah_barang = $this->input->post('jumlah_barang');
    $tipe_pesanan = $this->input->post('tipe_pesanan');

    // $this->form_validation->set_rules();

    $result = $this->PesananModel->insert($id_barang, $id_user, $tgl_penjualan, $jumlah_barang, $tipe_pesanan);
    if ($result){
      if($_SESSION['role']=="admin"){
        $this->session->set_flashdata('success','Data berhasil disimpan!');
        redirect('PesananController');
      } else {
        $this->session->set_flashdata('success','Barang berhasil dipesan!');
        redirect("PesananController/GetPesanan/$id_user");
      }
    } else {
      $this->session->set_flashdata('failed','Data gagal disimpan!');
    }   
  }

  public function GetPesanan(){
    $data['title'] = 'Riwayat Pesanan';
    $data['pesanan'] = $this->PesananModel->GetPesanan($this->uri->segment(3));
    $isi= $this->template->load('pelanggan/GetPesanan',$data);
    $this->load->view('Template',$isi);
  }

  public function Logbook() {
    $data['title'] = 'Logbook Penjualan';
    $data['pesanan']= $this->PesananModel->load();
    $isi =  $this->template->load('admin/Logbook',$data);
    $this->load->view('Template',$isi);
  }

  function CetakLogbook(){
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $penjualan = $tahun."-".$bulan;

    $bulanstr = array('01' => 'JANUARI', '02' => 'FEBRUARI', '03' => 'MARET', '04' => 'APRIL', '05' => 'MEI', '06' => 'JUNI', '07' => 'JULI', '08' => 'AGUSTUS', '09' => 'SEPTEMBER', '10' => 'OKTOBER', '11' => 'NOVEMBER', '12' => 'DESEMBER');

    #ambil data di tabel dan masukkan ke array
    $query = $this->db->query("SELECT * FROM tbl_penjualan WHERE mid(tgl_penjualan, 1,7) = '$penjualan'");
    $data = array();
    foreach ($query->result() as $row) {
      array_push($data, $row);
    }

    if ($data==NULL){
      $this->session->set_flashdata('failed','Data Logbook tidak tersedia!');
      redirect('PesananController/Logbook');
    }

    #setting judul laporan dan header tabel
    $judul = "LOGBOOK PENJUALAN GAS PANGKALAN DADAN";
    $subjudul = "PERIODE $bulanstr[$bulan] $tahun";
    $header = array(
      array("label"=>"NO", "length"=>10, "align"=>"C"),
      array("label"=>"NAMA PELANGGAN", "length"=>50, "align"=>"C"),
      array("label"=>"TANGGAL TRANSAKSI", "length"=>45, "align"=>"C"),
      array("label"=>"JUMLAH BARANG", "length"=>35, "align"=>"C"),
      array("label"=>"SUB TOTAL", "length"=>30, "align"=>"C")    );

    $pdf = new FPDF();
    $pdf->SetTitle('Logbook Penjualan', TRUE);
    $pdf->SetMargins(20, 20, 20);
    $pdf->AddPage('P','A4', 0);

    #tampilkan judul laporan
    $pdf->SetFont('Arial','B','16');
    $pdf->Cell(0,5, $judul, '0', 2, 'C');
    $pdf->Ln();
    $pdf->Cell(0,5, $subjudul, '0', 1, 'C');
    $pdf->Ln();

    #buat header tabel
    $pdf->SetFont('Arial','B','10');
    $pdf->SetFillColor(153,204,255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(128);
    foreach ($header as $kolom) {
      $pdf->Cell($kolom['length'], 10, $kolom['label'], 1, '0', $kolom['align'], true);
    }
    $pdf->Ln();

    #tampilkan data tabelnya
    $pdf->SetFillColor(231,237,242);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    $fill=false;
    $no=1;
    $i=0;
    $total_barang=0;
    $total=0;
    foreach ($data as $row) {
      $bulanpenjualan = substr($row->tgl_penjualan, 0,-3);

      $que = $this->db->query("SELECT nama_user FROM tbl_user WHERE id_user = $row->id_user");
      $que2 = $this->db->query("SELECT harga FROM tbl_barang WHERE mid(bulan, 1, 7) = '$bulanpenjualan' LIMIT 1");
      foreach ($que->result() as $r) {
        foreach ($que2->result() as $val) {
          $subtotal = $row->jumlah_barang * $val->harga;

          $pdf->Cell($header[$i]['length'], 8, $no++, 1,'0', $kolom['align'], $fill);
          $pdf->Cell($header[$i+1]['length'], 8, $r->nama_user,1,'0', 'L', $fill);
          $pdf->Cell($header[$i+2]['length'], 8, $row->tgl_penjualan,1,'0', $kolom['align'], $fill);
          $pdf->Cell($header[$i+3]['length'], 8, $row->jumlah_barang,1,'0', $kolom['align'], $fill);
          $pdf->Cell($header[$i+4]['length'], 8, 'Rp. '.$subtotal,1,'0', 'R', $fill);
        }         
      }
      $fill = !$fill;
      $pdf->Ln();
      $total_barang+=$row->jumlah_barang;
      $total+=$subtotal;
    }
    $pdf->SetFont('Arial','B','10');
    $pdf->Cell(105, 8, 'TOTAL',1,'0', 'C',true);
    $pdf->Cell(35, 8, $total_barang,1,'0', 'C',true);
    $pdf->Cell(30, 8, 'Rp. '.$total,1,'0', 'R',true);

    #output file PDF
    $pdf->Output('I', 'Logbook Penjualan.pdf');
  }
}
