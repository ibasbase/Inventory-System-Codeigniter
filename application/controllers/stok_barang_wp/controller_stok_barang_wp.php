<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_stok_barang_wp extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_stok_barang['stok_barang'] = $this->model_stok_barang_wp->get_stok_barang_wp();
		$data_stok_barang['masuk'] = $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/stok_barang_wp/view_stok_barang_wp', $data_stok_barang);
	}

	public function export_pdf(){
		$data['stok_barang'] = $this->model_stok_barang_wp->get_stok_barang_wp();
		$this->load->view('backend/stok_barang_wp/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Stok-Barang-'.$date, 'stok_barang' => $this->model_stok_barang_wp->get_stok_barang_wp());
		$this->load->view('backend/stok_barang_wp/export_excel', $data);	
	}
}