<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPelanggan');
	}
	public function index()
	{
		$data = array(
			'pelanggan' => $this->mPelanggan->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/vPelanggan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function update($id)
	{
		$data = array(
			'nama_plggn' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'),
			'ttl' => $this->input->post('ttl'),
			'makanan' => $this->input->post('makanan')
		);
		$this->db->where('id_pelanggan', $id);
		$this->db->update('pelanggan', $data);


		$this->session->set_flashdata('success', 'Data Pelanggan Berhasil Diperbaharui!');
		redirect('Admin/cPelanggan');
	}
	public function create()
	{
		$data = array(
			'nama_plggn' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'),
			'ttl' => $this->input->post('ttl'),
			'makanan' => $this->input->post('makanan'),
			'username' => '0',
			'password' => '0',
			'makanan' => '0'
		);
		$this->db->insert('pelanggan', $data);
		$this->session->set_flashdata('success', 'Data Pelanggan Berhasil Ditambahkan!');
		redirect('Admin/cPelanggan');
	}
	public function delete($id)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->delete('pelanggan');
		$this->session->set_flashdata('success', 'Data Pelanggan Berhasil Dihapus!');
		redirect('Admin/cPelanggan');
	}
}

/* End of file cPelanggan.php */
