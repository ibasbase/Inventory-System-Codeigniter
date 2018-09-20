<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_stok_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_stok_barang['stok_barang'] = $this->model_stok_barang->get_stok_barang();
		$data_stok_barang['masuk'] = $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/stok_barang/view_stok_barang', $data_stok_barang);
	}

	public function add_data()
	{
		$data_stok_barang['masuk'] = $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/stok_barang/view_add_barang', $data_stok_barang);
	}


	public function edit_data($kode_barang)
	{
		$stok_barang = $this->model_stok_barang->get_stok_barang("where kode_barang ='$kode_barang'");

		foreach($stok_barang->result_array()as $row){
			$kode_barang	= $row['kode_barang'];
			$nama_barang	= $row['nama_barang'];
			$jenis_barang	= $row['jenis_barang'];
			$stok 			= $row['stok'];
		}

		$data['kode_barang'] 	= $kode_barang;
		$data['nama_barang']	= $nama_barang;
		$data['jenis_barang'] 	= $jenis_barang;
		$data['stok']			= $stok;

		$data['masuk'] = $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/stok_barang/view_edit_barang', $data);

		/*$edit = $this->model_stok_barang->get_stok_barang("where no = '$no'");

		$data = array(
			"no" 			=> $edit[0]['no'],
			"kode_barang" 	=> $edit[0]['kode_barang'],
			"nama_barang"	=> $edit[0]['nama_barang'],
			"jenis_barang"	=> $edit[0]['jenis_barang'],
			"stok"			=> $edit[0]['stok']
		);

		$this->load->view('backend/stok_barang/view_edit_barang', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$kode_barang		= $_POST['kode_barang'];
		$nama_barang		= $_POST['nama_barang'];
		$jenis_barang		= $_POST['jenis_barang'];
		$stok				= $_POST['stok'];

		$data_add = array(
			"kode_barang"		=> $kode_barang,
			"nama_barang"		=> $nama_barang,
			"jenis_barang"		=> $jenis_barang,
			"stok"				=> $stok
		);

		$temp = $this->model_stok_barang->insert_data('stok_barang', $data_add);
		if($temp >=1){
			redirect('stok_barang/controller_stok_barang/index');
		}
	}


	public function do_edit()
	{
		$kode_barang	= $_POST['kode_barang'];
		$nama_barang	= $_POST['nama_barang'];
		$jenis_barang	= $_POST['jenis_barang'];
		$stok			= $_POST['stok'];

		$data_edit = array(
			"kode_barang"	=> $kode_barang,
			"nama_barang"	=> $nama_barang,
			"jenis_barang"	=> $jenis_barang,
			"stok"			=> $stok
		);

		$where = array(
			"kode_barang"	=> $kode_barang
		);

		$temp = $this->model_stok_barang->update_data('stok_barang', $data_edit, $where);
		if($temp >=1){
			redirect('stok_barang/controller_stok_barang/index');
		}else{
			redirect('stok_barang/controller_stok_barang/edit_data');
		}
	}

	public function do_delete($kode_barang)
	{
		$where = array(
			"kode_barang" => $kode_barang
			);

		$temp = $this->model_stok_barang->delete_data('stok_barang', $where);
		if($temp>= 1){
			redirect('stok_barang/controller_stok_barang/index');
		}
	}

	public function export_pdf(){
		$data['stok_barang'] = $this->model_stok_barang->get_stok_barang();
		$this->load->view('backend/stok_barang/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Stok-Barang-'.$date, 'stok_barang' => $this->model_stok_barang->get_stok_barang());
		$this->load->view('backend/stok_barang/export_excel', $data);	
	}
}