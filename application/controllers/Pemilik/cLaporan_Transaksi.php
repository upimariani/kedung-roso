<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan_Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLaporan');
	}

	public function index()
	{
		$this->protect->protect_admin();

		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/LaporanTransaksi/lapTransaksi');
		$this->load->view('Pemilik/Layouts/footer');
	}
	public function lap_harian_transaksi()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_harian_transaksi($tanggal, $bulan, $tahun)
		);
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/LaporanTransaksi/harian', $data);
		$this->load->view('Pemilik/Layouts/footer');
	}
	public function lap_bulanan_transaksi()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_bulanan_transaksi($bulan, $tahun)
		);
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/LaporanTransaksi/bulanan', $data);
		$this->load->view('Pemilik/Layouts/footer');
	}
	public function lap_tahunan_transaksi()
	{
		$tahun = $this->input->post('tahun');
		$data = array(
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_tahunan_transaksi($tahun)
		);
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/LaporanTransaksi/tahunan', $data);
		$this->load->view('Pemilik/Layouts/footer');
	}
}

/* End of file cLaporan_Transaksi.php */
