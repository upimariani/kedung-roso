<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPelanggan extends CI_Model
{
	public function select()
	{
		return $this->db->query("SELECT * FROM `pelanggan`")->result();
	}
	
}

/* End of file mPelanggan.php */
