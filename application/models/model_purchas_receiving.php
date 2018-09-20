<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_purchas_receiving extends CI_Model {

	public function get_purchas_receiving($where = ""){
		$data_purchas_receiving = $this->db->query("select * from purchas_receiving ".$where." order by nomer_receiving desc");
		return $data_purchas_receiving;
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

	public function get_nomer_order(){
		$data = array();
		$query = $this->db->get('order_barang');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$data[] = $row;

			}
		}

		$query->free_result();
		return $data;
	}

	public function get_kode_supplier(){
		$data = array();
		$query = $this->db->get('supplier');
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$data[] = $row;

			}
		}

		$query->free_result();
		return $data;
	}
}
