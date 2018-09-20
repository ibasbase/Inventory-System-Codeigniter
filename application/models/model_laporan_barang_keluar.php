<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_barang_keluar extends CI_Model {

	public function get_barang_keluar($where = "")
	{
		$data_laporan_barang_keluar = $this->db->query("select * from barang_keluar ".$where);
		return $data_laporan_barang_keluar;
	}

	public function delete_data($table, $where)
	{
		$temp = $this->db->delete($table, $where);
		return $temp;
	}



	public function laporan_periode($tanggal1,$tanggal2)//
		{ 
			$this->db->select('*');
			$this->db->from('barang_masuk');
			$this->db->where('tanggal >=',$tanggal1);
			$this->db->where('tanggal <=',$tanggal2);
			return $query = $this->db->get();
		}
/*	public function view(){
		return $this->db->get('barang_keluar')->result();
	}
	  
	public function view_row(){
		return $this->db->get('barang_keluar')->result();
	}*/

}
