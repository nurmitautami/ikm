<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function data_emoji() {
		$this->db->order_by('jawab_id', 'ASC');
		return $this->db->get('tb_jawaban')->result_array();
	}

	public function simpan_responden() {
		$data = array (
			'respo_id'				=>   md5(rand()),
			'respo_nama'			=>   ucwords($this->input->post('nama')),
			'respo_lembaga'			=>   strtoupper($this->input->post('lembaga')),
			'respo_jk'				=>   $this->input->post('jk'),
			'respo_usia'			=>   $this->input->post('umur'),
			'respo_pendidikan'		=>   $this->input->post('pendidikan'),
			'respo_pekerjaan'		=>   $this->input->post('pekerjaan'),
		);
	
		if($this->db->insert('tb_responden', $data)) {
			$notif = array (
				'noti_id'			=>	md5(rand()),
				'noti_nama'			=>	ucwords($this->input->post('nama')),
				'noti_ket'			=>	'Responden baru',
				'noti_status'		=>	0,
			);
			$this->db->insert('tb_notifikasi', $notif);
		}
	}
}