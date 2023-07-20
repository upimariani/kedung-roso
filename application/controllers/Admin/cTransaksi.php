<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksi');
        $this->load->model('mLaporan');
    }


    public function index()
    {
        $data = array(
            'grafik_transaksi' => $this->mLaporan->grafik_transaksi(),
            'grafik_pelanggan' => $this->mLaporan->grafik_pelanggan(),
            'grafik_alamat' => $this->mLaporan->grafik_alamat(),
            'grafik_produk' => $this->mLaporan->grafik_produk(),
            'grafik_promo' => $this->mLaporan->grafik_promo(),
            'status' => $this->mTransaksi->status_order_deliv()
        );
        $this->protect->protect_admin();
        $this->load->view('Admin/Layouts/head');
        $this->load->view('Admin/transaksi/status_order', $data);
        $this->load->view('Admin/Layouts/footer');
    }
    public function detail_pesanan($id)
    {
        $this->protect->protect_admin();
        $data = array(
            'grafik_transaksi' => $this->mLaporan->grafik_transaksi(),
            'grafik_pelanggan' => $this->mLaporan->grafik_pelanggan(),
            'grafik_alamat' => $this->mLaporan->grafik_alamat(),
            'grafik_produk' => $this->mLaporan->grafik_produk(),
            'grafik_promo' => $this->mLaporan->grafik_promo(),
            'detail' => $this->mTransaksi->detail_pesanan_deliv($id)
        );
        $this->load->view('Admin/Layouts/head');
        $this->load->view('Admin/transaksi/detail_pesanan_deliv', $data);
        $this->load->view('Admin/Layouts/footer');
    }


    //transaksi delivery
    public function konfirmasi($id)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->mTransaksi->status_transaksi($id, $data);
        redirect('Admin/cTransaksi');
    }
    public function kirim($id)
    {
        $data = array(
            'status_order' => '3'
        );
        $this->mTransaksi->status_transaksi($id, $data);
        redirect('Admin/cTransaksi');
    }
}

/* End of file cTransaksi.php */
