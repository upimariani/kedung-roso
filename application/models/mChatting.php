<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mChatting extends CI_Model
{
	public function send_pelanggan($data)
	{
		$this->db->insert('chatting', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('chatting');
		$this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('pelanggan.id_pelanggan', $this->session->userdata('id'));
		return $this->db->get()->result();
	}

	//admin
	public function chat_pelanggan()
	{
		return $this->db->query("SELECT * FROM `chatting` JOIN pelanggan ON pelanggan.id_pelanggan=chatting.id_pelanggan GROUP BY chatting.id_pelanggan ORDER BY time DESC")->result();
	}
	public function detail_chatting($id)
	{
		return $this->db->query("SELECT * FROM `chatting` JOIN pelanggan ON pelanggan.id_pelanggan=chatting.id_pelanggan WHERE chatting.id_pelanggan='" . $id . "'")->result();
	}
}

/* End of file mChatting.php */
