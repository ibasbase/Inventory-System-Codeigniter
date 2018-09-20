<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_barang_keluar extends CI_Controller {

	public function index()
	{
		$data_laporan_barang_keluar['barang_keluar'] = $this->model_laporan_barang_keluar->get_barang_keluar();
		$data_laporan_barang_keluar['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_barang_keluar/view_laporan_barang_keluar', $data_laporan_barang_keluar);
	}

	public function do_delete($kode_barang)
	{
		$where = array(
			"kode_barang" => $kode_barang
			);

		$temp = $this->model_laporan_barang_keluar->delete_data('barang_keluar', $where);
		if($temp>= 1){
			redirect('laporan_barang_keluar/controller_laporan_barang_keluar');
		}
	}

	public function print_periode()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data_laporan_barang_keluar['barang_keluar']=  $this->model_laporan_barang_keluar->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('backend/laporan_barang_keluar/view_laporan_barang_keluar',$data_laporan_barang_keluar);
        }
        else
        {
            
            $data_laporan_barang_keluar['barang_keluar']=  $this->model_laporan_barang_keluar->laporan_default();
            $this->load->view('backend/laporan_barang_keluar/view_laporan_barang_keluar',$data_laporan_barang_keluar);
        }
    }

/*	public function cetak(){
    ob_start();
    $data_laporan_barang_keluar['barang_keluar'] = $this->model_laporan_barang_keluar->view_row();
    $this->load->view('backend/laporan_barang_keluar/view_print_barang_keluar', $data_laporan_barang_keluar);
    $html = ob_get_contents();
            ob_end_clean();
        
    require_once('/assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data ATK.pdf', 'D');
  }*/
}
