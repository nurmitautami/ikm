<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function data_emoji() {
		$this->db->order_by('jawab_id', 'ASC');
		return $this->db->get('tb_jawaban')->result_array();
	}
	

	public function getGrafikData($tahun) {
		$this->db->select('i.indeks_judul, j.jawab_jenis, COUNT(h.hasil_id) AS total');
		$this->db->from('tb_indeks i');
		$this->db->join('tb_hasil h', 'h.hasil_indeks = i.indeks_id', 'left');
		$this->db->join('tb_jawaban j', 'j.jawab_id = h.hasil_jawaban', 'left');
		
		if ($tahun !== NULL) {
			$this->db->where('YEAR(hasil_tgl)', $tahun); // Filter data berdasarkan tahun jika tahunnya tidak kosong
		}
		
		$this->db->group_by(array('i.indeks_id', 'j.jawab_id'));
		$query = $this->db->get();
		
		return $query->result();
	}

	public function getTahunList() {
		$this->db->select('YEAR(hasil_tgl) AS tahun', FALSE);
		$this->db->from('tb_hasil');
		$this->db->group_by('tahun');
		$query = $this->db->get();
		$result = $query->result_array();
		
		$tahun_list = array();
		foreach ($result as $row) {
			$tahun_list[] = $row['tahun'];
		}
		
		return $tahun_list;
	}


	public function getGrafikDataByDateRange($tanggal_mulai, $tanggal_selesai)
{
    $this->db->select('i.indeks_judul, j.jawab_jenis, COUNT(h.hasil_id) AS total');
    $this->db->from('tb_indeks i');
    $this->db->join('tb_hasil h', 'h.hasil_indeks = i.indeks_id', 'left');
    $this->db->join('tb_jawaban j', 'j.jawab_id = h.hasil_jawaban', 'left');
    
    // Filter data berdasarkan rentang tanggal
    $this->db->where('hasil_tgl >=', $tanggal_mulai);
    $this->db->where('hasil_tgl <=', $tanggal_selesai);
    
    $this->db->group_by(array('i.indeks_id', 'j.jawab_id'));
    $query = $this->db->get();
    
    return $query->result();
}

	
	

	public function simpan_responden() {
		$data = array (
			'respo_id'				=>   md5(rand()),
			'respo_nama'			=>   ucwords($this->input->post('nama')),
			'respo_notelp'			=>   strtoupper($this->input->post('notelp')),
			'respo_jk'				=>   $this->input->post('jk'),
			'respo_usia'			=>   $this->input->post('umur'),
			'respo_pendidikan'		=>   $this->input->post('pendidikan'),
			'respo_pekerjaan'		=>   $this->input->post('pekerjaan'),
			'respo_lembaga'			=>   $this->input->post('lembaga'),
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