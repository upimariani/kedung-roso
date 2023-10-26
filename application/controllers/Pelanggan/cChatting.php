<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cChatting extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChatting');
	}

	public function index()
	{
		$this->form_validation->set_rules('pesan', 'Pesan', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->protect->protect();
			$data = array(
				'pesan' => $this->mChatting->select()
			);
			$this->load->view('Pelanggan/layouts/header');
			$this->load->view('Pelanggan/layouts/aside');
			$this->load->view('Pelanggan/chatting', $data);
			$this->load->view('Pelanggan/Layouts/footer');
		} else {
			$this->protect->protect();
			$data = array(
				'id_pelanggan' => $this->session->userdata('id'),
				'pelanggan_send' => $this->input->post('pesan'),
				'admin_send' => '0'
			);
			$this->mChatting->send_pelanggan($data);
			$this->session->set_flashdata('success', 'Pesan Anda Berhasil Dikirim!');
			redirect('pelanggan/cchatting');
		}
	}

	public function saran()
	{
		$this->protect->protect();
		$data = array(
			'id_pelanggan' => $this->session->userdata('id'),
			'kritik_saran' => $this->input->post('kritik')
		);
		$this->mChatting->insert_saran($data);
		$this->session->set_flashdata('success', 'Kritik dan Saran Berhasil Dikirim!');
		redirect('pelanggan/chome');
	}
}

/* End of file cChatting.php */
