<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_cart extends CI_Model {

	public function get_cart($where = ""){
		$data_cart = $this->db->query("select * from cart ".$where);
		return $data_cart;
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

	public function count_cart(){
		$now = date("Y-m-d");

		$this->db->select("count(*) as count_cart");
		$this->db->from("cart cr");

		$query = $this->db->get();

		if ($query->num_rows() > 0){	
			foreach ($query->result_array() as $row){
					return $row['count_cart'];
			}
        }else{
            return FALSE;
        }
	}
}
