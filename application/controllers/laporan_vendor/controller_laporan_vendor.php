<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_vendor extends CI_Controller {

	public function index()
	{
		$data_laporan_vendor['vendor'] = $this->model_laporan_vendor->get_laporan_vendor();
		$data_laporan_vendor['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_vendor/view_laporan_vendor', $data_laporan_vendor);
	}

	public function do_delete($kode_vendor)
	{
		$where = array(
			"kode_vendor" => $kode_vendor
			);

		$temp = $this->model_laporan_vendor->delete_data('vendor', $where);
		if($temp>= 1){
			redirect('laporan_vendor/controller_laporan_vendor');
		}
	}

/*	public function cetak(){
    ob_start();
    $data_laporan_vendor['vendor'] = $this->model_laporan_vendor->view_row();
    $this->load->view('backend/laporan_vendor/view_print_vendor', $data_laporan_vendor);
    $html = ob_get_contents();
            ob_end_clean();
        
    require_once('/assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data ATK.pdf', 'D');
  }*/
}
