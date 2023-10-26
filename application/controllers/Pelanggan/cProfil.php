<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProfil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProfil');
	}

	public function index()
	{
		$data = array(
			'pelanggan' => $this->mProfil->pelanggan()
		);
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/profil', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[11]|max_length[13]');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('ttl', 'Tempat, Tanggal Lahir', 'required');
		$this->form_validation->set_rules('makanan', 'Makanan Favorite', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'pelanggan' => $this->mProfil->pelanggan()
			);
			$this->load->view('Pelanggan/layouts/header');
			$this->load->view('Pelanggan/layouts/aside');
			$this->load->view('Pelanggan/profil', $data);
			$this->load->view('Pelanggan/Layouts/footer');
		} else {
			$data = array(
				'nama_plggn' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'ttl' => $this->input->post('ttl'),
				'makanan' => $this->input->post('makanan')
			);
			$this->db->where('id_pelanggan', $id);
			$this->db->update('pelanggan', $data);


			$this->session->set_flashdata('success', 'Data Pelanggan Berhasil Diperbaharui!');
			redirect('pelanggan/cProfil');
		}
	}
}

/* End of file cProfil.php */
