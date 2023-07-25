<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}


	public function index()
	{
		$data = array(
			'status' => $this->mTransaksi->status_order()
		);
		$this->protect->protect_admin();
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/transaksi/status_order', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail_pesanan($id)
	{
		$this->protect->protect_admin();
		$data = array(
			'detail' => $this->mTransaksi->detail_pesanan($id)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/transaksi/detail_pesanan', $data);
		$this->load->view('Admin/Layouts/footer');
	}


	//transaksi delivery
	public function konfirmasi($id)
	{
		$data = array(
			'status_order' => '2'
		);
		$this->mTransaksi->status_transaksi($id, $data);
		redirect('Admin/cTransaksi');
	}
	public function kirim($id)
	{
		$data = array(
			'status_order' => '3'
		);
		$this->mTransaksi->status_transaksi($id, $data);
		redirect('Admin/cTransaksi');
	}
}

/* End of file cTransaksi.php */
