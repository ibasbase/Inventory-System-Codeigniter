<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_purchas_order extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_purchas_order['order_barang'] = $this->model_purchas_order->get_purchas_order();
		$data_purchas_order['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/purchas_order/view_purchas_order', $data_purchas_order);
		//$this->load->view('backend/purchas_order/view_purchas_order', array('data_purchas_order' => $data_purchas_order));

	}

	public function add_data()
	{
		//Data Combo kode barang
		$this->load->model('model_purchas_order');
		$data['stok_barang'] = $this->model_purchas_order->get_kode_barang();
		//Data Combo kode barang

		//Data combo supplier
		$this->load->model('model_purchas_order');
		$data['stok_barang'] = $this->model_purchas_order->get_nama_barang();
		//Data combo supplier

		$data['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/purchas_order/view_add_purchas_order', $data);
	}


	public function edit_data($nomer_order)
	{
		/*$data = array("konten"=>"backend/purchas_order/view_purchas_order");*/

		$purchas_order = $this->model_purchas_order->get_purchas_order("where nomer_order = '$nomer_order'");

		foreach($purchas_order->result_array()as $row){
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
		$this->load->view('backend/purchas_order/view_edit_purchas_order', $data);

		/*$edit = $this->model_purchas_order->get_purchas_order("where no = '$no'");

		$data = array(
			"no" 			=> $edit[0]['no'],
			"tanggal" 		=> $edit[0]['tanggal'],
			"kode_barang"	=> $edit[0]['kode_barang'],
			"kode_supplier"	=> $edit[0]['kode_supplier'],
			"jumlah_barang"	=> $edit[0]['jumlah_barang'],
			"satuan"		=> $edit[0]['satuan'],
			"keterangan"	=> $edit[0]['keterangan']
		);

		$this->load->view('backend/purchas_order/view_edit_purchas_order', $data);*/

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
			"jumlah_kedatangan"	=> $jumlah_kedatangan,
			"keterangan"		=> $keterangan
		);

		$temp = $this->model_purchas_order->insert_data('order_barang', $data_add);
		if($temp >=1){
			redirect('purchas_order/controller_purchas_order/index');
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

		$temp = $this->model_purchas_order->update_data('order_barang', $data_edit, $where);
		if($temp >=1){
			redirect('purchas_order/controller_purchas_order/index');
		}else{
			redirect('purchas_order/controller_purchas_order/edit_data');
		}
	}

	public function do_delete($nomer_order)
	{
		$where = array(
			"nomer_order" => $nomer_order
			);

		$temp = $this->model_purchas_order->delete_data('order_barang', $where);
		if($temp>= 1){
			redirect('purchas_order/controller_purchas_order/index');
		}
	}

	public function export_pdf(){
		$data['order_barang'] = $this->model_purchas_order->get_purchas_order();
		$this->load->view('backend/purchas_order/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Barang-Masuk-'.$date, 'order_barang' => $this->model_purchas_order->get_purchas_order());
		$this->load->view('backend/purchas_order/export_excel', $data);	
	}
}