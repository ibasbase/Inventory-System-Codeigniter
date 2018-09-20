<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_purchas_reture extends CI_Model {

	public function get_purchas_reture($where = ""){
		$data_purchas_reture = $this->db->query("select * from reture_barang ".$where." order by nomer_reture desc");
		return $data_purchas_reture;
	}	
}
