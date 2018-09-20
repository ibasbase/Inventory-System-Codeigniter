<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_supplier extends CI_Model {

	public function get_laporan_supplier($where = "")
	{
		$data_laporan_supplier = $this->db->query("select * from supplier ".$where);
		return $data_laporan_supplier;
	}

	public function delete_data($table, $where)
	{
		$temp = $this->db->delete($table, $where);
		return $temp;
	}

/*	public function view(){
		return $this->db->get('supplier')->result();
	}
	  
	public function view_row(){
		return $this->db->get('supplier')->result();
	}*/

}
