<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class PrediksiModel extends CI_Model{

	function __construct() {
		parent::__construct();
	}

	function load() {
		$this->db->order_by('id_prediksi','DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_prediksi');
		return $query->result();    
	}

	function getprediksi($id) {
		$this->db->where('id_prediksi', $id);
		$query = $this->db->get('tbl_prediksi');
		return $query->result();   
	}

	function insert($bulan,$hasil, $mad, $mse){
		$data = array(
			'bulan'=>$bulan,
			'hasil'=>$hasil,
			'mad'=>$mad,
			'mse'=>$mse
		);    
		$query = $this->db->insert('tbl_prediksi', $data);
		return $query;
	}
}