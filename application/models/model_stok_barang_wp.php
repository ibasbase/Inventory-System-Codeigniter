<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_stok_barang_wp extends CI_Model {

	public function get_stok_barang_wp($where = ""){
		$data_stok_barang = $this->db->query("select * from stok_barang ".$where);
		return $data_stok_barang;
	}

}
