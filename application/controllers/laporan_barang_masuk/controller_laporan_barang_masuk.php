<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_barang_masuk extends CI_Controller {

	public function index()
	{
		$data_laporan_barang_masuk['barang_masuk'] = $this->model_laporan_barang_masuk->get_barang_masuk();
		$data_laporan_barang_masuk['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_barang_masuk/view_laporan_barang_masuk', $data_laporan_barang_masuk);
	}

	public function do_delete($kode_barang)
	{
		$where = array(
			"kode_barang" => $kode_barang
			);

		$temp = $this->model_laporan_barang_masuk->delete_data('barang_masuk', $where);
		if($temp>= 1){
			redirect('laporan_barang_masuk/controller_laporan_barang_masuk');
		}
	}

	public function print_periode()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data_laporan_barang_masuk['barang_masuk']=  $this->model_laporan_barang_masuk->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('backend/laporan_barang_masuk/view_laporan_barang_masuk',$data_laporan_barang_masuk);
        }
        else
        {
            
            $data_laporan_barang_masuk['barang_masuk']=  $this->model_laporan_barang_masuk->laporan_default();
            $this->load->view('backend/laporan_barang_masuk/view_laporan_barang_masuk',$data_laporan_barang_masuk);
        }
    }
}
