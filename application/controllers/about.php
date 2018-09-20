<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$data_cart['masuk'] 	= $this->model_cart->count_cart(); //note cart
		$this->load->view('backend/About', $data_cart);
	}
}
