<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_reture_barang extends CI_Controller {

	public function index()
	{
		$data_reture_barang['reture_barang'] = $this->model_reture_barang->get_reture_barang();
		$data_reture_barang['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_reture_barang/view_laporan_reture_barang', $data_reture_barang);
		//$this->load->view('backend/reture_barang/view_reture_barang', array('data_reture_barang' => $data_reture_barang));
	}

	public function print_periode()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data_laporan_reture_barang['reture_barang']=  $this->model_laporan_reture_barang->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('backend/laporan_reture_barang/view_laporan_reture_barang',$data_laporan_reture_barang);
        }
        else
        {
            
            $data_laporan_reture_barang['reture_barang']=  $this->model_laporan_reture_barang->laporan_default();
            $this->load->view('backend/laporan_reture_barang/view_laporan_reture_barang',$data_laporan_reture_barang);
        }
    }
}