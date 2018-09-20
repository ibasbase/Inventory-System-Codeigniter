<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_purchas_receiving extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_purchas_receiving['purchas_receiving'] = $this->model_purchas_receiving->get_purchas_receiving();
		$data_purchas_receiving['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/purchas_receiving/view_purchas_receiving', $data_purchas_receiving);
		//$this->load->view('backend/purchas_receiving/view_purchas_receiving', array('data_purchas_receiving' => $data_purchas_receiving));

	}

	public function add_data()
	{
		//Data Combo kode barang
		$this->load->model('model_purchas_receiving');
		$data['order_barang'] = $this->model_purchas_receiving->get_nomer_order();
		//Data Combo kode barang

		//Data combo supplier
		$this->load->model('model_purchas_receiving');
		$data['supplier'] = $this->model_purchas_receiving->get_kode_supplier();
		//Data combo supplier

		$data['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/purchas_receiving/view_add_purchas_receiving', $data);
	}


	public function edit_data($nomer_receiving)
	{
		/*$data = array("konten"=>"backend/purchas_receiving/view_purchas_receiving");*/

		$purchas_receiving = $this->model_purchas_receiving->get_purchas_receiving("where nomer_receiving = '$nomer_receiving'");

		foreach($purchas_receiving->result_array()as $row){
			$nomer_receiving	= $row['nomer_receiving'];
			$tanggal 			= $row['tanggal'];
			$nomer_order		= $row['nomer_order'];
			$kode_supplier 		= $row['kode_supplier'];
			$jumlah_barang 		= $row['jumlah_barang'];
			$keterangan_barang	= $row['keterangan_barang'];
		}

		$data['nomer_receiving']	= $nomer_receiving;
		$data['tanggal'] 			= $tanggal;
		$data['nomer_order']		= $nomer_order;
		$data['kode_supplier'] 		= $kode_supplier;
		$data['jumlah_barang'] 		= $jumlah_barang;
		$data['keterangan_barang']	= $keterangan_barang;
		$this->load->view('backend/purchas_receiving/view_edit_purchas_receiving', $data);

		/*$edit = $this->model_purchas_receiving->get_purchas_receiving("where no = '$no'");

		$data = array(
			"no" 			=> $edit[0]['no'],
			"tanggal" 		=> $edit[0]['tanggal'],
			"kode_barang"	=> $edit[0]['kode_barang'],
			"kode_supplier"	=> $edit[0]['kode_supplier'],
			"jumlah_barang"	=> $edit[0]['jumlah_barang'],
			"satuan"		=> $edit[0]['satuan'],
			"keterangan"	=> $edit[0]['keterangan']
		);

		$this->load->view('backend/purchas_receiving/view_edit_purchas_receiving', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$nomer_receiving	= $_POST['nomer_receiving'];
		$tanggal			= date("Y-m-d");
		$nomer_order		= $_POST['nomer_order'];
		$kode_supplier		= $_POST['kode_supplier'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$keterangan_barang	= $_POST['keterangan_barang'];

		$data_add = array(
			"nomer_receiving"	=> $nomer_receiving,
			"tanggal"			=> $tanggal,
			"nomer_order"		=> $nomer_order,
			"kode_supplier"		=> $kode_supplier,
			"jumlah_barang"		=> $jumlah_barang,
			"keterangan_barang"	=> $keterangan_barang
		);

		$temp = $this->model_purchas_receiving->insert_data('purchas_receiving', $data_add);
		if($temp >=1){
			redirect('purchas_receiving/controller_purchas_receiving/index');
		}
	}


	public function do_edit()
	{
		$nomer_receiving	= $_POST['nomer_receiving'];
		$tanggal			= $_POST['tanggal'];
		$nomer_order		= $_POST['nomer_order'];
		$kode_supplier		= $_POST['kode_supplier'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$keterangan_barang	= $_POST['keterangan_barang'];

		$data_edit = array(
			"nomer_receiving"	=> $nomer_receiving,
			"tanggal"			=> $tanggal,
			"nomer_order"		=> $nomer_order,
			"kode_supplier"		=> $kode_supplier,
			"jumlah_barang"		=> $jumlah_barang,
			"keterangan_barang"	=> $keterangan_barang
		);

		$where = array(
			"nomer_receiving"	=> $nomer_receiving
		);

		$temp = $this->model_purchas_receiving->update_data('purchas_receiving', $data_edit, $where);
		if($temp >=1){
			redirect('purchas_receiving/controller_purchas_receiving/index');
		}else{
			redirect('purchas_receiving/controller_purchas_receiving/edit_data');
		}
	}

	public function do_delete($nomer_receiving)
	{
		$where = array(
			"nomer_receiving" => $nomer_receiving
			);

		$temp = $this->model_purchas_receiving->delete_data('purchas_receiving', $where);
		if($temp>= 1){
			redirect('purchas_receiving/controller_purchas_receiving/index');
		}
	}

	public function export_pdf(){
		$data['purchas_receiving'] = $this->model_purchas_receiving->get_purchas_receiving();
		$this->load->view('backend/purchas_receiving/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Purchas-Receiving-'.$date, 'purchas_receiving' => $this->model_purchas_receiving->get_purchas_receiving());
		$this->load->view('backend/purchas_receiving/export_excel', $data);	
	}
}