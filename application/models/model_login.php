<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_Model {

	public function getlogin($user, $password){
		$u = $user;
		$p = md5($password);
		$cek_login = $this->db->get_where('register', array('username' => $u, 'password' => $p ));

		if ($cek_login->num_rows() > 0) {
			$qad = $cek_login->row();
			if ($u == $qad->username && $p == $qad->password){
				$sess = array(
					'username' 	=> $qad->username,
					'status' 	=> $qad->status,
				);

				$this->session->set_userdata($sess);

				if($qad->status == 'admin') {
					header('location:'.base_url().'Dashboard');
				}elseif($qad->status == 'warehouse') {
					header('location:'.base_url().'visi_misi');
				}elseif($qad->status == 'purchasing'){
					header('location:'.base_url().'visi_misi');
				}
			}
		}else{
			echo "<script>alert('username/password salah !');";
			echo "windows.location.href = '".base_url()."'; ";
			echo "</script>";
		}
	}
}
