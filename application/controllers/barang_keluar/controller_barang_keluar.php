<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_barang_keluar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_barang_keluar['barang_keluar'] = $this->model_barang_keluar->get_barang_keluar();
		$data_barang_keluar['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/barang_keluar/view_barang_keluar', $data_barang_keluar);
		//$this->load->view('backend/barang_keluar/view_barang_keluar', array('data_barang_keluar' => $data_barang_keluar));

	}

	public function add_data()
	{
		//Data Combo kode barang
		$this->load->model('model_barang_keluar');
		$data['stok_barang'] = $this->model_barang_keluar->get_kode_barang();
		//Data Combo kode barang

		$data['masuk'] = $this->model_cart->count_cart();
		$this->load->view('backend/barang_keluar/view_add_barang_keluar', $data);
	}


	public function edit_data($nomer_transaksi)
	{
		/*$data = array("konten"=>"backend/barang_keluar/view_barang_keluar");*/

		$barang_keluar = $this->model_barang_keluar->get_barang_keluar("where nomer_transaksi = '$nomer_transaksi'");

		foreach($barang_keluar->result_array()as $row){
			$nomer_transaksi	= $row['nomer_transaksi'];
			$tanggal 			= $row['tanggal'];
			$kode_barang 		= $row['kode_barang'];
			$jumlah_barang 		= $row['jumlah_barang'];
			$satuan 			= $row['satuan'];
			$keterangan 		= $row['keterangan'];
		}

		$data['nomer_transaksi']	= $nomer_transaksi;
		$data['tanggal'] 			= $tanggal;
		$data['kode_barang'] 		= $kode_barang;
		$data['jumlah_barang'] 		= $jumlah_barang;
		$data['satuan'] 			= $satuan;
		$data['keterangan'] 		= $keterangan;

		$data['masuk'] = $this->model_cart->count_cart();
		$this->load->view('backend/barang_keluar/view_edit_barang_keluar', $data);

		/*$edit = $this->model_barang_keluar->get_barang_keluar("where no = '$no'");

		$data = array(
			"no" 			=> $edit[0]['no'],
			"tanggal" 		=> $edit[0]['tanggal'],
			"kode_barang"	=> $edit[0]['kode_barang'],
			"kode_supplier"	=> $edit[0]['kode_supplier'],
			"jumlah_barang"	=> $edit[0]['jumlah_barang'],
			"satuan"		=> $edit[0]['satuan'],
			"keterangan"	=> $edit[0]['keterangan']
		);

		$this->load->view('backend/barang_keluar/view_edit_barang_keluar', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$nomer_transaksi	= $_POST['nomer_transaksi'];
		$tanggal			= date("Y-m-d");
		$kode_barang		= $_POST['kode_barang'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$satuan				= $_POST['satuan'];
		$keterangan			= $_POST['keterangan'];

		$data_add = array(
			"nomer_transaksi"	=> $nomer_transaksi,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"jumlah_barang"		=> $jumlah_barang,
			"satuan"			=> $satuan,
			"keterangan"		=> $keterangan
		);

		$temp = $this->model_barang_keluar->insert_data('barang_keluar', $data_add);
		if($temp >=1){
			redirect('barang_keluar/controller_barang_keluar/index');
		}
	}


	public function do_edit()
	{
		$nomer_transaksi	= $_POST['nomer_transaksi'];
		$tanggal			= $_POST['tanggal'];
		$kode_barang		= $_POST['kode_barang'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$satuan				= $_POST['satuan'];
		$keterangan			= $_POST['keterangan'];

		$data_edit = array(
			"nomer_transaksi"	=> $nomer_transaksi,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"jumlah_barang"		=> $jumlah_barang,
			"satuan"			=> $satuan,
			"keterangan"		=> $keterangan
		);

		$where = array(
			"nomer_transaksi"	=> $nomer_transaksi
		);

		$temp = $this->model_barang_keluar->update_data('barang_keluar', $data_edit, $where);
		if($temp >=1){
			redirect('barang_keluar/controller_barang_keluar/index');
		}else{
			redirect('barang_keluar/controller_barang_keluar/edit_data');
		}
	}

	public function do_delete($nomer_transaksi)
	{
		$where = array(
			"nomer_transaksi" => $nomer_transaksi
			);

		$temp = $this->model_barang_keluar->delete_data('barang_keluar', $where);
		if($temp>= 1){
			redirect('barang_keluar/controller_barang_keluar/index');
		}
	}

	public function export_pdf(){
		$data['barang_keluar'] = $this->model_barang_keluar->get_barang_keluar();
		$this->load->view('backend/barang_keluar/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Barang-Masuk-'.$date, 'barang_keluar' => $this->model_barang_keluar->get_barang_keluar());
		$this->load->view('backend/barang_keluar/export_excel', $data);	
	}
}