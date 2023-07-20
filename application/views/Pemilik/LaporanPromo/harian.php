<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Laporan</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body m-sm-3 m-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted">Laporan Promo Produk.</div>
                                <strong>Laporan Promo Produk Harian</strong>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <div class="text-muted">Payment Date</div>
                                <strong><?= $tanggal ?> / <?= $bulan ?> / <?= $tahun ?></strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Id Produk</th>
                                    <th>Nama Promo</th>
                                    <th>Qty</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($laporan as $key => $value) {
                                ?>

                                    <tr>
                                        <td><?= $value->id_produk ?></td>
                                        <td><?= $value->nama_produk ?></td>
                                        <td><?= $value->qty ?> </td>
                                        <td><?= $value->tgl_transaksi ?> </td>
                                        <td>Rp. <?= number_format($value->harga) ?> </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center">


                            <button onclick="window.print()" class="btn btn-primary">
                                Cetak Laporan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>