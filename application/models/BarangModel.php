<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class BarangModel extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	function load() {
		$this->db->order_by('bulan', 'desc');
		$query = $this->db->get('tbl_barang');
		return $query->result();    
	}

	function loadStok() {
		$this->db->order_by('bulan', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('tbl_barang');
		return $query->result();    
	}

	function getStokSisa() {
		$query = $this->db->query("SELECT SUM(stok_ready) AS stok_sisa FROM tbl_barang");
		return $query->result();    
	}

	function getBarangById($id) {
		$this->db->where('id_barang', $id);
		$query = $this->db->get('tbl_barang');
		return $query->result();   
	}

	function getStok() {
		$this->db->order_by('bulan', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('tbl_barang');
		foreach ($query->result() as $data){
			$jumlah = $data->stok_ready;
		}
		return $jumlah;
	}

	function getBarangbyMonth($month) {
		$query = $this->db->query('SELECT * FROM tbl_barang WHERE mid(bulan, 1,7) = bulan', $month);
		return $query->result();   
	}

	function insert($name, $harga, $bulan, $stok_awal, $stok_ready){
		$data = array(
			'nama_barang'=>$name,
			'harga'=>$harga,
			'bulan'=>$bulan,
			'stok_awal'=>$stok_awal,
			'stok_ready'=>$stok_ready
		);  
		$query = $this->db->insert('tbl_barang', $data);
		return $query;
	}

	function update($id, $name, $bulan, $harga, $stok_awal, $stok_ready){
		$data = array(
			'id_barang'=>$id,
			'nama_barang'=>$name,			
			'bulan'=>$bulan,
			'harga'=>$harga,
			'stok_awal'=>$stok_awal,
			'stok_ready'=>$stok_ready
		);
		$this->db->where('id_barang', $id);
		$query = $this->db->update('tbl_barang', $data);
		return $query;
	}

	function delete($id) {
		$this->db->where('id_barang', $id);
		$query = $this->db->delete('tbl_barang');
		return $query;
	}

	function cekBulan($bulan) {
		$bln = new DateTime($bulan);
		$month= $bln->format('Y-m');
		$query = $this->db->query("SELECT * FROM tbl_barang WHERE mid(bulan, 1,7) = '$month'");
		return ($query->num_rows() > 0) ? $query->row() : FALSE;
	}
}