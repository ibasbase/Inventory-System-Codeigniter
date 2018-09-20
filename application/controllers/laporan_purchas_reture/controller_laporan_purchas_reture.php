<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_laporan_purchas_reture extends CI_Controller {

	public function index()
	{
		$data_laporan_purchas_reture['purchas_reture'] = $this->model_laporan_purchas_reture->get_laporan_purchas_reture();
		$data_laporan_purchas_reture['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/laporan_purchas_reture/view_laporan_purchas_reture', $data_laporan_purchas_reture);
	}

	public function do_delete($nomer_order)
	{
		$where = array(
			"nomer_order" => $nomer_order
			);

		$temp = $this->model_laporan_purchas_reture->delete_data('purchas_reture', $where);
		if($temp>= 1){
			redirect('laporan_purchas_reture/controller_laporan_purchas_reture');
		}
	}

	public function print_periode()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data_laporan_purchas_reture['purchas_reture']=  $this->model_laporan_purchas_reture->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('backend/laporan_purchas_reture/view_laporan_purchas_reture',$data_laporan_purchas_reture);
        }
        else
        {
            
            $data_laporan_purchas_reture['purchas_reture']=  $this->model_laporan_purchas_reture->laporan_default();
            $this->load->view('backend/laporan_purchas_reture/view_laporan_purchas_reture',$data_laporan_purchas_reture);
        }
    }

/*	public function cetak(){
    ob_start();
    $data_laporan_purchas_reture['purchas_reture'] = $this->model_laporan_purchas_reture->view_row();
    $this->load->view('backend/laporan_purchas_reture/view_print_purchas_reture', $data_laporan_purchas_reture);
    $html = ob_get_contents();
            ob_end_clean();
        
    require_once('/assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data ATK.pdf', 'D');
  }*/
}
