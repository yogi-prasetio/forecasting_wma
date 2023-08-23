<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrediksiController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('PrediksiModel');
    $this->load->model('PesananModel');
    $this->load->library('fpdf');
  }

  public function index(){
    $isi['title'] = 'Prediksi';

    foreach ($this->PrediksiModel->load() as $res){
      $bulan = substr($res->bulan,0,-5);
      $year = substr($res->bulan, -4);
    }

    $bulanint = array('JANUARI'=>'01', 'FEBRUARI'=>'02', 'MARET'=>'03', 'APRIL'=>'04', 'MEI'=>'05', 'JUNI'=>'06', 
      'JULI'=>'07', 'AGUSTUS'=>'08', 'SEPTEMBER'=>'09', 'OKTOBER'=>'10', 'NOVEMBER'=>'11', 'DESEMBER'=>'12');

    if($this->PrediksiModel->load() != NULL){
      $blnprediksi = strtotime($year."-".$bulanint[$bulan]);
      $bln = date('Y-m', $blnprediksi);

      $isi ['penjualan'] = $this->PesananModel->getPenjualanSebelumnya($bln);
      $isi['year'] = $year;

      $isi['prediksi']= $this->PrediksiModel->load();
      $view =  $this->template->load('admin/Prediksi',$isi);
      $this->load->view('Template',$view);
    } else {
      $view =  $this->template->load('admin/Prediksi',$isi);
      $this->load->view('Template',$view);
    }
  }

  public function Prediksi(){
    $bulans = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $bulan_prediksi = strtotime($tahun."-".$bulans);
    $month = date('Y-m', $bulan_prediksi);

    $data = $this->PesananModel->getPenjualanSebelumnya($month);
    $bulantostr = array('01' => 'JANUARI', '02' => 'FEBRUARI', '03' => 'MARET', '04' => 'APRIL', '05' => 'MEI', '06' => 'JUNI', 
      '07' => 'JULI', '08' => 'AGUSTUS', '09' => 'SEPTEMBER', '10' => 'OKTOBER', '11' => 'NOVEMBER', '12' => 'DESEMBER');

    $bulanprediksi = $bulantostr[substr($month, 5)];
    $prediction_month = $bulanprediksi." ".$tahun;

    $hasil=0;
    $bobot=12;
    for ($i=0; $i < 12 ; $i++) { 
      if($data[$i]['sold']==NULL){
        $this->session->set_flashdata('failed','Data penjualan sebelumnya tidak tersedia!');
        redirect('PrediksiController');    
      } else {
        $hasil += ($data[$i]['sold']*($bobot--));
      }
    }


    // $query = $this->db->query("SELECT SUM(jumlah_barang) AS total FROM tbl_penjualan WHERE mid(tgl_penjualan, 1,7) = '$month'");
    // foreach ($query->result() as $r){
    //   $sold = $r->total;
    // }
    // var_dump($hasil);
    // die();
    $prediksi = round($hasil/78);
    $mad = round(abs(($data[0]['sold']-$prediksi)/12), 2);
    $mse = round(abs((($data[0]['sold']-$prediksi)*($data[0]['sold']-$prediksi))/12), 2);

    $result = $this->PrediksiModel->insert($prediction_month,$prediksi,$mad,$mse);
    if ($result){
      redirect('PrediksiController');
    } else {
      $this->session->set_flashdata('failed','Data gagal disimpan!');
      redirect('PrediksiController');
    }
  }

  function Cetak(){
    foreach ($this->PrediksiModel->load() as $res){
      $bulan_prediksi = $res->bulan;
      $mad = $res->mad;
      $mse = $res->mse;
      $hasil = $res->hasil;
      $bulan = substr($res->bulan,0,-5);
      $year = substr($res->bulan, -4);
    }

    $bulanint = array('JANUARI'=>'01', 'FEBRUARI'=>'02', 'MARET'=>'03', 'APRIL'=>'04', 'MEI'=>'05', 'JUNI'=>'06', 
      'JULI'=>'07', 'AGUSTUS'=>'08', 'SEPTEMBER'=>'09', 'OKTOBER'=>'10', 'NOVEMBER'=>'11', 'DESEMBER'=>'12');

    $blnprediksi = strtotime($year."-".$bulanint[$bulan]);
    $bln = date('Y-m', $blnprediksi);

    $data = $this->PesananModel->getPenjualanSebelumnya($bln);

    #setting judul laporan dan header tabel
    $judul = "PREDIKSI PERSEDIAAN GAS PANGKALAN DADAN";
    $subjudul = "BULAN $bulan_prediksi";
    $header = array(
      array("label"=>"NO", "length"=>10, "align"=>"C"),
      array("label"=>"BULAN", "length"=>30, "align"=>"C"),
      array("label"=>"TAHUN", "length"=>30, "align"=>"C"),
      array("label"=>"JUMLAH PENJUALAN", "length"=>50, "align"=>"C")
    );

    $pdf = new FPDF();
    $pdf->SetTitle('Prediksi Persediaan', TRUE);
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
    $i=0;
    $total_barang=0;
    $total=0;

    for ($row=0; $row<12; $row++){ 
      $pdf->Cell($header[$i]['length'], 10, $row+1, 1,'0', $kolom['align'], false);
      $pdf->Cell($header[$i+1]['length'], 10, $data[$row]['month'],1,'0', $kolom['align'], false);
      $pdf->Cell($header[$i+2]['length'], 10, $data[$row]['year'],1,'0', $kolom['align'], false);
      $pdf->Cell($header[$i+3]['length'], 10, $data[$row]['sold'],1,'0', $kolom['align'], false);
      $pdf->Ln();
    }

    $pdf->SetFont('Arial','B','10');
    $pdf->Cell(70, 10, 'PREDIKSI BULAN '.$bulan_prediksi,1,'0', 'C',false);
    $pdf->Cell(50, 10, $hasil,1,'0', 'C',false);

    #output file PDF
    $pdf->Output('I', 'Prediksi Persediaan.pdf');
  }
}
