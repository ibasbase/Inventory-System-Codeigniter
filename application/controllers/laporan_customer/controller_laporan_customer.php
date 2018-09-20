<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_customer extends CI_Controller {

	public function index()
	{
		$data_laporan_customer['customer'] = $this->model_laporan_customer->get_laporan_customer();
		$data_laporan_customer['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_customer/view_laporan_customer', $data_laporan_customer);
	}

	public function do_delete($kode_customer)
	{
		$where = array(
			"kode_customer" => $kode_customer
			);

		$temp = $this->model_laporan_customer->delete_data('customer', $where);
		if($temp>= 1){
			redirect('laporan_customer/controller_laporan_customer');
		}
	}

/*	public function cetak(){
    ob_start();
    $data_laporan_customer['customer'] = $this->model_laporan_customer->view_row();
    $this->load->view('backend/laporan_customer/view_print_customer', $data_laporan_customer);
    $html = ob_get_contents();
            ob_end_clean();
        
    require_once('/assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data ATK.pdf', 'D');
  }*/
}
