<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_customer extends CI_Model {

	public function get_laporan_customer($where = ""){
		$data_laporan_customer = $this->db->query("select * from customer ".$where);
		return $data_laporan_customer;
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
