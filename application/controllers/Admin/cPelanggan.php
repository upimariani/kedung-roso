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
	public function cetak()
	{
		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/logo.jpg', 3, 3, 40);
		$pdf->Cell(200, 40, 'LAPORAN PELANGGAN REGISTRASI', 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(60, 7, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Tempat, Tanggal Lahir', 1, 0, 'C');
		$pdf->Cell(50, 7, '	No Telepon', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;


		$data = $this->mPelanggan->select();
		foreach ($data as $key => $value) {

			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(60, 6, $value->nama_plggn, 1, 0);
			$pdf->Cell(50, 6, $value->ttl, 1, 0);
			$pdf->Cell(50, 6, $value->no_hp, 1, 1);
		}
		$pdf->Output();
	}
}

/* End of file cPelanggan.php */
