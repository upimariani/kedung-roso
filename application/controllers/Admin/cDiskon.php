<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDiskon extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDiskon');
		$this->load->model('mProduk');
	}

	public function index()
	{
		$this->form_validation->set_rules('menu', 'Alamat User', 'required');
		$this->form_validation->set_rules('nama', 'Level User', 'required');
		$this->form_validation->set_rules('diskon', 'Username', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->protect->protect_admin();
			$data = array(
				'diskon' => $this->mDiskon->select(),
				'produk' => $this->mProduk->select()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/diskon/diskon', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'id_produk' => $this->input->post('menu'),
				'nama_promo' => $this->input->post('nama'),
				'diskon' => $this->input->post('diskon'),
				'tgl_diskon' => date('Y-m-d')
			);
			$this->mDiskon->insert($data);
			$this->session->set_flashdata('success', 'Data Diskon Berhasil Ditambahkan!');
			redirect('Admin/cDiskon');
		}
	}
	public function update($id)
	{
		$data = array(
			'id_produk' => $this->input->post('menu'),
			'nama_promo' => $this->input->post('nama'),
			'diskon' => $this->input->post('diskon'),
		);
		$this->mDiskon->update($id, $data);
		$this->session->set_flashdata('success', 'Data Diskon Berhasil Diperbaharui!');
		redirect('Admin/cDiskon');
	}
	public function delete($id)
	{
		$this->mDiskon->delete($id);
		$this->session->set_flashdata('success', 'Data Diskon Berhasil Dihapus!');
		redirect('Admin/cDiskon');
	}
}

/* End of file cDiskon.php */
