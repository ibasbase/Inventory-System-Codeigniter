<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_purchas_receivingrtr extends CI_Controller {

	public function index()
	{
		$data_laporan_purchas_receivingrtr['purchas_receivingrtr'] = $this->model_laporan_purchas_receivingrtr->get_laporan_purchas_receivingrtr();
		$data_laporan_purchas_receivingrtr['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_purchas_receivingrtr/view_laporan_purchas_receivingrtr', $data_laporan_purchas_receivingrtr);
	}

	public function do_delete($nomer_receiving)
	{
		$where = array(
			"nomer_receiving" => $nomer_receiving
			);

		$temp = $this->model_laporan_purchas_receiving->delete_data('purchas_receiving', $where);
		if($temp>= 1){
			redirect('laporan_purchas_receiving/controller_laporan_purchas_receiving');
		}
	}

	public function print_periode()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data_laporan_purchas_receivingrtr['purchas_receivingrtr']=  $this->model_laporan_purchas_receivingrtr->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('backend/laporan_purchas_receivingrtr/view_laporan_purchas_receivingrtr',$data_laporan_purchas_receivingrtr);
        }
        else
        {
            
            $data_laporan_purchas_receivingrtr['purchas_receivingrtrtr']=  $this->model_laporan_purchas_receivingrtr->laporan_default();
            $this->load->view('backend/laporan_purchas_receivingrtr/view_laporan_purchas_receivingrtr',$data_laporan_purchas_receivingrtr);
        }
    }

/*	public function cetak(){
    ob_start();
    $data_laporan_purchas_order['purchas_order'] = $this->model_laporan_purchas_order->view_row();
    $this->load->view('backend/laporan_purchas_order/view_print_purchas_order', $data_laporan_purchas_order);
    $html = ob_get_contents();
            ob_end_clean();
        
    require_once('/assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data ATK.pdf', 'D');
  }*/
}
