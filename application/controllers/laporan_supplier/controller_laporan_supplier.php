<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_supplier extends CI_Controller {

	public function index()
	{
		$data_laporan_supplier['supplier'] = $this->model_laporan_supplier->get_laporan_supplier();
		$data_laporan_supplier['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_supplier/view_laporan_supplier', $data_laporan_supplier);
	}

	public function do_delete($kode_supplier)
	{
		$where = array(
			"kode_supplier" => $kode_supplier
			);

		$temp = $this->model_laporan_supplier->delete_data('supplier', $where);
		if($temp>= 1){
			redirect('laporan_supplier/controller_laporan_supplier');
		}
	}

/*	public function cetak(){
    ob_start();
    $data_laporan_supplier['supplier'] = $this->model_laporan_supplier->view_row();
    $this->load->view('backend/laporan_supplier/view_print_supplier', $data_laporan_supplier);
    $html = ob_get_contents();
            ob_end_clean();
        
    require_once('/assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data ATK.pdf', 'D');
  }*/
}
