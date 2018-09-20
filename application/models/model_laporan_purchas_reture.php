<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_purchas_reture extends CI_Model {

	public function get_laporan_purchas_reture($where = ""){
		$data_laporan_purchas_reture = $this->db->query("select * from reture_barang ".$where." order by nomer_reture desc");
		return $data_laporan_purchas_reture;
	}

	public function delete_data($table, $where)
	{
		$temp = $this->db->delete($table, $where);
		return $temp;
	}

	public function laporan_periode($tanggal1,$tanggal2)//
		{ 
			$this->db->select('*');
			$this->db->from('reture_barang');
			$this->db->where('tanggal >=',$tanggal1);
			$this->db->where('tanggal <=',$tanggal2);
			return $query = $this->db->get();
		}

/*	public function view(){
		return $this->db->get('purchas_order')->result();
	}
	  
	public function view_row(){
		return $this->db->get('purchas_order')->result();
	}*/

}
