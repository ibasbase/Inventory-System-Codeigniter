<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_stok_barang extends CI_Model {

	public function get_laporan_stok_barang($where = "")
	{
		$data_laporan_stok_barang = $this->db->query("select * from stok_barang ".$where);
		return $data_laporan_stok_barang;
	}

	public function delete_data($table, $where)
	{
		$temp = $this->db->delete($table, $where);
		return $temp;
	}

/*	public function view(){
		return $this->db->get('stok_barang')->result();
	}
	  
	public function view_row(){
		return $this->db->get('stok_barang')->result();
	}*/

}
