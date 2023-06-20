<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index() {
		$data = array (
			'title'				=>	'Beranda',
			'cekcl1'			=>	$this->db->get_where('tb_hasil',['hasil_jawaban' => 1])->num_rows(),
			'cekcl2'			=>	$this->db->get_where('tb_hasil',['hasil_jawaban' => 2])->num_rows(),
			'cekcl3'			=>	$this->db->get_where('tb_hasil',['hasil_jawaban' => 3])->num_rows(),
			'cekcl4'			=>	$this->db->get_where('tb_hasil',['hasil_jawaban' => 4])->num_rows(),
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/slide', $data);
		$this->load->view('home/index', $data);
		$this->load->view('home/footer');
	}

	public function ques() {
		if($this->session->userdata('nopol')) {
			redirect('kuesioner/'.$this->session->userdata('nonex'));
		}
		$id = 1;
		$data = array (
			'title'				=>	'Kuesioner',
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('nopol', 'nopol', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('umur', 'umur', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('jk', 'jk', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('home/kuesioner', $data);
			$this->load->view('home/footer');
		}else {
			$this->Home_model->simpan_responden();
			$this->session->set_userdata('nopol', $this->input->post('nopol'));
			$this->session->set_userdata('nonex', $id);
			$browser 	=	$this->agent->browser();
			$b_version 	=	$this->agent->version();
			$os 		=	$this->agent->platform();
			$ip 		=	$this->input->ip_address();
			$time 		=	time();
			$datalog = array (
				'time_log_info'				=>   $time,
				'browser_log_info'			=>   $browser,
				'b_version_log_info'		=>   $b_version,
				'os_log_info'				=>   $os,
				'ip_log_info'				=>   $ip
			);

			$this->db->insert('tb_log_akses', $datalog);
			redirect('kuesioner/'.$id);
		}
	}

	public function question($id) {
		$cek1 = $this->db->get_where('tb_kuesioner',['kuesioner_next' => $id])->row_array();
		$cek2 = $this->db->get_where('tb_responden',['respo_nopol' => $this->session->userdata('nopol')])->row_array();
		if(!$cek1) {
			$notif = array (
				'noti_id'			=>	md5(rand()),
				'noti_nama'			=>	$cek2['respo_nama'],
				'noti_ket'			=>	'Telah mengisi kuesioner',
				'noti_status'		=>	0,
			);
			$this->db->insert('tb_notifikasi', $notif);
			redirect('selesai');
		}
		if($id != $this->session->userdata('nonex')) {
			if($this->session->userdata('nopol')) {
				redirect('kuesioner/'.$this->session->userdata('nonex'));
			}else {
				redirect('identitas');
			}
		}
		$data = array (
			'title'				=>	'Kuesioner',
			'soal'				=>	$this->db->get_where('tb_kuesioner',['kuesioner_next' => $id])->row_array(),
			'emoji'				=>	$this->Home_model->data_emoji(),
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/kuesioner', $data);
		$this->load->view('home/footer');
	}

	public function hapus_sesi() {
		$this->session->sess_destroy();
		redirect('');
	}

	public function simpan_question($kueid,$jwbid) {
		$cek1 = $this->db->get_where('tb_kuesioner',['kuesioner_id' => $kueid])->row_array();
		$cek2 = $this->db->get_where('tb_hasil',['hasil_kuesioner' => $kueid, 'hasil_user' => $this->session->userdata('nopol')])->row_array();
		$next = $cek1['kuesioner_next'] + 1;
		$this->session->set_userdata('nonex', $next);
		if($cek2) {
			$this->db->set('hasil_jawaban', $jwbid);
			$this->db->where('hasil_id', $cek2['hasil_id']);
			$this->db->update('tb_hasil', $data);
		}else {
			$data = array (
				'hasil_id'				=>	md5(rand()),
				'hasil_user'			=>	strtoupper($this->session->userdata('nopol')),
				'hasil_indeks'			=>	$cek1['kuesioner_indeksid'],
				'hasil_kuesioner'		=>	$kueid,
				'hasil_jawaban'			=>	$jwbid,
				'hasil_tgl'				=>	date('Y-m-d'),
			);
			$this->db->insert('tb_hasil', $data);
		}
		redirect('kuesioner/'.$next);
	}

	public function done() {
		if(!$this->session->userdata('nopol')) {
			redirect('identitas');
		}
		$this->session->sess_destroy();
		$data = array (
			'title'				=>	'Terima Kasih',
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/selesai', $data);
		$this->load->view('home/footer');
	}

	public function send_pesan() {
		$data = array (
			'krisar_id'			=>   md5(rand()),
			'krisar_nama'		=>   ucwords($this->input->post('nama')),
			'krisar_email'		=>   strtolower($this->input->post('email')),
			'krisar_hp'			=>   $this->input->post('telp'),
			'krisar_isi'		=>   $this->input->post('isi'),
			'krisar_status'		=>   0,
		);
	
		$this->db->insert('tb_krisar', $data);
		redirect('thky');
	}

	public function done_2() {
		$data = array (
			'title'				=>	'Terima Kasih',
		);
		$this->load->view('home/header', $data);
		$this->load->view('home/selesai', $data);
		$this->load->view('home/footer');
	}

	public function bersih() {
		$this->session->sess_destroy();
		redirect('');
	}
}
