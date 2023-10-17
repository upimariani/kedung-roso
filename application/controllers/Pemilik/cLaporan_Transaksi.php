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

		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/logo.jpg', 3, 3, 50);
		$pdf->Cell(200, 40, 'LAPORAN TRANSAKSI HARIAN', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(30, 7, 'Id Transaksi', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Tanggal Transaksi', 1, 0, 'C');
		$pdf->Cell(50, 7, '	Atas Nama', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Total Bayar', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;


		$data = $this->mLaporan->lap_harian_transaksi($tanggal, $bulan, $tahun);
		foreach ($data as $key => $value) {
			if ($value->alamat_detail == '0') {
				$nama = 'Pesanan Langsung';
			} else {
				$nama = $value->nama_plggn;
			}

			$pdf->Cell(30, 6, $value->id_pesanan, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->tgl_transaksi, 1, 0);
			$pdf->Cell(50, 6, $nama, 1, 0);
			$pdf->Cell(40, 6, 'Rp.' . number_format($value->total_bayar), 1, 1);
		}
		$pdf->Output();

		// $data = array(
		// 	'tanggal' => $tanggal,
		// 	'bulan' => $bulan,
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->lap_harian_transaksi($tanggal, $bulan, $tahun)
		// );
		// $this->load->view('Pemilik/Layouts/head');
		// $this->load->view('Pemilik/LaporanTransaksi/harian', $data);
		// $this->load->view('Pemilik/Layouts/footer');
	}
	public function lap_bulanan_transaksi()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/logo.jpg', 3, 3, 50);
		$pdf->Cell(200, 40, 'LAPORAN TRANSAKSI BULANAN', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(30, 7, 'Id Transaksi', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Tanggal Transaksi', 1, 0, 'C');
		$pdf->Cell(50, 7, '	Atas Nama', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Total Bayar', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;


		$data = $this->mLaporan->lap_bulanan_transaksi($bulan, $tahun);
		foreach ($data as $key => $value) {
			if ($value->alamat_detail == '0') {
				$nama = 'Pesanan Langsung';
			} else {
				$nama = $value->nama_plggn;
			}

			$pdf->Cell(30, 6, $value->id_pesanan, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->tgl_transaksi, 1, 0);
			$pdf->Cell(50, 6, $nama, 1, 0);
			$pdf->Cell(40, 6, 'Rp.' . number_format($value->total_bayar), 1, 1);
		}
		$pdf->Output();

		// $data = array(
		// 	'bulan' => $bulan,
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->lap_bulanan_transaksi($bulan, $tahun)
		// );
		// $this->load->view('Pemilik/Layouts/head');
		// $this->load->view('Pemilik/LaporanTransaksi/bulanan', $data);
		// $this->load->view('Pemilik/Layouts/footer');
	}
	public function lap_tahunan_transaksi()
	{
		$tahun = $this->input->post('tahun');

		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/logo.jpg', 3, 3, 50);
		$pdf->Cell(200, 40, 'LAPORAN TRANSAKSI TAHUNAN', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(30, 7, 'Id Transaksi', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Tanggal Transaksi', 1, 0, 'C');
		$pdf->Cell(50, 7, '	Atas Nama', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Total Bayar', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;


		$data = $this->mLaporan->lap_tahunan_transaksi($tahun);
		foreach ($data as $key => $value) {
			if ($value->alamat_detail == '0') {
				$nama = 'Pesanan Langsung';
			} else {
				$nama = $value->nama_plggn;
			}

			$pdf->Cell(30, 6, $value->id_pesanan, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->tgl_transaksi, 1, 0);
			$pdf->Cell(50, 6, $nama, 1, 0);
			$pdf->Cell(40, 6, 'Rp.' . number_format($value->total_bayar), 1, 1);
		}
		$pdf->Output();

		// $data = array(
		// 	'tahun' => $tahun,
		// 	'laporan' => $this->mLaporan->lap_tahunan_transaksi($tahun)
		// );
		// $this->load->view('Pemilik/Layouts/head');
		// $this->load->view('Pemilik/LaporanTransaksi/tahunan', $data);
		// $this->load->view('Pemilik/Layouts/footer');
	}
	public function cetak()
	{
		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/logo.jpg', 3, 3, 40);
		$pdf->Cell(200, 40, 'LAPORAN HASIL ANALISIS PELANGGAN', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(50, 7, '	No Telepon', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Level Member', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;


		$date = date('Y-m-d');
		$data = $this->mPelanggan->pelanggan($date);
		foreach ($data as $key => $value) {
			if ($value->member == '3') {
				$status = 'Gold';
			} else if ($value->member == '2') {
				$status = 'Silver';
			} else {
				$status = 'Clasic';
			}
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(50, 6, $value->nama_konsumen, 1, 0);
			$pdf->Cell(50, 6, $value->no_hp_konsumen, 1, 0);
			$pdf->Cell(40, 6, $status, 1, 1);
		}
		$pdf->Output();
	}
}

/* End of file cLaporan_Transaksi.php */
