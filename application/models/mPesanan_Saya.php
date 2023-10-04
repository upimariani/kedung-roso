<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mPesanan_Saya extends CI_Model
{
	public function pesanan()
	{
		$this->db->select('pesanan.id_pesanan,metode_bayar, bukti_pembayaran, tgl_transaksi, total_bayar, alamat_detail, ongkir, status_order, status_bayar, nama_plggn, alamat, no_hp');
		$this->db->from('pesanan');
		$this->db->join('pelanggan', 'pesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->join('nota', 'nota.id_pesanan = pesanan.id_pesanan', 'left');
		$this->db->where('pesanan.id_pelanggan', $this->session->userdata('id'));
		return $this->db->get()->result();
	}

	public function detail_order($id)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('detail_pesanan', 'pesanan.id_pesanan = detail_pesanan.id_pesanan', 'left');
		$this->db->join('menu_makanan', 'menu_makanan.id_produk = detail_pesanan.id_produk', 'left');
		$this->db->join('diskon', 'menu_makanan.id_produk = diskon.id_produk', 'left');
		$this->db->where('pesanan.id_pesanan', $id);
		return $this->db->get()->result();
	}
	public function bayar($data)
	{
		$this->db->insert('nota', $data);
	}

	//penilaian produk
	public function produk_beli($id)
	{
		$this->db->select('detail_pesanan.id_detail, nama_produk, qty, foto, komentar, id_ulasan, rating');
		$this->db->from('pesanan');
		$this->db->join('detail_pesanan', 'pesanan.id_pesanan = detail_pesanan.id_pesanan', 'left');
		$this->db->join('menu_makanan', 'detail_pesanan.id_produk = menu_makanan.id_produk', 'left');
		$this->db->join('ulasan', 'ulasan.id_detail = detail_pesanan.id_detail', 'left');

		$this->db->where('pesanan.id_pesanan', $id);
		return $this->db->get()->result();
	}
}

/* End of file mPesananSaya.php */
