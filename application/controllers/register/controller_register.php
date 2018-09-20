<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_register extends CI_Controller {

	public function index()
	{
		$data_register['register'] = $this->model_register->get_register();
		$data_register['masuk'] = $this->model_cart->count_cart(); //mote cart
		$this->load->view('backend/register/view_register', $data_register);
	}

	public function add_data()
	{
		$data_register['masuk'] = $this->model_cart->count_cart(); //mote cart
		$this->load->view('backend/register/view_add_register', $data_register);
	}

/*---------------------------------------------------------------------------------*/

	public function do_add()
	{
		$nama_depan		= $_POST['nama_depan'];
		$nama_belakang	= $_POST['nama_belakang'];
		$tanggal		= date("Y-m-d");
		$username		= $_POST['username'];
		$password		= $_POST['password'];
		$status			= $_POST['status'];

		$dir_upload	= "gambar_upload/";
		$foto		= $_FILES['file']['name'];

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$cek = move_uploaded_file($_FILES['file']['tmp_name'], $dir_upload.$foto);
		}

		$data_add = array(
			"nama_depan"	=> $nama_depan,
			"nama_belakang"	=> $nama_belakang,
			"tanggal"		=> $tanggal,
			"username"		=> $username,
			"password"		=> md5($password),
			"status"		=> $status,
			"foto"			=> $foto
		);

		$temp = $this->model_register->insert_data('register', $data_add);
		if($temp >=1){
			redirect('register/controller_register/index');
		}
	}

	public function do_delete($nama_depan)
	{
		$where = array(
			"nama_depan" => $nama_depan
			);

		$temp = $this->model_register->delete_data('register', $where);
		if($temp>= 1){
			redirect('register/controller_register/index');
		}
	}
}

