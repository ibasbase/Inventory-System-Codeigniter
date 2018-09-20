<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_barang_masuk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_barang_masuk['barang_masuk'] = $this->model_barang_masuk->get_barang_masuk();
		$data_barang_masuk['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/barang_masuk/view_barang_masuk', $data_barang_masuk);
		//$this->load->view('backend/barang_masuk/view_barang_masuk', array('data_barang_masuk' => $data_barang_masuk));

	}

	public function add_data()
	{
		//Data Combo kode barang
		$this->load->model('model_barang_masuk');
		$data['stok_barang'] = $this->model_barang_masuk->get_kode_barang();
		//Data Combo kode barang

		//Data combo supplier
		$this->load->model('model_barang_masuk');
		$data['supplier'] = $this->model_barang_masuk->get_supplier();
		//Data combo supplier

		$data['masuk'] = $this->model_cart->count_cart();
		$this->load->view('backend/barang_masuk/view_add_barang_masuk', $data);
	}


	public function edit_data($nomer_transaksi)
	{
		/*$data = array("konten"=>"backend/barang_masuk/view_barang_masuk");*/

		$barang_masuk = $this->model_barang_masuk->get_barang_masuk("where nomer_transaksi = '$nomer_transaksi'");

		foreach($barang_masuk->result_array()as $row){
			$nomer_transaksi	= $row['nomer_transaksi'];
			$tanggal 			= $row['tanggal'];
			$kode_barang 		= $row['kode_barang'];
			$kode_supplier 		= $row['kode_supplier'];
			$jumlah_barang 		= $row['jumlah_barang'];
			$satuan 			= $row['satuan'];
			$keterangan 		= $row['keterangan'];
		}

		$data['nomer_transaksi']	= $nomer_transaksi;
		$data['tanggal'] 			= $tanggal;
		$data['kode_barang'] 		= $kode_barang;
		$data['kode_supplier'] 		= $kode_supplier;
		$data['jumlah_barang'] 		= $jumlah_barang;
		$data['satuan'] 			= $satuan;
		$data['keterangan'] 		= $keterangan;

		$data['masuk'] = $this->model_cart->count_cart();
		$this->load->view('backend/barang_masuk/view_edit_barang_masuk', $data);

		/*$edit = $this->model_barang_masuk->get_barang_masuk("where no = '$no'");

		$data = array(
			"no" 			=> $edit[0]['no'],
			"tanggal" 		=> $edit[0]['tanggal'],
			"kode_barang"	=> $edit[0]['kode_barang'],
			"kode_supplier"	=> $edit[0]['kode_supplier'],
			"jumlah_barang"	=> $edit[0]['jumlah_barang'],
			"satuan"		=> $edit[0]['satuan'],
			"keterangan"	=> $edit[0]['keterangan']
		);

		$this->load->view('backend/barang_masuk/view_edit_barang_masuk', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$nomer_transaksi	= $_POST['nomer_transaksi'];
		$tanggal			= date("Y-m-d");
		$kode_barang		= $_POST['kode_barang'];
		$kode_supplier		= $_POST['kode_supplier'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$satuan				= $_POST['satuan'];
		$keterangan			= $_POST['keterangan'];

		$data_add = array(
			"nomer_transaksi"	=> $nomer_transaksi,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"kode_supplier"		=> $kode_supplier,
			"jumlah_barang"		=> $jumlah_barang,
			"satuan"			=> $satuan,
			"keterangan"		=> $keterangan
		);

		$temp = $this->model_barang_masuk->insert_data('barang_masuk', $data_add);
		if($temp >=1){
			redirect('barang_masuk/controller_barang_masuk/index');
		}
	}


	public function do_edit()
	{
		$nomer_transaksi	= $_POST['nomer_transaksi'];
		$tanggal			= $_POST['tanggal'];
		$kode_barang		= $_POST['kode_barang'];
		$kode_supplier		= $_POST['kode_supplier'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$satuan				= $_POST['satuan'];
		$keterangan			= $_POST['keterangan'];

		$data_edit = array(
			"nomer_transaksi"	=> $nomer_transaksi,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"kode_supplier"		=> $kode_supplier,
			"jumlah_barang"		=> $jumlah_barang,
			"satuan"			=> $satuan,
			"keterangan"		=> $keterangan
		);

		$where = array(
			"nomer_transaksi"	=> $nomer_transaksi
		);

		$temp = $this->model_barang_masuk->update_data('barang_masuk', $data_edit, $where);
		if($temp >=1){
			redirect('barang_masuk/controller_barang_masuk/index');
		}else{
			redirect('barang_masuk/controller_barang_masuk/edit_data');
		}
	}

	public function do_delete($nomer_transaksi)
	{
		$where = array(
			"nomer_transaksi" => $nomer_transaksi
			);

		$temp = $this->model_barang_masuk->delete_data('barang_masuk', $where);
		if($temp>= 1){
			redirect('barang_masuk/controller_barang_masuk/index');
		}
	}

	public function export_pdf(){
		$data['barang_masuk'] = $this->model_barang_masuk->get_barang_masuk();
		$this->load->view('backend/barang_masuk/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Barang-Masuk-'.$date, 'barang_masuk' => $this->model_barang_masuk->get_barang_masuk());
		$this->load->view('backend/barang_masuk/export_excel', $data);	
	}
}