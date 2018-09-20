<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_order_barang extends CI_Model {

	public function get_order_barang($where = ""){
		$data_order_barang = $this->db->query("select * from order_barang ".$where." order by nomer_order desc");
		return $data_order_barang;
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

	public function get_kode_barang(){
		$data = array();
		$query = $this->db->get('stok_barang');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$data[] = $row;

			}
		}

		$query->free_result();
		return $data;
	}

	public function get_nama_barang(){
		$data = array();
		$query = $this->db->get('stok_barang');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$data[] = $row;

			}
		}

		$query->free_result();
		return $data;
	}
}
