<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
	public function menu()
	{
		$this->db->select('nama_produk, menu_makanan.id_produk, harga, foto, deskripsi, nama_promo, diskon, tgl_diskon');
		$this->db->from('menu_makanan');
		$this->db->join('diskon', 'menu_makanan.id_produk = diskon.id_produk', 'left');
		return $this->db->get()->result();
	}
	public function checkout($data)
	{
		$this->db->insert('pesanan', $data);
	}
	public function detail_transaksi($data)
	{
		$this->db->insert('detail_pesanan', $data);
	}


	public function data_pelanggan()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $this->session->userdata('id'));
		return $this->db->get()->row();
	}

	public function ulasan()
	{
		$this->db->select('*');
		$this->db->from('ulasan');
		$this->db->join('pesanan', 'ulasan.id_pesanan = pesanan.id_pesanan', 'left');
		$this->db->join('pelanggan', 'pesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		return $this->db->get()->result();
	}

	public function detail_produk($id)
	{
		$data['produk'] = $this->db->query("SELECT * FROM `menu_makanan` WHERE id_produk='" . $id . "'")->row();
		$data['ulasan'] = $this->db->query("SELECT * FROM ulasan JOIN detail_pesanan ON ulasan.id_detail=detail_pesanan.id_detail JOIN menu_makanan ON menu_makanan.id_produk=detail_pesanan.id_produk JOIN pesanan ON pesanan.id_pesanan=detail_pesanan.id_pesanan JOIN pelanggan ON pelanggan.id_pelanggan=pesanan.id_pelanggan LEFT JOIN balasan_ulasan ON balasan_ulasan.id_ulasan=ulasan.id_ulasan WHERE menu_makanan.id_produk='" . $id . "'")->result();
		return $data;
	}
}

/* End of file mKatalog.php */
