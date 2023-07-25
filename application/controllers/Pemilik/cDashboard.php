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
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/dashboard');
		$this->load->view('Pemilik/Layouts/footer');
	}
	public function detail_transaksi_pelanggan($id)
	{
		$this->protect->protect_admin();
		$data = array(
			'detail' => $this->mDashboard->detail_transaksi($id)
		);
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/detail_transaksi_pelanggan', $data);
		$this->load->view('Pemilik/Layouts/footer');
	}
}

/* End of file cDashboard.php */
