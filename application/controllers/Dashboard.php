<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('status');

		if($cek == "admin"){
			$data_cart['masuk'] 	= $this->model_cart->count_cart(); //note cart
			$this->load->view('backend/dashboard', $data_cart);	
		}elseif($cek == "warehouse"){
			$this->load->view('backend/dashboard');
		}elseif($cek == "purchasing"){
			$this->load->view('backend/dashboard');
		}elseif($cek == "user"){
			$this->load->view('backend/dashboard');
		}
	}
}
