<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProfil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mProfil');
    }

    public function index()
    {
        $data = array(
            'pelanggan' => $this->mProfil->pelanggan()
        );
        $this->load->view('Pelanggan/layouts/header');
        $this->load->view('Pelanggan/layouts/aside');
        $this->load->view('Pelanggan/profil', $data);
        $this->load->view('Pelanggan/Layouts/footer');
    }
    public function daftar_member($id)
    {
        $data = array(
            'member' => '1'
        );
        $this->mProfil->daftar_member($id, $data);
        $this->session->set_flashdata('success', 'Selamat Anda Sekarang Sudah menjadi Member Sisi Jalan Kopi!');
        redirect('pelanggan/cprofil');
    }
}

/* End of file cProfil.php */
