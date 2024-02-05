<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLaporan');
		$this->load->model('mDashboard');
	}

	public function index()
	{

		$this->protect->protect_admin();
		$data = array(
			'ulasan' => $this->mDashboard->ulasan_pelanggan()
		);
		$this->load->view('AdminCS/Layouts/head');
		$this->load->view('AdminCS/dashboard/dashboard', $data);
		$this->load->view('AdminCS/Layouts/footer');
	}

	public function balas_ulasan($id)
	{
		$data = array(
			'id_ulasan' => $id,
			'isi_balasan' => $this->input->post('balasan')
		);
		$this->db->insert('balasan_ulasan', $data);
		$this->session->set_flashdata('success', 'Balasan Ulasan Berhasil Dikirim!');
		redirect('AdminCS/cDashboard');
	}
	public function hapus_ulasan($id)
	{
		$this->db->where('id_ulasan', $id);
		$this->db->delete('ulasan');

		$this->db->where('id_ulasan', $id);
		$this->db->delete('balasan_ulasan');

		$this->session->set_flashdata('success', 'Balasan Ulasan Berhasil Dihapus!');
		redirect('AdminCS/cDashboard');
	}
}

/* End of file cDashboard.php */