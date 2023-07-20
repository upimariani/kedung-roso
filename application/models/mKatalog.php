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
}

/* End of file mKatalog.php */
