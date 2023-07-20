<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan_Pelanggan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLaporan');
    }

    public function index()
    {
        $this->protect->protect_admin();
        $data = array(
            'grafik_pelanggan' => $this->mLaporan->grafik_pelanggan(),
            'grafik_alamat' => $this->mLaporan->grafik_alamat(),
            'grafik_produk' => $this->mLaporan->grafik_produk(),
            'grafik_transaksiDev' => $this->mLaporan->grafik_transaksiDev(),
            'grafik_promo' => $this->mLaporan->grafik_promo(),
            'grafik_transaksi' => $this->mLaporan->grafik_transaksi(),
            'histori' => $this->mLaporan->histori_pelanggan()
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/laporanPelanggan/lappelanggan', $data);
        $this->load->view('Pemilik/Layouts/footer', $data);
    }
    public function laporan()
    {
        $jk = $this->input->post('jk');
        $member =  $this->input->post('member');
        $data = array(
            'jk' => $jk,
            'member' => $member,
            'laporan' => $this->mLaporan->pelanggan($jk, $member),
            'grafik_produk' => $this->mLaporan->grafik_produk(),
            'grafik_pelanggan' => $this->mLaporan->grafik_pelanggan(),
            'grafik_alamat' => $this->mLaporan->grafik_alamat(),
            'grafik_promo' => $this->mLaporan->grafik_promo(),
            'grafik_transaksiDev' => $this->mLaporan->grafik_transaksiDev(),
            'grafik_transaksi' => $this->mLaporan->grafik_transaksi(),
        );
        $this->load->view('Pemilik/Layouts/head');
        $this->load->view('Pemilik/laporanPelanggan/laporan', $data);
        $this->load->view('Pemilik/Layouts/footer', $data);
    }
}

/* End of file cLaporan_Pelanggan.php */
