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
}

/* End of file cPelanggan.php */
