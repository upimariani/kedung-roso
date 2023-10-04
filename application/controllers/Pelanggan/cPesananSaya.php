<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPesananSaya extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPesanan_Saya');
	}

	public function index()
	{
		$this->protect->protect();
		$data = array(
			'pesanan' => $this->mPesanan_Saya->pesanan()
		);
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/pesanan_saya', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}

	public function detail_order($id)
	{
		$data['produk'] = $this->mPesanan_Saya->detail_order($id);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function bayar($id, $total)
	{
		$config['upload_path']          = './asset/bukti-bayar';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bayar')) {
			$data = array(
				'pesanan' => $this->mPesanan_Saya->pesanan(),
				'error' => $this->upload->display_errors()
			);
			$this->load->view('Pelanggan/layouts/header');
			$this->load->view('Pelanggan/layouts/aside');
			$this->load->view('Pelanggan/pesanan_saya', $data);
			$this->load->view('Pelanggan/Layouts/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'id_pesanan' => $id,
				'total_transaksi' => $total,
				'tgl' => date('Y-m-d'),
				'cash' => 'transfer',
				'kartu_kredit' => $this->input->post('bank'),
				'no_kartu_kredit' => $this->input->post('norek'),
				'bukti_pembayaran' => $upload_data['file_name']
			);
			$this->mPesanan_Saya->bayar($data);

			//update status order
			$status = array(
				'status_order' => '1',
				'status_bayar' => '1'
			);
			$this->db->where('id_pesanan', $id);
			$this->db->update('pesanan', $status);


			$this->session->set_flashdata('success', 'Bukti Pembayaran Berhasil Dikirim!');
			redirect('pelanggan/cpesanansaya');
		}
	}
	public function diterima($id)
	{
		$data = array(
			'status_order' => '4'
		);
		$this->db->where('id_pesanan', $id);
		$this->db->update('pesanan', $data);
		redirect('pelanggan/cpesanansaya');
	}
	public function penilaian_produk($id)
	{
		$data = array(
			'produk' => $this->mPesanan_Saya->produk_beli($id)
		);
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/penilaian_produk', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function komentar($id)
	{
		$data = array(
			'id_detail' => $id,
			'rating' => $this->input->post('rating'),
			'komentar' => $this->input->post('ulasan')
		);
		$this->db->insert('ulasan', $data);
		redirect('Pelanggan/cPesananSaya');
	}
	public function perbaharui_ulasan($id)
	{
		$data = array(
			'rating' => $this->input->post('rating'),
			'komentar' => $this->input->post('ulasan')
		);
		$this->db->where('id_ulasan', $id);
		$this->db->update('ulasan', $data);
		redirect('Pelanggan/cPesananSaya');
	}
}

/* End of file cPesananSaya.php */
