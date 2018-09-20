<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_login extends CI_Controller {

	public function _construct(){
		session_start();
	}

	public function index(){
		$cek = $this->session->userdata("status");

		if(empty($cek)){
			$this->load->view('backend/login');
		}else{
			$status = $this->session->userdata("status");
			if($status == "admin"){
				header("location: ".base_url()."Dashboard");
			}elseif($status == "warehouse"){
				header("lcoation: ".base_url()."visi_misi");
			}elseif($status == "purchasing"){
				header("lcoation: ".base_url()."visi_misi");
			}
		}
	}


	public function logout(){
		$cek = $this->session->userdata("username");
		if(empty($cek)) {
			header("location:".base_url());
		}else{
			$this->session->sess_destroy();
			header("location:".base_url());
		}
	}
}
