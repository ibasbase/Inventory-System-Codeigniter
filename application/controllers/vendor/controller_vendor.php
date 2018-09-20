<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_vendor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_vendor['vendor'] = $this->model_vendor->get_vendor();
		$data_vendor['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/vendor/view_vendor',$data_vendor);
	}

	public function add_data()
	{
		$data_vendor['masuk'] = $this->model_cart->count_cart();
		$this->load->view('backend/vendor/view_add_vendor', $data_vendor);
	}

	public function edit_data($kode_vendor)
	{
	
	$vendor = $this->model_vendor->get_vendor("where kode_vendor = '$kode_vendor'");

		foreach($vendor->result_array()as $row){
			$kode_vendor 	= $row['kode_vendor'];
			$nama_vendor 	= $row['nama_vendor'];
			$alamat 		= $row['alamat'];
			$kota 			= $row['kota'];
			$email 			= $row['email'];
			$telp 			= $row['telp'];
			$fax 			= $row['fax'];
		}

		$data['kode_vendor'] 	= $kode_vendor;
		$data['nama_vendor'] 	= $nama_vendor;
		$data['alamat'] 		= $alamat;
		$data['kota'] 			= $kota;
		$data['email'] 			= $email;
		$data['telp'] 			= $telp;
		$data['fax'] 			= $fax;

		$data['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/vendor/view_edit_vendor', $data);	/*$edit = $this->model_vendor->get_vendor("where no = '$no'");

		$data = array(
			"no" 				=> $edit[0]['no'],
			"kode_vendor" 		=> $edit[0]['kode_vendor'],
			"nama_vendor"		=> $edit[0]['nama_vendor'],
			"alamat"			=> $edit[0]['alamat'],
			"kota"				=> $edit[0]['kota'],
			"telp"				=> $edit[0]['telp'],
			"fax"				=> $edit[0]['fax'],
			"email"				=> $edit[0]['email']
		);

		$this->load->view('backend/vendor/view_edit_vendor', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$kode_vendor		= $_POST['kode_vendor'];
		$nama_vendor		= $_POST['nama_vendor'];
		$alamat				= $_POST['alamat'];
		$kota				= $_POST['kota'];
		$email				= $_POST['email'];
		$telp				= $_POST['telp'];
		$fax				= $_POST['fax'];

		$data_add = array(
			"kode_vendor"		=> $kode_vendor,
			"nama_vendor"		=> $nama_vendor,
			"alamat"			=> $alamat,
			"kota"				=> $kota,
			"email"				=> $email,
			"telp"				=> $telp,
			"fax"				=> $fax
		);

		$temp = $this->model_vendor->insert_data('vendor', $data_add);
		if($temp >=1){
			redirect('vendor/controller_vendor/index');
		}
	}


	public function do_edit()
	{
		$kode_vendor	= $_POST['kode_vendor'];
		$nama_vendor	= $_POST['nama_vendor'];
		$alamat			= $_POST['alamat'];
		$kota			= $_POST['kota'];
		$email			= $_POST['email'];
		$telp			= $_POST['telp'];
		$fax			= $_POST['fax'];
		
		$data_edit = array(
			"kode_vendor"	=> $kode_vendor,
			"nama_vendor"	=> $nama_vendor,
			"alamat"		=> $alamat,
			"kota"			=> $kota,
			"email"			=> $email,
			"telp"			=> $telp,
			"fax"			=> $fax
		);

		$where = array(
			"kode_vendor"	=> $kode_vendor
		);

		$temp = $this->model_vendor->update_data('vendor', $data_edit, $where);
		if($temp >=1){
			redirect('vendor/controller_vendor/index');
		}else{
			redirect('vendor/controller_vendor/edit_data');
		}
	}

	public function do_delete($kode_vendor)
	{
		$where = array(
			"kode_vendor" => $kode_vendor
			);

		$temp = $this->model_vendor->delete_data('vendor', $where);
		if($temp>= 1){
			redirect('vendor/controller_vendor/index');
		}
	}

	public function export_pdf(){
		$data['vendor'] = $this->model_vendor->get_vendor();
		$this->load->view('backend/vendor/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Vendor-'.$date, 'vendor' => $this->model_vendor->get_vendor());
		$this->load->view('backend/vendor/export_excel', $data);	
	}
}

