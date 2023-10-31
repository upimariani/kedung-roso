<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiLangsung extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProduk');
		$this->load->model('mKatalog');
		$this->load->model('mTransaksi');
		$this->load->model('mPelanggan');
	}

	public function index()
	{
		$this->protect->protect_admin();
		$data = array(
			'produk' => $this->mProduk->select(),
			'transaksi' => $this->mTransaksi->transaksiLangsung(),
			'pelanggan' => $this->mPelanggan->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/TransaksiLangsung/vTransaksiLangsung', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail_tran_langsung($id)
	{
		$data = array(
			'detail' => $this->mTransaksi->detail_tran_langsung($id)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/TransaksiLangsung/detail_pesanan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function cart($id)
	{
		$this->protect->protect_admin();
		$produk = $this->db->query("SELECT * FROM `menu_makanan` WHERE id_produk='" . $id . "'")->row();
		$data = array(
			'id' => $produk->id_produk,
			'name' => $produk->nama_produk,
			'price' => $produk->harga,
			'qty' => '1',
			'picture' => $produk->foto,
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Produk Berhasil Masuk Keranjang!');
		redirect('Admin/cTransaksiLangsung');
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
		$this->session->set_flashdata('success', 'Quantity Produk Berhasil Diperbaharui!');
		redirect('Admin/cTransaksiLangsung');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		$this->session->set_flashdata('success', 'Produk Berhasil Dihapus!');
		redirect('Admin/cTransaksiLangsung');
	}
	public function selesai()
	{
		$data = array(
			'id_pelanggan' => $this->input->post('pelanggan'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_bayar' => $this->cart->total(),
			'status_order' => '4',
			'ongkir' => '0',
			'status_bayar' => '1',
			'alamat_detail' => '0',
			'metode_bayar' => '3'
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
		$this->session->set_flashdata('success', 'Pesanan Selesai!');
		redirect('Admin/cTransaksiLangsung');
	}
}
 
 /* End of file cTransaksiLangsung.php */
