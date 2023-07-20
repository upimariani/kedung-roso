<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
	public function transaksi_pelanggan()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
		$this->db->group_by('transaksi.id_pelanggan');
		return $this->db->get()->result();
	}
	public function detail_transaksi($id)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('detail_transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi', 'left');
		$this->db->join('produk', 'detail_transaksi.id_produk = produk.id_produk', 'left');

		$this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('transaksi.id_pelanggan', $id);
		return $this->db->get()->result();
	}
}

/* End of file mDashboard.php */
