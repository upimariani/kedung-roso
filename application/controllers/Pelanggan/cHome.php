<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKatalog');
	}
	public function index()
	{
		$data = array(
			'menu' => $this->mKatalog->menu(),
			'kritik' => $this->mKatalog->ulasan()
		);
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/home', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function detail_produk()
	{
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/detail_produk');
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function cart()
	{
		$this->protect->protect();
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty'),
			'picture' => $this->input->post('picture')
		);
		$this->cart->insert($data);
		redirect('pelanggan/chome');
	}
	public function update_cart()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid'  => $items['rowid'],
				'qty'    => $this->input->post($i . '[qty]')
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('pelanggan/chome/view_cart');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('pelanggan/chome/view_cart');
	}
	public function view_cart()
	{
		$this->protect->protect();
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/cart');
		$this->load->view('Pelanggan/Layouts/footer');
	}


	public function pengiriman()
	{
		$data = array(
			'pelanggan' => $this->mKatalog->data_pelanggan()
		);
		$this->load->view('Pelanggan/layouts/header');
		$this->load->view('Pelanggan/layouts/aside');
		$this->load->view('Pelanggan/pengiriman', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}

	public function checkout()
	{
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->protect->protect();
			$data = array(
				'pelanggan' => $this->mKatalog->data_pelanggan()
			);
			$this->load->view('Pelanggan/layouts/header');
			$this->load->view('Pelanggan/layouts/aside');
			$this->load->view('Pelanggan/pengiriman', $data);
			$this->load->view('Pelanggan/Layouts/footer');
		} else {
			$data = array(
				'id_pelanggan' => $this->session->userdata('id'),
				'tgl_transaksi' => date('Y-m-d'),
				'total_bayar' => $this->input->post('total'),
				'status_order' => '0',
				'ongkir' => $this->input->post('ongkir'),
				'status_bayar' => '0',
				'alamat_detail' => $this->input->post('alamat_detail')
			);
			$this->mKatalog->checkout($data);



			$cek_id_transaksi = $this->db->query("SELECT MAX(id_pesanan) as id FROM `pesanan`")->row();
			//menyimpan pesanan ke detail transaksi
			foreach ($this->cart->contents() as $item) {
				$data_rinci = array(
					'id_pesanan' => $cek_id_transaksi->id,
					'id_produk' => $item['id'],
					'qty' => $item['qty']
				);
				$this->mKatalog->detail_transaksi($data_rinci);
			}
			$this->cart->destroy();
			$this->session->set_flashdata('success', 'Pesanan Anda Berhasil Dikirim!');
			redirect('Pelanggan/cHome');
		}
	}
}

/* End of file cHome.php */
