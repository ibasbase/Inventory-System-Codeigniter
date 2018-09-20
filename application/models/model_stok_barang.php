<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_stok_barang extends CI_Model {

	public function get_stok_barang($where = ""){
		$data_stok_barang = $this->db->query("select * from stok_barang ".$where);
		return $data_stok_barang;
	}

	public function insert_data($table, $data){
		$temp = $this->db->insert($table, $data);
		return $temp;

	}

	public function update_data($table, $data, $where){
		$temp = $this->db->update($table, $data, $where);
		return $temp;

	}

	public function delete_data($table, $where){
		$temp = $this->db->delete($table, $where);
		return $temp;

	}
}
