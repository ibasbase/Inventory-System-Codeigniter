<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_register extends CI_Model {

	public function get_register($where = ""){
		$data_register = $this->db->query("select * from register ".$where);
		return $data_register;
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
