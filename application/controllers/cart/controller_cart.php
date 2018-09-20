<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_cart extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_cart['cart'] 		= $this->model_cart->get_cart();
		$data_cart['masuk'] 	= $this->model_cart->count_cart();	

		$this->load->view('backend/cart/view_cart', $data_cart);
	}

	public function add_data()
	{
		$this->load->view('backend/cart/view_add_cart');
	}

	public function edit_data($nomer_transaksi)
	{
		$cart = $this->model_cart->get_cart("where nomer_transaksi ='$nomer_transaksi'");

		foreach($cart->result_array()as $row){
			$nomer_transaksi 	= $row['nomer_transaksi'];
			$tanggal 			= $row['tanggal'];
			$kode_barang 		= $row['kode_barang'];
			$jumlah_barang 		= $row['jumlah_barang'];
			$satuan 			= $row['satuan'];
			$keterangan 		= $row['keterangan'];
		}

		$data['nomer_transaksi']	= $nomer_transaksi;
		$data['tanggal']			= $tanggal;
		$data['kode_barang'] 		= $kode_barang;
		$data['jumlah_barang']		= $jumlah_barang;
		$data['satuan'] 			= $satuan;
		$data['keterangan']			= $keterangan;
		$this->load->view('backend/barang_keluar/view_edit_barang_keluar', $data);
	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$nomer_transaksi	= $_POST['nomer_transaksi'];
		$tanggal			= $_POST['tanggal'];
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
		if($temp >=1)
		$temp = $this->model_cart->insert_data('cart', $data_add);
		if($temp >=1){
			redirect('barang_keluar/controller_barang_keluar/add_data');
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

		$temp = $this->model_cart->update_data('cart', $data_edit, $where);
		if($temp >=1){
			redirect('cart/controller_cart/index');
		}else{
			redirect('cart/controller_cart/edit_data');
		}
	}

	public function do_delete($nomer_transaksi)
	{
		$where = array(
			"nomer_transaksi" => $nomer_transaksi
			);

		$temp = $this->model_cart->delete_data('cart', $where);
		if($temp>= 1){
			redirect('cart/controller_cart/index');
		}
	}

	public function export_pdf(){
		$data['cart'] = $this->model_cart->get_cart();
		$this->load->view('backend/cart/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Cart-'.$date, 'cart' => $this->model_cart->get_cart());
		$this->load->view('backend/cart/export_excel', $data);	
	}
}

