<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mPesanan_Saya extends CI_Model
{
	public function pesanan()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pelanggan', 'pesanan.id_pelanggan = pelanggan.id_pelanggan', 'left');
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
	public function bayar($id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
	}
}

/* End of file mPesananSaya.php */
