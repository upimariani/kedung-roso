<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProduk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProduk');
	}

	public function index()
	{
		$this->protect->protect_admin();
		$data = array(
			'produk' => $this->mProduk->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/produk/produk', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$this->protect->protect_admin();
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/produk/create');
			$this->load->view('Admin/Layouts/footer');
		} else {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'error' => $this->upload->display_errors()
				);

				$this->load->view('Admin/Layouts/head');
				$this->load->view('Admin/produk/create', $data);
				$this->load->view('Admin/Layouts/footer');
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'nama_produk' => $this->input->post('nama'),
					'harga' => $this->input->post('harga'),
					'deskripsi' => $this->input->post('deskripsi'),
					'foto' => $upload_data['file_name']
				);
				$this->mProduk->insert($data);

				$this->session->set_flashdata('success', 'Data Produk Berhasil Ditambahkan!');
				redirect('Admin/cProduk');
			}
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required');
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './asset/foto-produk';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(

					'error' => $this->upload->display_errors()
				);

				$this->load->view('Admin/Layouts/head');
				$this->load->view('Admin/produk/update', $data);
				$this->load->view('Admin/Layouts/footer');
			} else {
				$produk = $this->mProduk->select();
				if ($produk->foto !== "") {
					unlink('./asset/foto-produk/' . $produk->foto);
				}
				$upload_data =  $this->upload->data();
				$data = array(
					'nama_produk' => $this->input->post('nama'),
					'harga' => $this->input->post('harga'),
					'deskripsi' => $this->input->post('deskripsi'),
					'foto' => $upload_data['file_name']
				);
				$this->mProduk->update($id, $data);
				$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
				redirect('Admin/cproduk');
			} //tanpa ganti gambar
			$data = array(
				'nama_produk' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'deskripsi' => $this->input->post('deskripsi')
			);
			$this->mProduk->update($id, $data);
			$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
			redirect('Admin/cproduk');
		}
		$data = array(
			'produk' => $this->mProduk->edit($id)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/produk/update', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function delete($id)
	{
		$this->mProduk->delete($id);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus !!!');
		redirect('Admin/cproduk');
	}
}

/* End of file cProduk.php */
