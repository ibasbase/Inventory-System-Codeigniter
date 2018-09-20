<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_supplier extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_supplier['supplier'] = $this->model_supplier->get_supplier();
		$data_supplier['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/supplier/view_supplier', $data_supplier);
	}

	public function add_data()
	{
		$data_supplier['masuk'] = $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/supplier/view_add_supplier', $data_supplier);
	}

	public function edit_data($kode_supplier)
	{

		$supplier = $this->model_supplier->get_supplier("where kode_supplier = '$kode_supplier'");

		foreach($supplier->result_array()as $row){
			$kode_supplier 	= $row['kode_supplier'];
			$nama_supplier 	= $row['nama_supplier'];
			$produk 		= $row['produk'];
			$alamat 		= $row['alamat'];
			$kota 			= $row['kota'];
			$email 			= $row['email'];
			$telp 			= $row['telp'];
			$fax 			= $row['fax'];
		}

		$data['kode_supplier'] 	= $kode_supplier;
		$data['nama_supplier'] 	= $nama_supplier;
		$data['produk'] 		= $produk;
		$data['alamat'] 		= $alamat;
		$data['kota'] 			= $kota;
		$data['email'] 			= $email;
		$data['telp'] 			= $telp;
		$data['fax'] 			= $fax;

		$data['masuk'] = $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/supplier/view_edit_supplier', $data);
		/*$edit = $this->model_supplier->get_supplier("where no = '$no'");

		$data = array(
			"no" 				=> $edit[0]['no'],
			"kode_supplier" 	=> $edit[0]['kode_supplier'],
			"nama_supplier"		=> $edit[0]['nama_supplier'],
			"alamat"			=> $edit[0]['alamat'],
			"kota"				=> $edit[0]['kota'],
			"telp"				=> $edit[0]['telp'],
			"fax"				=> $edit[0]['fax'],
			"email"				=> $edit[0]['email']
		);

		$this->load->view('backend/supplier/view_edit_supplier', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$kode_supplier		= $_POST['kode_supplier'];
		$nama_supplier		= $_POST['nama_supplier'];
		$produk				= $_POST['produk'];
		$alamat				= $_POST['alamat'];
		$kota				= $_POST['kota'];
		$email				= $_POST['email'];
		$telp				= $_POST['telp'];
		$fax				= $_POST['fax'];

		$data_add = array(
			"kode_supplier"		=> $kode_supplier,
			"nama_supplier"		=> $nama_supplier,
			"produk"			=> $produk,
			"alamat"			=> $alamat,
			"kota"				=> $kota,
			"email"				=> $email,
			"telp"				=> $telp,
			"fax"				=> $fax
		);

		$temp = $this->model_supplier->insert_data('supplier', $data_add);
		if($temp >=1){
			redirect('supplier/controller_supplier/index');
		}
	}

	public function do_edit()
	{
		$kode_supplier	= $_POST['kode_supplier'];
		$nama_supplier	= $_POST['nama_supplier'];
		$produk			= $_POST['produk'];
		$alamat			= $_POST['alamat'];
		$kota			= $_POST['kota'];
		$email			= $_POST['email'];
		$telp			= $_POST['telp'];
		$fax			= $_POST['fax'];

		$data_edit = array(
			"kode_supplier"	=> $kode_supplier,
			"nama_supplier"	=> $nama_supplier,
			"produk"		=> $produk,
			"alamat"		=> $alamat,
			"kota"			=> $kota,
			"email"			=> $email,
			"telp"			=> $telp,
			"fax"			=> $fax
		);

		$where = array(
			"kode_supplier"	=> $kode_supplier
		);

		$temp = $this->model_supplier->update_data('supplier', $data_edit, $where);
		if($temp >=1){
			redirect('supplier/controller_supplier/index');
		}else{
			redirect('supplier/controller_supplier/edit_data');
		}
	}

	public function do_delete($kode_supplier)
	{
		$where = array(
			"kode_supplier" => $kode_supplier
			);

		$temp = $this->model_supplier->delete_data('supplier', $where);
		if($temp>= 1){
			redirect('supplier/controller_supplier/index');
		}
	}

	public function export_pdf(){
		$data['supplier'] = $this->model_supplier->get_supplier();
		$this->load->view('backend/supplier/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Supplier-'.$date, 'supplier' => $this->model_supplier->get_supplier());
		$this->load->view('backend/supplier/export_excel', $data);	
	}
}
