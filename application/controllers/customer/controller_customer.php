<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_customer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_customer['customer'] = $this->model_customer->get_customer();
		$data_customer['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/customer/view_customer',$data_customer);
	}

	public function add_data()
	{
		$data_customer['masuk'] = $this->model_cart->count_cart();
		$this->load->view('backend/customer/view_add_customer', $data_customer);
	}

	public function edit_data($kode_customer)
	{
	
	$customer = $this->model_customer->get_customer("where kode_customer = '$kode_customer'");

		foreach($customer->result_array()as $row){
			$kode_customer 	= $row['kode_customer'];
			$nama_customer 	= $row['nama_customer'];
			$alamat 		= $row['alamat'];
			$kota 			= $row['kota'];
			$email 			= $row['email'];
			$telp 			= $row['telp'];
			$fax 			= $row['fax'];
		}

		$data['kode_customer'] 	= $kode_customer;
		$data['nama_customer'] 	= $nama_customer;
		$data['alamat'] 		= $alamat;
		$data['kota'] 			= $kota;
		$data['email'] 			= $email;
		$data['telp'] 			= $telp;
		$data['fax'] 			= $fax;

		$data['masuk'] = $this->model_cart->count_cart();
		$this->load->view('backend/customer/view_edit_customer', $data);	/*$edit = $this->model_customer->get_customer("where no = '$no'");

		$data = array(
			"no" 				=> $edit[0]['no'],
			"kode_customer" 		=> $edit[0]['kode_customer'],
			"nama_customer"		=> $edit[0]['nama_customer'],
			"alamat"			=> $edit[0]['alamat'],
			"kota"				=> $edit[0]['kota'],
			"telp"				=> $edit[0]['telp'],
			"fax"				=> $edit[0]['fax'],
			"email"				=> $edit[0]['email']
		);

		$this->load->view('backend/customer/view_edit_customer', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$kode_customer		= $_POST['kode_customer'];
		$nama_customer		= $_POST['nama_customer'];
		$alamat				= $_POST['alamat'];
		$kota				= $_POST['kota'];
		$email				= $_POST['email'];
		$telp				= $_POST['telp'];
		$fax				= $_POST['fax'];

		$data_add = array(
			"kode_customer"		=> $kode_customer,
			"nama_customer"		=> $nama_customer,
			"alamat"			=> $alamat,
			"kota"				=> $kota,
			"email"				=> $email,
			"telp"				=> $telp,
			"fax"				=> $fax
		);

		$temp = $this->model_customer->insert_data('customer', $data_add);
		if($temp >=1){
			redirect('customer/controller_customer/index');
		}
	}


	public function do_edit()
	{
		$kode_customer	= $_POST['kode_customer'];
		$nama_customer	= $_POST['nama_customer'];
		$alamat			= $_POST['alamat'];
		$kota			= $_POST['kota'];
		$email			= $_POST['email'];
		$telp			= $_POST['telp'];
		$fax			= $_POST['fax'];
		
		$data_edit = array(
			"kode_customer"	=> $kode_customer,
			"nama_customer"	=> $nama_customer,
			"alamat"		=> $alamat,
			"kota"			=> $kota,
			"email"			=> $email,
			"telp"			=> $telp,
			"fax"			=> $fax
		);

		$where = array(
			"kode_customer"	=> $kode_customer
		);

		$temp = $this->model_customer->update_data('customer', $data_edit, $where);
		if($temp >=1){
			redirect('customer/controller_customer/index');
		}else{
			redirect('customer/controller_customer/edit_data');
		}
	}

	public function do_delete($kode_customer)
	{
		$where = array(
			"kode_customer" => $kode_customer
			);

		$temp = $this->model_customer->delete_data('customer', $where);
		if($temp>= 1){
			redirect('customer/controller_customer/index');
		}
	}

	public function export_pdf(){
		$data['customer'] = $this->model_customer->get_customer();
		$this->load->view('backend/customer/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-customer-'.$date, 'customer' => $this->model_customer->get_customer());
		$this->load->view('backend/customer/export_excel', $data);	
	}
}

