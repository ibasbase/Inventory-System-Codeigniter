<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_reture_barang extends CI_Model {

	public function get_reture_barang($where = ""){
		$data_reture_barang = $this->db->query("select * from reture_barang ".$where." order by nomer_reture desc");
		return $data_reture_barang;
	}

	public function laporan_periode($tanggal1,$tanggal2)//
		{ 
			$this->db->select('*');
			$this->db->from('reture_barang');
			$this->db->where('tanggal >=',$tanggal1);
			$this->db->where('tanggal <=',$tanggal2);
			return $query = $this->db->get();
		}

}
