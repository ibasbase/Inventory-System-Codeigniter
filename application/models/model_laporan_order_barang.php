<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_order_barang extends CI_Model {

	public function get_laporan_order_barang($where = ""){
		$data_laporan_order_barang = $this->db->query("select * from order_barang ".$where." order by nomer_order desc");
		return $data_laporan_order_barang;
	}

	public function delete_data($table, $where)
	{
		$temp = $this->db->delete($table, $where);
		return $temp;
	}

	public function laporan_periode($tanggal1,$tanggal2)
	{
		$this->db->select('*');
		$this->db->from('order_barang');
		$this->db->where('tanggal >=', $tanggal1);
		$this->db->where('tanggal <=', $tanggal2);
		return $query = $this->db->get();
	}

/*	public function view(){
		return $this->db->get('order_barang')->result();
	}
	  
	public function view_row(){
		return $this->db->get('order_barang')->result();
	}*/

}
