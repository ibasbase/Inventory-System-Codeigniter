<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_order_barang extends CI_Controller {

	public function index()
	{
		$data_laporan_order_barang['order_barang'] = $this->model_laporan_order_barang->get_laporan_order_barang();
		$data_laporan_order_barang['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_order_barang/view_laporan_order_barang', $data_laporan_order_barang);
	}

	public function do_delete($nomer_order)
	{
		$where = array(
			"nomer_order" => $nomer_order
			);

		$temp = $this->model_laporan_order_barang->delete_data('order_barang', $where);
		if($temp>= 1){
			redirect('laporan_order_barang/controller_laporan_order_barang');
		}
	}

	public function print_periode()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data_laporan_order_barang['order_barang']=  $this->model_laporan_order_barang->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('backend/laporan_order_barang/view_laporan_order_barang',$data_laporan_order_barang);
        }
        else
        {
            
            $data_laporan_order_barang['order_barang']=  $this->model_laporan_order_barang->laporan_default();
            $this->load->view('backend/laporan_order_barang/view_laporan_order_barang',$data_laporan_order_barang);
        }
    }

/*	public function cetak(){
    ob_start();
    $data_laporan_order_barang['order_barang'] = $this->model_laporan_order_barang->view_row();
    $this->load->view('backend/laporan_order_barang/view_print_order_barang', $data_laporan_order_barang);
    $html = ob_get_contents();
            ob_end_clean();
        
    require_once('/assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data ATK.pdf', 'D');
  }*/
}
