<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mPesanan_Saya extends CI_Model
{
	public function pesanan()
	{
		$this->db->select('pesanan.id_pesanan, tgl_transaksi, total_bayar, alamat_detail, ongkir, status_order, status_bayar, nama_plggn, alamat, no_hp, komentar');
		$this->db->from('pesanan');
		$this->db->join('pelanggan', 'pesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->join('ulasan', 'ulasan.id_pesanan = pesanan.id_pesanan', 'left');
		$this->db->where('pesanan.id_pelanggan', $this->session->userdata('id'));
		return $this->db->get()->result();
	}

	public function detail_order($id)
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('detail_pesanan', 'pesanan.id_pesanan = detail_pesanan.id_pesanan', 'left');
		$this->db->join('menu_makanan', 'menu_makanan.id_produk = detail_pesanan.id_produk', 'left');
		$this->db->where('pesanan.id_pesanan', $id);
		return $this->db->get()->result();
	}
	public function bayar($data)
	{
		$this->db->insert('nota', $data);
	}
}

/* End of file mPesananSaya.php */
