<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCoba extends CI_Controller
{

	public function index()
	{
		$this->load->view('vCoba');
	}
	public function hitung()
	{
		$nama = $this->input->post('nama');
		$tenor = $this->input->post('tenor');
		$rate = $this->input->post('rate');
		$amount = $this->input->post('amount');

		// $int_amount = 0;
		$int_amount = str_replace(",", "", $amount);

		echo $int_amount;


		$ebr = ($int_amount * (($tenor + 1) / 2) * $rate) / 100;

		echo 'Hasil ' . $nama . ' : ' . number_format($ebr);
	}
}

/* End of file cCoba.php */
