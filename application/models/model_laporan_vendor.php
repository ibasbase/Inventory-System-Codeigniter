<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_vendor extends CI_Model {

	public function get_laporan_vendor($where = "")
	{
		$data_laporan_vendor = $this->db->query("select * from vendor ".$where);
		return $data_laporan_vendor;
	}

	public function delete_data($table, $where)
	{
		$temp = $this->db->delete($table, $where);
		return $temp;
	}

/*	public function view(){
		return $this->db->get('vendor')->result();
	}
	  
	public function view_row(){
		return $this->db->get('vendor')->result();
	}*/

}
