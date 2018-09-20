<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_order_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_order_barang['order_barang'] = $this->model_order_barang->get_order_barang();
		$data_order_barang['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/order_barang/view_order_barang', $data_order_barang);
		//$this->load->view('backend/order_barang/view_order_barang', array('data_order_barang' => $data_order_barang));

	}

	public function add_data()
	{
		//Data Combo kode barang
		$this->load->model('model_order_barang');
		$data['stok_barang'] = $this->model_order_barang->get_kode_barang();
		//Data Combo kode barang

		//Data combo supplier
		$this->load->model('model_order_barang');
		$data['stok_barang'] = $this->model_order_barang->get_nama_barang();
		//Data combo supplier

		$data['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/order_barang/view_add_order_barang', $data);
	}


	public function edit_data($nomer_order)
	{
		/*$data = array("konten"=>"backend/order_barang/view_order_barang");*/

		$order_barang = $this->model_order_barang->get_order_barang("where nomer_order = '$nomer_order'");

		foreach($order_barang->result_array()as $row){
			$nomer_order		= $row['nomer_order'];
			$tanggal 			= $row['tanggal'];
			$kode_barang 		= $row['kode_barang'];
			$nama_barang 		= $row['nama_barang'];
			$jumlah_order		= $row['jumlah_order'];
			$jumlah_kedatangan	= $row['jumlah_kedatangan'];
			$keterangan 		= $row['keterangan'];
		}

		$data['nomer_order']		= $nomer_order;
		$data['tanggal'] 			= $tanggal;
		$data['kode_barang'] 		= $kode_barang;
		$data['nama_barang'] 		= $nama_barang;
		$data['jumlah_order'] 		= $jumlah_order;
		$data['jumlah_kedatangan'] 	= $jumlah_kedatangan;
		$data['keterangan'] 		= $keterangan;

		$data['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/order_barang/view_edit_order_barang', $data);

		/*$edit = $this->model_order_barang->get_order_barang("where no = '$no'");

		$data = array(
			"no" 			=> $edit[0]['no'],
			"tanggal" 		=> $edit[0]['tanggal'],
			"kode_barang"	=> $edit[0]['kode_barang'],
			"kode_supplier"	=> $edit[0]['kode_supplier'],
			"jumlah_barang"	=> $edit[0]['jumlah_barang'],
			"satuan"		=> $edit[0]['satuan'],
			"keterangan"	=> $edit[0]['keterangan']
		);

		$this->load->view('backend/order_barang/view_edit_order_barang', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$nomer_order		= $_POST['nomer_order'];
		$tanggal			= date("Y-m-d");
		$kode_barang		= $_POST['kode_barang'];
		$nama_barang		= $_POST['nama_barang'];
		$jumlah_order		= $_POST['jumlah_order'];
		$jumlah_kedatangan	= $_POST['jumlah_kedatangan'];
		$keterangan			= $_POST['keterangan'];

		$data_add = array(
			"nomer_order"		=> $nomer_order,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"nama_barang"		=> $nama_barang,
			"jumlah_order"		=> $jumlah_order,
			"jumlah_kedatangan"	=> 0,
			"keterangan"		=> $keterangan
		);

		$temp = $this->model_order_barang->insert_data('order_barang', $data_add);
		if($temp >=1){
			redirect('order_barang/controller_order_barang/index');
		}
	}


	public function do_edit()
	{
		$nomer_order		= $_POST['nomer_order'];
		$tanggal			= $_POST['tanggal'];
		$kode_barang		= $_POST['kode_barang'];
		$nama_barang		= $_POST['nama_barang'];
		$jumlah_order		= $_POST['jumlah_order'];
		$jumlah_kedatangan	= $_POST['jumlah_kedatangan'];
		$keterangan			= $_POST['keterangan'];

		$data_edit = array(
			"nomer_order"		=> $nomer_order,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"nama_barang"		=> $nama_barang,
			"jumlah_order"		=> $jumlah_order,
			"jumlah_kedatangan"	=> $jumlah_kedatangan,
			"keterangan"		=> $keterangan
		);

		$where = array(
			"nomer_order"	=> $nomer_order
		);

		$temp = $this->model_order_barang->update_data('order_barang', $data_edit, $where);
		if($temp >=1){
			redirect('order_barang/controller_order_barang/index');
		}else{
			redirect('order_barang/controller_order_barang/edit_data');
		}
	}

	public function do_delete($nomer_order)
	{
		$where = array(
			"nomer_order" => $nomer_order
			);

		$temp = $this->model_order_barang->delete_data('order_barang', $where);
		if($temp>= 1){
			redirect('order_barang/controller_order_barang/index');
		}
	}

	public function export_pdf(){
		$data['order_barang'] = $this->model_order_barang->get_order_barang();
		$this->load->view('backend/order_barang/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Barang-Masuk-'.$date, 'order_barang' => $this->model_order_barang->get_order_barang());
		$this->load->view('backend/order_barang/export_excel', $data);	
	}
}