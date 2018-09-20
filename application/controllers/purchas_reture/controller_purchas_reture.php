<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_purchas_reture extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data_purchas_reture['reture_barang'] = $this->model_purchas_reture->get_purchas_reture();
		$data_purchas_reture['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/purchas_reture/view_purchas_reture', $data_purchas_reture);
		//$this->load->view('backend/reture_barang/view_reture_barang', array('data_reture_barang' => $data_reture_barang));

	}

	public function export_pdf(){
		$data['reture_barang'] = $this->model_purchas_reture->get_purchas_reture();
		$this->load->view('backend/purchas_reture/export_pdf', $data);
	}

	public function export_excel(){
		$date = date("Y-m-d");
		$data = array('title' => 'Laporan-Barang-Masuk-'.$date, 'reture_barang' => $this->model_reture_barang->get_reture_barang());
		$this->load->view('backend/purchas_reture/export_excel', $data);	
	}
}