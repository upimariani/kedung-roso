<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
	public function menu()
	{
		$this->db->select('*');
		$this->db->from('menu_makanan');
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
}

/* End of file mKatalog.php */
