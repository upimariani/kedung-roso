<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLogin_pelanggan extends CI_Model
{
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}
	public function register($data)
	{
		$this->db->insert('pelanggan', $data);
	}
}

/* End of file mLogin_pelanggan.php */
