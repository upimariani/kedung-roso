<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
    public function status_order_deliv()
    {
        $data['pesanan_masuk'] = $this->db->query("SELECT*FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.status_order='0' AND status_pesan='2'")->result();
        $data['konfirmasi'] = $this->db->query("SELECT*FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.status_order='1' AND status_pesan='2'")->result();
        $data['diproses'] = $this->db->query("SELECT*FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.status_order='2' AND status_pesan='2'")->result();
        $data['dikirim'] = $this->db->query("SELECT*FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.status_order='3' AND status_pesan='2'")->result();
        $data['selesai'] = $this->db->query("SELECT*FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.status_order='4' AND status_pesan='2'")->result();
        return $data;
    }
    public function detail_pesanan_takein($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE id_transaksi='" . $id . "';")->row();
        $data['pesanan'] = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk=produk.id_produk JOIN promo ON promo.id_produk = produk.id_produk WHERE transaksi.id_transaksi='" . $id . "';")->result();
        return $data;
    }

    public function detail_pesanan_deliv($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pengiriman ON transaksi.id_transaksi=pengiriman.id_transaksi JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE transaksi.id_transaksi='" . $id . "';")->row();
        $data['pesanan'] = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk=produk.id_produk JOIN promo ON promo.id_produk = produk.id_produk WHERE transaksi.id_transaksi='" . $id . "';")->result();
        return $data;
    }
    public function status_order_takein()
    {
        $data['pesanan_masuk'] = $this->db->query("SELECT*FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.status_order='0' AND status_pesan='1'")->result();
        $data['konfirmasi'] = $this->db->query("SELECT*FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.status_order='1' AND status_pesan='1'")->result();
        $data['diproses'] = $this->db->query("SELECT*FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.status_order='2' AND status_pesan='1'")->result();
        $data['selesai'] = $this->db->query("SELECT*FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE transaksi.status_order='4' AND status_pesan='1'")->result();
        return $data;
    }

    public function status_transaksi($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
    }
}

/* End of file mTransaksi.php */
