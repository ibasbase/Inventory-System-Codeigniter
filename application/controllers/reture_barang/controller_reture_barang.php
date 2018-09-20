<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_reture_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_reture_barang['reture_barang'] = $this->model_reture_barang->get_reture_barang();
		$data_reture_barang['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/reture_barang/view_reture_barang', $data_reture_barang);
		//$this->load->view('backend/reture_barang/view_reture_barang', array('data_reture_barang' => $data_reture_barang));

	}

	public function add_data()
	{
		//Data Combo kode barang
		$this->load->model('model_reture_barang');
		$data['stok_barang'] = $this->model_reture_barang->get_kode_barang();
		//Data Combo kode barang

		//Data combo supplier
		$this->load->model('model_reture_barang');
		$data['stok_barang'] = $this->model_reture_barang->get_nama_barang();
		//Data combo supplier

		$data['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/reture_barang/view_add_reture_barang', $data);
	}


	public function edit_data($nomer_reture)
	{
		/*$data = array("konten"=>"backend/reture_barang/view_reture_barang");*/

		$reture_barang = $this->model_reture_barang->get_reture_barang("where nomer_reture = '$nomer_reture'");

		foreach($reture_barang->result_array()as $row){
			$nomer_reture		= $row['nomer_reture'];
			$tanggal 			= $row['tanggal'];
			$kode_barang 		= $row['kode_barang'];
			$nama_barang 		= $row['nama_barang'];
			$jumlah_reture		= $row['jumlah_reture'];
			$jumlah_kedatangan	= $row['jumlah_kedatangan'];
			$keterangan 		= $row['keterangan'];
		}

		$data['nomer_reture']		= $nomer_reture;
		$data['tanggal'] 			= $tanggal;
		$data['kode_barang'] 		= $kode_barang;
		$data['nama_barang'] 		= $nama_barang;
		$data['jumlah_reture'] 		= $jumlah_reture;
		$data['jumlah_kedatangan'] 	= $jumlah_kedatangan;
		$data['keterangan'] 		= $keterangan;

		$data['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/reture_barang/view_edit_reture_barang', $data);

		/*$edit = $this->model_reture_barang->get_reture_barang("where no = '$no'");

		$data = array(
			"no" 			=> $edit[0]['no'],
			"tanggal" 		=> $edit[0]['tanggal'],
			"kode_barang"	=> $edit[0]['kode_barang'],
			"kode_supplier"	=> $edit[0]['kode_supplier'],
			"jumlah_barang"	=> $edit[0]['jumlah_barang'],
			"satuan"		=> $edit[0]['satuan'],
			"keterangan"	=> $edit[0]['keterangan']
		);

		$this->load->view('backend/reture_barang/view_edit_reture_barang', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$nomer_reture		= $_POST['nomer_reture'];
		$tanggal			= date("Y-m-d");
		$kode_barang		= $_POST['kode_barang'];
		$nama_barang		= $_POST['nama_barang'];
		$jumlah_reture		= $_POST['jumlah_reture'];
		$jumlah_kedatangan	= $_POST['jumlah_kedatangan'];
		$keterangan			= $_POST['keterangan'];

		$data_add = array(
			"nomer_reture"		=> $nomer_reture,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"nama_barang"		=> $nama_barang,
			"jumlah_reture"		=> $jumlah_reture,
			"jumlah_kedatangan"	=> 0,
			"keterangan"		=> $keterangan
		);

		$temp = $this->model_reture_barang->insert_data('reture_barang', $data_add);
		if($temp >=1){
			redirect('reture_barang/controller_reture_barang/index');
		}
	}


	public function do_edit()
	{
		$nomer_reture		= $_POST['nomer_reture'];
		$tanggal			= $_POST['tanggal'];
		$kode_barang		= $_POST['kode_barang'];
		$nama_barang		= $_POST['nama_barang'];
		$jumlah_reture		= $_POST['jumlah_reture'];
		$jumlah_kedatangan	= $_POST['jumlah_kedatangan'];
		$keterangan			= $_POST['keterangan'];

		$data_edit = array(
			"nomer_reture"		=> $nomer_reture,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"nama_barang"		=> $nama_barang,
			"jumlah_reture"		=> $jumlah_reture,
			"jumlah_kedatangan"	=> $jumlah_kedatangan,
			"keterangan"		=> $keterangan
		);

		$where = array(
			"nomer_reture"	=> $nomer_reture
		);

		$temp = $this->model_reture_barang->update_data('reture_barang', $data_edit, $where);
		if($temp >=1){
			redirect('reture_barang/controller_reture_barang/index');
		}else{
			redirect('reture_barang/controller_reture_barang/edit_data');
		}
	}

	public function do_delete($nomer_reture)
	{
		$where = array(
			"nomer_reture" => $nomer_reture
			);

		$temp = $this->model_reture_barang->delete_data('reture_barang', $where);
		if($temp>= 1){
			redirect('reture_barang/controller_reture_barang/index');
		}
	}

	public function export_pdf(){
		$data['reture_barang'] = $this->model_reture_barang->get_reture_barang();
		$this->load->view('backend/reture_barang/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Barang-Masuk-'.$date, 'reture_barang' => $this->model_reture_barang->get_reture_barang());
		$this->load->view('backend/reture_barang/export_excel', $data);	
	}
}