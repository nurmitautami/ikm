<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function getGrafikData() {
        $this->db->select('i.indeks_judul, j.jawab_jenis, COUNT(h.hasil_id) AS total');
        $this->db->from('tb_indeks i');
        $this->db->join('tb_hasil h', 'h.hasil_indeks = i.indeks_id', 'left');
        $this->db->join('tb_jawaban j', 'j.jawab_id = h.hasil_jawaban', 'left');
        $this->db->group_by(array('i.indeks_id', 'j.jawab_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function getJawabanData() {
	    $this->db->select('j.jawab_jenis, COUNT(h.hasil_id) AS total');
	    $this->db->from('tb_jawaban j');
	    $this->db->join('tb_hasil h', 'h.hasil_jawaban = j.jawab_id', 'left');
	    $this->db->group_by('j.jawab_id');
	    $query = $this->db->get();
	    return $query->result();
	}

	public function getChartData() {
    $this->db->select('DATE_FORMAT(hasil_tgl, "%Y/%m/%d") AS tanggal, jawab_jenis, COUNT(*) AS total');
    $this->db->from('tb_hasil');
    $this->db->join('tb_jawaban', 'tb_hasil.hasil_jawaban = tb_jawaban.jawab_id');
    $this->db->group_by('tanggal, jawab_jenis');
    $query = $this->db->get();
    return $query->result();
}
    
	public function simpan_indeks() {
		$data = array (
			'indeks_id'			=>   rand(),
			'indeks_judul'		=>   ucwords($this->input->post('judul')),
		);
	
		$this->db->insert('tb_indeks', $data);
	}

	public function edit_indeks($id) {
		$data = array (
			'indeks_judul'		=>   ucwords($this->input->post('judul')),
		);
	
		$this->db->where('indeks_id', $id);
		$this->db->update('tb_indeks', $data);
	}

	public function simpan_kuesioner() {
		$this->db->order_by('kuesioner_next', 'DESC');
		$sqlinc = $this->db->get('tb_kuesioner');
		if ($sqlinc->num_rows() == 0) {
			$autoinc = 1;
		}else {
			$urutinc = $sqlinc->row()->kuesioner_next;
			$urutinc++;
			$autoinc = $urutinc;
		}
		$data = array (
			'kuesioner_id'			=>   md5(rand()),
			'kuesioner_judul'		=>   $this->input->post('judul'),
			'kuesioner_indeksid'	=>   $this->input->post('indeks'),
			'kuesioner_next'		=>   $autoinc,
		);
	
		$this->db->insert('tb_kuesioner', $data);
	}

	public function edit_kuesioner($id) {
		$data = array (
			'kuesioner_judul'		=>   $this->input->post('judul'),
			'kuesioner_indeksid'	=>   $this->input->post('indeks'),
		);
	
		$this->db->where('kuesioner_id', $id);
		$this->db->update('tb_kuesioner', $data);
	}

	public function simpan_jawaban() {
		$data = array (
			'jawab_jenis'		=>   ucwords($this->input->post('judul')),
			'jawab_emoji'		=>   strtolower($this->input->post('emoji')),
			'jawab_type_text'	=>   strtolower($this->input->post('type')),
		);
	
		$this->db->insert('tb_jawaban', $data);
	}

	public function edit_jawaban($id) {
		$data = array (
			'jawab_jenis'		=>   ucwords($this->input->post('judul')),
			'jawab_emoji'		=>   strtolower($this->input->post('emoji')),
			'jawab_type_text'	=>   strtolower($this->input->post('type')),
		);
	
		$this->db->where('jawab_id', $id);
		$this->db->update('tb_jawaban', $data);
	}

	public function data_responden() {
		$this->db->order_by('respo_created', 'DESC');
		return $this->db->get('tb_responden')->result_array();
	}

	public function detail_responden($id) {
		$cek = $this->db->get_where('tb_responden',['respo_id' => $id])->row_array();
		$this->db->select('*');
		$this->db->from('tb_kuesioner');
		$this->db->join('tb_hasil', 'tb_hasil.hasil_kuesioner = tb_kuesioner.kuesioner_id');
		$this->db->join('tb_jawaban', 'tb_jawaban.jawab_id = tb_hasil.hasil_jawaban');
		$this->db->where('hasil_user', $cek['respo_nopol']);
		$this->db->order_by('kuesioner_next', 'ASC');
		return $this->db->get()->result_array();
	}

	public function detail_responden_rata($id) {
		$cek = $this->db->get_where('tb_responden',['respo_id' => $id])->row_array();
		$this->db->select('*');
		$this->db->from('tb_kuesioner');
		$this->db->join('tb_hasil', 'tb_hasil.hasil_kuesioner = tb_kuesioner.kuesioner_id');
		$this->db->join('tb_jawaban', 'tb_jawaban.jawab_id = tb_hasil.hasil_jawaban');
		$this->db->where('hasil_user', $cek['respo_nopol']);
		$this->db->order_by('hasil_jawaban', 'ASC');
		return $this->db->get()->row_array();
	}

	public function data_notifikasi_utama() {
		$this->db->order_by('noti_created', 'DESC');
		$this->db->where('noti_status', 0);
		$this->db->limit(5);
		return $this->db->get('tb_notifikasi')->result_array();
	}

	public function data_notifikasi() {
		$this->db->order_by('noti_created', 'DESC');
		return $this->db->get('tb_notifikasi')->result_array();
	}

	public function pesan_notifikasi_utama() {
		$this->db->order_by('krisar_created', 'DESC');
		$this->db->where('krisar_status', 0);
		$this->db->limit(5);
		return $this->db->get('tb_krisar')->result_array();
	}

	public function pesan_notifikasi() {
		$this->db->order_by('krisar_created', 'DESC');
		return $this->db->get('tb_krisar')->result_array();
	}

	public function top_responden_byjob() {
		$this->db->select('count(respo_pekerjaan) as job, respo_pekerjaan as peker');
		$this->db->group_by('respo_pekerjaan');
		return $this->db->get('tb_responden')->result();
	}

	public function top_responden_bypdk() {
		$this->db->select('count(respo_pendidikan) as job, respo_pendidikan as peker');
		$this->db->group_by('respo_pendidikan');
		return $this->db->get('tb_responden')->result();
	}

	public function data_responden_home() {
		$this->db->order_by('respo_created', 'DESC');
		$this->db->limit(6);
		return $this->db->get('tb_responden')->result_array();
	}

	public function data_hasil_home() {
		$this->db->order_by('hasil_created', 'DESC');
		$this->db->limit(6);
		return $this->db->get('tb_hasil')->result_array();
	}

	public function log_bybrowser() {
		$this->db->select('count(browser_log_info) as job, browser_log_info as peker');
		$this->db->group_by('browser_log_info');
		return $this->db->get('tb_log_akses')->result();
	}

	public function log_byos() {
		$this->db->select('count(os_log_info) as job, os_log_info as peker');
		$this->db->group_by('os_log_info');
		return $this->db->get('tb_log_akses')->result();
	}

	public function update_profil() {
		$sandi = $this->input->post('password');
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array();

		if(password_verify($sandi, $cek['admin_password'])) {

			// get foto
		    $config['upload_path'] = 'assets/images/user/';
		    $config['allowed_types'] = 'jpg|png|jpeg|gif';
		    $config['encrypt_name'] = TRUE;
		
		    $this->upload->initialize($config);
		    if (!empty($_FILES['gambar']['name'])) {
		        if ( $this->upload->do_upload('gambar') ) {
		            $gambar = $this->upload->data();
		                
		            $data = array(
	                    'admin_nama'			=>	ucwords($this->input->post('nama')),
	                    'admin_email'			=>	strtolower($this->input->post('email')),
						'admin_foto'			=>	$gambar['file_name'],
	                );
	                $this->db->where('admin_id', $this->session->userdata('id'));
					$this->db->update('tb_admin', $data);
					$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
					redirect('admin/profil');
	           }
		    }else {
		    	$data = array(
	                'admin_nama'			=>	ucwords($this->input->post('nama')),
                    'admin_email'			=>	strtolower($this->input->post('email')),
					'admin_foto'			=>	$this->input->post('gambar_old'),
		        );
		        $this->db->where('admin_id', $this->session->userdata('id'));
				$this->db->update('tb_admin', $data);
				$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
				redirect('admin/profil');
		    }
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password salah');
			redirect('admin/profil');
		}
	}

	public function update_password() {
		$sandi = $this->input->post('password');
		$sandi2 = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array();

		if(password_verify($sandi, $cek['admin_password'])) {
			$this->db->set('admin_password', $sandi2);
			$this->db->where('admin_id', $this->session->userdata('id'));
			$this->db->update('tb_admin');
			$this->session->set_flashdata('flash', 'Password anda berhasil diperbaharui');
			redirect('admin/password');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password lama salah');
			redirect('admin/password');
		}
	}
}