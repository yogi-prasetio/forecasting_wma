<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class PesananModel extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    function load() {
        $this->db->order_by('tgl_penjualan', 'desc');
        $query = $this->db->get('tbl_penjualan');
        return $query->result();    
    }

    function getPesanan($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tbl_penjualan');
        return $query->result();
    }

    function getPesananCount() {
        $query = $this->db->get('tbl_penjualan');
        return $query->num_rows();
    }

    function insert($id_barang, $id_user, $tgl_penjualan, $jumlah_barang, $tipe_pesanan){
        $data = array(
          'id_barang'=>$id_barang,
          'id_user'=>$id_user,
          'tgl_penjualan'=>$tgl_penjualan,  
          'jumlah_barang'=>$jumlah_barang,
          'tipe_pesanan'=> $tipe_pesanan      
      );    
        $query = $this->db->insert('tbl_penjualan', $data);
        return $query;
    }

    function getPesananUserCount($id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tbl_penjualan');
        return $query->num_rows();
    }

    function getBarang($id){
        $this->db->where('id_barang', $id);
        $query = $this->db->get('tbl_penjualan');
        return $query->num_rows();
    }

    function getPenjualanSebelumnya($month){
        // $bulan = new DateTime($month);
        // $bulan2 = new DateTime($month);
        // $bulan3 = new DateTime($month);
        // $bulan4 = new DateTime($month);
        // $interval = new DateInterval('P4M');
        // $interval2 = new DateInterval('P3M');
        // $interval3 = new DateInterval('P2M');
        // $interval4 = new DateInterval('P1M');

        // $bulan->sub($interval);
        // $fourmonth = $bulan->format('Y-m');

        // $bulan2->sub($interval2);
        // $thirdmonth = $bulan2->format('Y-m');

        // $bulan3->sub($interval3);
        // $secondmonth = $bulan3->format('Y-m');

        // $bulan4->sub($interval4);
        // $lastmonth = $bulan4->format('Y-m');

        // $q = $this->db->query("SELECT SUM(jumlah_barang) AS total FROM tbl_penjualan WHERE mid(tgl_penjualan, 1,7) = '$fourmonth'");
        // $q2 = $this->db->query("SELECT SUM(jumlah_barang) AS total FROM tbl_penjualan WHERE mid(tgl_penjualan, 1,7) = '$thirdmonth'");
        // $q3 = $this->db->query("SELECT SUM(jumlah_barang) AS total FROM tbl_penjualan WHERE mid(tgl_penjualan, 1,7) = '$secondmonth'");
        // $q4 = $this->db->query("SELECT SUM(jumlah_barang) AS total FROM tbl_penjualan WHERE mid(tgl_penjualan, 1,7) = '$lastmonth'");

        // $bulanstr = array('01' => 'JANUARI', '02' => 'FEBRUARI', '03' => 'MARET', '04' => 'APRIL', 
        //     '05' => 'MEI', '06' => 'JUNI', '07' => 'JULI', '08' => 'AGUSTUS', 
        //     '09' => 'SEPTEMBER', '10' => 'OKTOBER', '11' => 'NOVEMBER', '12' => 'DESEMBER');

        // $bulans = $bulanstr[$bulan->format('m')];
        // foreach ($q->result() as $data){ 
        //     $total = $data->total;
        // }

        // $bulans2 = $bulanstr[$bulan2->format('m')];
        // foreach ($q2->result() as $data2){ 
        //     $total2 = $data2->total;
        // }

        // $bulans3 = $bulanstr[$bulan3->format('m')];
        // foreach ($q3->result() as $data3){ 
        //     $total3 = $data3->total;
        // }

        // $bulans4 = $bulanstr[$bulan4->format('m')];
        // foreach ($q4->result() as $data4){ 
        //     $total4 = $data4->total;
        // }

        // for ($row=1; $row<=12; $row++){
        //     $bulan[$row] = new DateTime($month);
        //     $interval[$row] = new DateInterval('P'.$row.'M');
        //     // var_dump($bulan[$row], $interval[$row]);
        // }

        // for($col=1; $col<=12; $col++){
        //     $bulan[$col]->sub($interval[$col]);
        //     $data[$col] = $bulan[$col]->format('Y-m');
        //     $query[$col] = $this->db->query("SELECT SUM(jumlah_barang) AS total FROM tbl_penjualan WHERE mid(tgl_penjualan, 1,7) = '$data[$col]'");
        // }

        for ($i=0; $i <=12 ; $i++) { 
            $bln[$i] = new DateTime($month);
            $interval[$i] = new DateInterval('P'.$i.'M');

            $bln[$i]->sub($interval[$i]);
            $data[$i] = $bln[$i]->format('Y-m');
            $query[$i] = $this->db->query("SELECT SUM(jumlah_barang) AS total FROM tbl_penjualan WHERE mid(tgl_penjualan, 1,7) = '$data[$i]'");
        }

        $bulanstr = array('01' => 'JANUARI', '02' => 'FEBRUARI', '03' => 'MARET', '04' => 'APRIL', 
            '05' => 'MEI', '06' => 'JUNI', '07' => 'JULI', '08' => 'AGUSTUS', 
            '09' => 'SEPTEMBER', '10' => 'OKTOBER', '11' => 'NOVEMBER', '12' => 'DESEMBER');

        $result = array();
        for($j=1; $j<=12; $j++){
            $bulan[$j] = $bulanstr[$bln[$j]->format('m')];
            $tahun[$j] = $bln[$j]->format('Y');
            foreach ($query[$j]->result() as $value){ 
                $total[$j] = $value->total;
                array_push($result, array('month' => $bulan[$j], 'year' => $tahun[$j], 'sold' => $total[$j]));
            }
        }
        
        // foreach ($bulans as $row) {
        //     array_push($data, $row);
        // }

        // var_dump($result);
        // die();
        // $data = ['month' => [$bulans, $bulans2, $bulans3, $bulans4], 'total' => [$total, $total2, $total3, $total4]];
        return $result;
    }
}