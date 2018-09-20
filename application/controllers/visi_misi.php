<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class visi_misi extends CI_Controller {

	public function index()
	{
		$data_cart['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/visi_misi', $data_cart);
	}
}
