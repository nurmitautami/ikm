<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index() {
		$data = array (
			'title'			=>	'Login',
		);
		$this->form_validation->set_rules('email', 'email', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login', $data);
		}else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$cek = $this->db->get_where('tb_admin',['admin_email' => $email])->row_array();
			if($cek) {
				if(password_verify($password,$cek['admin_password'])) {
					$sesia = array (
						'id'			=>	$cek['admin_id'],
						'status'		=>	'logged_in',
					);
					$this->session->set_userdata($sesia);
					redirect('admin/dashboard');
				}else {
					$this->session->set_flashdata('error', 'Password yang anda masukkan salah.');
					redirect('login');
				}
			}else {
				$this->session->set_flashdata('error', 'Email tidak terdaftar di sistem.');
				redirect('login');
			}
		}
	}

	public function sep() {
		$data = array (
			'admin_id'			=>   md5(rand()),
			'admin_nama'		=>   'Admin',
			'admin_email'		=>   'admin@gmail.com',
			'admin_password'	=>   password_hash('12345', PASSWORD_DEFAULT),
			'admin_foto'		=>   '1.png',
		);
	
		$this->db->insert('tb_admin', $data);
		redirect('login');
	}

	public function forg() {
		$data = array (
			'admin_password'	=>   password_hash('12345', PASSWORD_DEFAULT),
		);
	
		$this->db->where('admin_email', 'admin@gmail.com');
		$this->db->update('tb_admin', $data);
		redirect('login');
	}

	public function keluar() {
		$this->session->sess_destroy();
		redirect('login');
	}
}