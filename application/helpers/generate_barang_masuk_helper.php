<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function generate_barang_masuk($field, $table, $val){
	$CI =& get_instance();
	
	$query = "SELECT MAX($field) AS kode FROM $table";
	
	$row = $CI->db->query($query)->row_array();
	$id = $row['kode'];

	if(strlen($id) == 10){
		$max_id = substr($id,7,3);
	}elseif (strlen($id) == 5) {
		$max_id = substr($id,3,2);
	}else {
		$max_id = substr($id,1,3);
	}

	$plus = $max_id+1; 
	if($plus<10){
		$kode = $val."000000".$plus;
	}elseif($plus<99){
		$kode = $val."00000".$plus;
	}elseif($plus<999){
		$kode = $val."0000".$plus;
	}elseif($plus<9999){
		$kode = $val."000".$plus;
	}else{
		$kode = 'BRG';
	}  

	return $kode;
}