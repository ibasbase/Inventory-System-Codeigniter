<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_barang_masuk extends CI_Model {

	public function get_barang_masuk($where = "")
	{
		$data_laporan_barang_masuk = $this->db->query("select * from barang_masuk ".$where);
		return $data_laporan_barang_masuk;
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
		return $this->db->get('barang_masuk')->result();
	}
	  
	public function view_row(){
		return $this->db->get('barang_masuk')->result();
	}
*/
}
