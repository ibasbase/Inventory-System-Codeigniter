<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_stok_barang extends CI_Controller {

	public function index()
	{
		$data_laporan_stok_barang['stok_barang'] = $this->model_laporan_stok_barang->get_laporan_stok_barang();
		$data_laporan_stok_barang['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_stok_barang/view_laporan_stok_barang', $data_laporan_stok_barang);
	}

	public function do_delete($kode_barang)
	{
		$where = array(
			"kode_barang" => $kode_barang
			);

		$temp = $this->model_laporan_stok_barang->delete_data('stok_barang', $where);
		if($temp>= 1){
			redirect('laporan_stok_barang/controller_laporan_stok_barang');
		}
	}

/*	public function cetak(){
    ob_start();
    $data_laporan_stok_barang['stok_barang'] = $this->model_laporan_stok_barang->view_row();
    $this->load->view('backend/laporan_stok_barang/view_print_stok_barang', $data_laporan_stok_barang);
    $html = ob_get_contents();
            ob_end_clean();
        
    require_once('/assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data ATK.pdf', 'D');
  }*/
}
