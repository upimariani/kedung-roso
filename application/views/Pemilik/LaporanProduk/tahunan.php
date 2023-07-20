<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Laporan</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body m-sm-3 m-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted">Laporan Produk.</div>
                                <strong>Laporan Produk Tahunan</strong>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <div class="text-muted">Tanggal</div>
                                <strong> <?= $tahun ?></strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Id Transaksi</th>
                                    <th>Nama Produk</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($laporan as $key => $value) {
                                    $total += $value->qty * ($value->harga - ($value->besar / 100 * $value->harga));
                                ?>

                                    <tr>
                                        <td><?= $value->id_transaksi ?></td>
                                        <td><?= $value->nama_produk ?></td>
                                        <td><?= $value->qty ?></td>
                                        <td>Rp. <?= number_format($value->harga - ($value->besar / 100 * $value->harga)) ?></td>
                                        <td>Rp. <?= number_format($value->qty * ($value->harga - ($value->besar / 100 * $value->harga))) ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>
                                        <h3>Total</h3>
                                    </th>
                                    <th class="text-right">
                                        <h3>Rp. <?= number_format($total) ?></h3>
                                    </th>
                                </tr>

                            </tbody>
                        </table>

                        <div class="text-center">
                            <!-- <p class="text-sm">
                                <strong>Extra note:</strong> Please send all items at the same time to the shipping address. Thanks in advance.
                            </p> -->

                            <button class="btn btn-primary" onclick="window.print()"><i class="fas fa-print"></i>Cetak Laporan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>