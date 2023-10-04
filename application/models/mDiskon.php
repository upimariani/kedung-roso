<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mDiskon extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('diskon');
		$this->db->join('menu_makanan', 'diskon.id_produk = menu_makanan.id_produk', 'left');
		return $this->db->get()->result();
	}
	public function update($id, $data)
	{
		$this->db->where('kode_promo', $id);
		$this->db->update('diskon', $data);
	}
	public function insert($data)
	{
		$this->db->insert('diskon', $data);
	}
	public function delete($id)
	{
		$this->db->where('kode_promo', $id);
		$this->db->delete('diskon');
	}
}

/* End of file mDiskon.php */
