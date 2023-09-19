<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('status') != 'logged_in') {
			redirect('login');
		}
		$this->load->model('Admin_model');
	}

	public function index() {
		$data3 = $this->Admin_model->top_responden_bypdk();
		if($data3) {
		foreach($data3 as $row)
			$arr_result3[] = array(
				'label'		=>	$row->peker,
				'value'		=>	$row->job,
			);
		}else {
			$arr_result3[] = array();
		}
		$data4 = $this->Admin_model->top_responden_byjob();
		if($data4) {
		foreach($data4 as $row)
			$arr_result[] = array(
				'label'		=>	$row->peker,
				'value'		=>	$row->job,
			);
		}else {
			$arr_result[] = array();
		}
		$data5 = $this->Admin_model->log_bybrowser();
		if($data5) {
		foreach($data5 as $row)
			$arr_result5[] = array(
				'label'		=>	$row->peker,
				'value'		=>	$row->job,
			);
		}else {
			$arr_result5[] = array();
		}
		$data6 = $this->Admin_model->log_byos();
		if($data6) {
		foreach($data6 as $row)
			$arr_result6[] = array(
				'label'		=>	$row->peker,
				'value'		=>	$row->job,
			);
		}else {
			$arr_result6[] = array();
		}
		$data = array (
			'title'				=>	'Dashboard',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
			'cindeks'			=>	$this->db->get('tb_indeks')->num_rows(),
			'ckuesio'			=>	$this->db->get('tb_kuesioner')->num_rows(),
			'chasil'			=>	$this->db->get('tb_hasil')->num_rows(),
			'crespon'			=>	$this->db->get('tb_responden')->num_rows(),
			'grafik_data'		=>	$this->Admin_model->getGrafikData(),
			'data_jawaban'		=>	$this->Admin_model->getJawabanData(),
			'chart_data'		=>	$this->Admin_model->getChartData(),
			'topbyjob'			=>	json_encode($arr_result),
			'topbypdk'			=>	json_encode($arr_result3),
			'logbybrowser'		=>	json_encode($arr_result5),
			'logbyos'			=>	json_encode($arr_result6),
			'darespon'			=>	$this->Admin_model->data_responden_home(),
			'hasilres'			=>	$this->Admin_model->data_hasil_home(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer');
	}

	public function indeks() {
		$data = array (
			'title'				=>	'Indeks',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'indeks'			=>	$this->db->get('tb_indeks')->result_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/indeks', $data);
		$this->load->view('admin/footer');
	}

	public function indeks_add() {
		$data = array (
			'title'				=>	'Tambah Indeks',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/indeks_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_indeks();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/indeks');
		}
	}

	public function indeks_edit($id) {
		$data = array (
			'title'				=>	'Edit Indeks',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'idxid'				=>	$this->db->get_where('tb_indeks',['indeks_id' => $id])->row_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/indeks_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_indeks($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/indeks');
		}
	}

	public function indeks_del($id) {
		$this->db->where('indeks_id', $id);
		$this->db->delete('tb_indeks');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/indeks');
	}

	public function indeks_kosongkan() {
		$this->db->truncate('tb_indeks');
		$this->db->truncate('tb_kuesioner');
		$this->db->truncate('tb_hasil');
		$this->db->truncate('tb_log_akses');
		$this->db->truncate('tb_notifikasi');
		$this->db->truncate('tb_responden');
		$this->session->set_flashdata('flash', 'Tabel berhasil dikosongkan');
		redirect('admin/indeks');
	}

	public function kuesioner() {
		$data = array (
			'title'				=>	'Kuesioner',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kuesioner'			=>	$this->db->get('tb_kuesioner')->result_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/kuesioner', $data);
		$this->load->view('admin/footer');
	}

	public function kuesioner_add() {
		$data = array (
			'title'				=>	'Tambah Kuesioner',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'indeks'			=>	$this->db->get('tb_indeks')->result_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('indeks', 'indeks', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/kuesioner_add', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_kuesioner();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/kuesioner');
		}
	}

	public function kuesioner_edit($id) {
		$data = array (
			'title'				=>	'Edit Kuesioner',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'indeks'			=>	$this->db->get('tb_indeks')->result_array(),
			'kueid'				=>	$this->db->get_where('tb_kuesioner',['kuesioner_id' => $id])->row_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('indeks', 'indeks', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/kuesioner_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_kuesioner($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/kuesioner');
		}
	}

	public function kuesioner_del($id) {
		$this->db->where('kuesioner_id', $id);
		$this->db->delete('tb_kuesioner');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/kuesioner');
	}

	public function kuesioner_kosongkan() {
		$this->db->truncate('tb_kuesioner');
		$this->session->set_flashdata('flash', 'Tabel berhasil dikosongkan');
		redirect('admin/kuesioner');
	}

	public function jawaban() {
		$data = array (
			'title'				=>	'Jawaban',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'jawab'				=>	$this->db->get('tb_jawaban')->result_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/jawaban', $data);
		$this->load->view('admin/footer');
	}

	public function jawaban_add() {
		$data = array (
			'title'				=>	'Tambah Jawaban',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('emoji', 'emoji', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('type', 'type', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/jawaban_add', $data);
			$this->load->view('admin/footer');
		}else {
			$cekjw = $this->db->get('tb_jawaban')->num_rows();
			if($cekjw == 4) {
				$this->session->set_flashdata('error', 'Jawaban hanya boleh 4 jenis.');
				redirect('admin/jawaban');
			}
			$this->Admin_model->simpan_jawaban();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/jawaban');
		}
	}

	public function jawaban_edit($id) {
		$data = array (
			'title'				=>	'Edit Jawaban',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'jwbid'				=>	$this->db->get_where('tb_jawaban',['jawab_id' => $id])->row_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('emoji', 'emoji', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('type', 'type', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/jawaban_edit', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_jawaban($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/jawaban');
		}
	}

	public function responden() {
		$data = array (
			'title'				=>	'Responden',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'responden'			=>	$this->Admin_model->data_responden(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/responden', $data);
		$this->load->view('admin/footer');
	}
	public function lap_hasil_survei() {
        // Load your model (replace 'Admin_model' with the actual model name)
        $this->load->model('Admin_model');
		if($this->input->get('filter')=='filter'){
			$start_date = $this->input->get('start_date');
			$end_date = $this->input->get('end_date');
			$data = array (
				'title'				=>	'Responden',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'responden'			=>	$this->Admin_model->getDataByDateRange($start_date, $end_date),
				'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
				'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
			);
			$data['grafik_data'] = $this->Admin_model->getGrafikDataByDate($start_date, $end_date); // Get the data from your model method
			$data['title'] = 'Laporan Hasil Survei dari ' . $start_date . ' hingga ' . $end_date; // Set your desired title
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_hasil_survei', $data);
			$this->load->view('admin/footer');
		}
		else{
			$data = array (
				'title'				=>	'Responden',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'responden'			=>	$this->Admin_model->data_responden(),
				'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
				'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
				
			);
			$data['grafik_data'] = $this->Admin_model->getGrafikData(); // Get the data from your model method
			$data['title'] = 'Laporan Hasil Survei'; // Set your desired title
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_hasil_survei', $data);
			$this->load->view('admin/footer');
		}

    }
	public function lap_hasil_survei_date($start_date,$end_date,$filter) {
		$url = '/admin/lap_hasil_survei?start_date=' . urlencode($start_date) . '&end_date=' . urlencode($end_date) . '&filter=' . urlencode($filter);
		redirect($url);
	}

	// public function lap_hasil_survei() {
	// 	$data = array (
	// 		'title'				=>	'Responden',
	// 		'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
	// 		'responden'			=>	$this->Admin_model->data_responden(),
	// 		'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
	// 		'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
			
	// 	);
	// 	// $this->load->helper('admin/form');
    //     // $this->load->library('admin/form_validation');
	// 	$this->load->view('admin/header', $data);
	// 	$this->load->view('admin/lap_hasil_survei', $data);
	// 	$this->load->view('admin/footer');
	// }

	public function cetak_laporan() {
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		if( $this->input->post('action')=='filter'){
			// lap_hasil_survei_date();
			$filter = $this->input->post('action');
			$this->lap_hasil_survei_date($start_date,$end_date,$filter);
		}
		else{
			$data = array (
				'title'				=>	'Responden',
				'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
				'responden'			=>	$this->Admin_model->getDataByDateRange($start_date, $end_date),
				'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
				'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
			);
			$data['title'] = 'Laporan Hasil Survei dari ' . $start_date . ' hingga ' . $end_date;
			$data['grafik_data'] = $this->Admin_model->getGrafikDataByDate($start_date, $end_date);
	
			// Load view untuk mencetak data
			$this->load->view('admin/cetak_laporan_view', $data);
		}
    }



	public function respo_show($id) {
		$data = array (
			'title'				=>	'Detail Responden',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'respoid'			=>	$this->db->get_where('tb_responden',['respo_id' => $id])->row_array(),
			'respokue'			=>	$this->Admin_model->detail_responden($id),
			'respokuerata'		=>	$this->Admin_model->detail_responden_rata($id),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/responden_show', $data);
		$this->load->view('admin/footer');
	}

	public function respo_print($id) {
		$data = array(
			'title' => 'Detail Responden',
			'me' => $this->db->get_where('tb_admin', ['admin_id' => $this->session->userdata('id')])->row_array(),
			'respoid' => $this->db->get_where('tb_responden', ['respo_id' => $id])->row_array(),
			'respokue' => $this->Admin_model->detail_responden($id),
			'respokuerata' => $this->Admin_model->detail_responden_rata($id),
		);
	
		// Calculate total responses and satisfaction level
		$totalResponses = 0;
		$satisfactionLevel = array('Sangat  Puas' => 0, 'Puas' => 0, 'Cukup Puas' => 0, 'Tidak Puas' => 0);
	
		foreach ($data['respokuerata'] as $item) {
			if (is_array($item)) {
				$totalResponses += $item['jumlah'];
				$satisfactionLevel[$item['jawab_jenis']] = $item['jumlah'];
			}
		}
		
	
		$maxSatisfactionLevel = max($satisfactionLevel);
	
		// Pass the calculated values to the view
		$data['totalResponses'] = $totalResponses;
		$data['satisfactionLevel'] = $satisfactionLevel;
		$data['maxSatisfactionLevel'] = $maxSatisfactionLevel;
	
		$this->load->view('admin/responden_print', $data);
	}
	

	public function responden_del($id) {
		$this->db->where('respo_id', $id);
		$this->db->delete('tb_responden');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/responden');
	}

	public function notifikasi() {
		$data = array (
			'title'				=>	'Notifikasi',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'notifikasi'		=>	$this->Admin_model->data_notifikasi(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/notip', $data);
		$this->load->view('admin/footer');
	}

	public function notip_read($id) {
		$this->db->set('noti_status', 1);
		$this->db->where('noti_id', $id);
		$this->db->update('tb_notifikasi');
		redirect('admin/notifikasi');
	}

	public function notip_kosongkan() {
		$this->db->truncate('tb_notifikasi');
		$this->session->set_flashdata('flash', 'Tabel berhasil dikosongkan');
		redirect('admin/notifikasi');
	}

	public function kritik() {
		$data = array (
			'title'				=>	'Kritik & Saran',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'kritik'			=>	$this->Admin_model->pesan_notifikasi(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/kritik', $data);
		$this->load->view('admin/footer');
	}

	public function kritik_read($id) {
		$this->db->set('krisar_status', 1);
		$this->db->where('krisar_id', $id);
		$this->db->update('tb_krisar');
		redirect('admin/kritik-saran');
	}

	public function kritik_kosongkan() {
		$this->db->truncate('tb_krisar');
		$this->session->set_flashdata('flash', 'Tabel berhasil dikosongkan');
		redirect('admin/kritik-saran');
	}

	public function lap_responden() {
		$data = array (
			'title'				=>	'Laporan Responden',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'responden'			=>	$this->Admin_model->data_responden(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/lap_responden', $data);
		$this->load->view('admin/footer');
	}

	public function lap_responden_print() {
		$data = array (
			'title'				=>	'Laporan Responden',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'responden'			=>	$this->Admin_model->data_responden(),
		);
		$this->load->view('admin/lap_responden_print', $data);
	}

	public function profil() {
		$data = array (
			'title'				=>	'Atur Profil',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'valid_email'=>	'Email harus valid']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/set_profil', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->update_profil();
		}
	}

	public function password() {
		$data = array (
			'title'				=>	'Atur Password',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('id')])->row_array(),
			'notifbelum'		=>	$this->Admin_model->data_notifikasi_utama(),
			'pesanbelum'		=>	$this->Admin_model->pesan_notifikasi_utama(),
		);
		$this->form_validation->set_rules('password1', 'password1', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'matches'	=>	'Konfirmasi password baru salah']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/set_password', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->update_password();
		}
	}
}