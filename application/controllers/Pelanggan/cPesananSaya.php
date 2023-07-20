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
	public function bayar($id)
	{
		$config['upload_path']          = './asset/bukti-bayar';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5000;

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
				'status_order' => '1',
				'bukti_pembayaran' => $upload_data['file_name']
			);
			$this->mPesanan_Saya->bayar($id, $data);
			$this->session->set_flashdata('success', 'Bukti Pembayaran Berhasil Dikirim!');
			redirect('pelanggan/cpesanansaya');
		}
	}
	public function pesanan_selesai($id)
	{
		$data = array(
			'status_order' => '4'
		);
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
		redirect('pelanggan/cpesanansaya');
	}
}

/* End of file cPesananSaya.php */
