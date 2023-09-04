<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProfil extends CI_Model
{
	public function pelanggan()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $this->session->userdata('id'));
		return $this->db->get()->row();
	}
}

/* End of file mProfil.php */
