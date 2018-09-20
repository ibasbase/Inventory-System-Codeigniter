<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_purchas_receivingrtr extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_purchas_receivingrtr['purchas_receivingrtr'] = $this->model_purchas_receivingrtr->get_purchas_receivingrtr();
		$data_purchas_receivingrtr['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/purchas_receivingrtr/view_purchas_receivingrtr', $data_purchas_receivingrtr);
		//$this->load->view('backend/purchas_receivingrtr/view_purchas_receivingrtr', array('data_purchas_receivingrtr' => $data_purchas_receivingrtr));

	}

	public function add_data()
	{
		//Data Combo kode barang
		$this->load->model('model_purchas_receivingrtr');
		$data['reture_barang'] = $this->model_purchas_receivingrtr->get_kode_barang();
		//Data Combo kode barang

		//Data combo supplier
		$this->load->model('model_purchas_receivingrtr');
		$data['reture_barang'] = $this->model_purchas_receivingrtr->get_nama_barang();
		//Data combo supplier

		$data['masuk'] = $this->model_cart->count_cart();
		$this->load->view('backend/purchas_receivingrtr/view_add_purchas_receivingrtr', $data);
	}


	public function edit_data($nomer_receivingrtr)
	{
		/*$data = array("konten"=>"backend/purchas_receivingrtr/view_purchas_receivingrtr");*/

		$purchas_receivingrtr = $this->model_purchas_receivingrtr->get_purchas_receivingrtr("where nomer_receivingrtr = '$nomer_receivingrtr'");

		foreach($purchas_receivingrtr->result_array()as $row){
			$nomer_receivingrtr	= $row['nomer_receivingrtr'];
			$nomer_reture		= $row['nomer_reture'];
			$tanggal 			= $row['tanggal'];
			$kode_barang 		= $row['kode_barang'];
			$jumlah_barang 		= $row['jumlah_barang'];
			$keterangan_barang	= $row['keterangan_barang'];
		}

		$data['nomer_receivingrtr']	= $nomer_receivingrtr;
		$data['nomer_reture']		= $nomer_reture;
		$data['tanggal'] 			= $tanggal;
		$data['kode_barang'] 		= $kode_barang;
		$data['jumlah_barang'] 		= $jumlah_barang;
		$data['keterangan_barang'] 	= $keterangan_barang;

		$data['masuk'] = $this->model_cart->count_cart();
		$this->load->view('backend/purchas_receivingrtr/view_edit_purchas_receivingrtr', $data);

		/*$edit = $this->model_purchas_receivingrtr->get_purchas_receivingrtr("where no = '$no'");

		$data = array(
			"no" 			=> $edit[0]['no'],
			"tanggal" 		=> $edit[0]['tanggal'],
			"kode_barang"	=> $edit[0]['kode_barang'],
			"kode_supplier"	=> $edit[0]['kode_supplier'],
			"jumlah_barang"	=> $edit[0]['jumlah_barang'],
			"satuan"		=> $edit[0]['satuan'],
			"keterangan"	=> $edit[0]['keterangan']
		);

		$this->load->view('backend/purchas_receivingrtr/view_edit_purchas_receivingrtr', $data);*/

	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$nomer_receivingrtr	= $_POST['nomer_receivingrtr'];
		$nomer_reture		= $_POST['nomer_reture'];
		$tanggal			= date("Y-m-d");
		$kode_barang		= $_POST['kode_barang'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$keterangan_barang	= $_POST['keterangan_barang'];

		$data_add = array(
			"nomer_receivingrtr"=> $nomer_receivingrtr,
			"nomer_reture"		=> $nomer_reture,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"jumlah_barang"		=> $jumlah_barang,
			"keterangan_barang"	=> $keterangan_barang
		);

		$temp = $this->model_purchas_receivingrtr->insert_data('purchas_receivingrtr', $data_add);
		if($temp >=1){
			redirect('purchas_receivingrtr/controller_purchas_receivingrtr/index');
		}
	}


	public function do_edit()
	{
		$nomer_receivingrtr	= $_POST['nomer_receivingrtr'];
		$nomer_reture		= $_POST['nomer_reture'];
		$tanggal			= $_POST['tanggal'];
		$kode_barang		= $_POST['kode_barang'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$keterangan_barang	= $_POST['keterangan_barang'];

		$data_edit = array(
			"nomer_receivingrtr"=> $nomer_receivingrtr,
			"nomer_reture"		=> $nomer_reture,
			"tanggal"			=> $tanggal,
			"kode_barang"		=> $kode_barang,
			"jumlah_barang"		=> $jumlah_barang,
			"keterangan_barang"	=> $keterangan_barang
		);

		$where = array(
			"nomer_receivingrtr"	=> $nomer_receivingrtr
		);

		$temp = $this->model_purchas_receivingrtr->update_data('purchas_receivingrtr', $data_edit, $where);
		if($temp >=1){
			redirect('purchas_receivingrtr/controller_purchas_receivingrtr/index');
		}else{
			redirect('purchas_receivingrtr/controller_purchas_receivingrtr/edit_data');
		}
	}

	public function do_delete($nomer_receivingrtr)
	{
		$where = array(
			"nomer_receivingrtr" => $nomer_receivingrtr
			);

		$temp = $this->model_purchas_receivingrtr->delete_data('purchas_receivingrtr', $where);
		if($temp>= 1){
			redirect('purchas_receivingrtr/controller_purchas_receivingrtr/index');
		}
	}

	public function export_pdf(){
		$data['purchas_receivingrtr'] = $this->model_purchas_receivingrtr->get_purchas_receivingrtr();
		$this->load->view('backend/purchas_receivingrtr/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Barang-Masuk-'.$date, 'purchas_receivingrtr' => $this->model_purchas_receivingrtr->get_purchas_receivingrtr());
		$this->load->view('backend/purchas_receivingrtr/export_excel', $data);	
	}
}