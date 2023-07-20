<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Informasi Status Order Take In</h1>

        <div class="row">
            <div class="col-md-3 col-xl-2">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Transaksi</h5>
                    </div>

                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#pesanan_masuk" role="tab">
                            Pesanan Masuk
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#konfirmasi" role="tab">
                            Konfirmasi
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#diproses" role="tab">
                            Pesanan Diproses
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#selesai" role="tab">
                            Selesai
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-xl-10">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pesanan_masuk" role="tabpanel">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Pesanan Masuk</h5>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Atas Nama</th>
                                        <th class="text-center">Waktu Order</th>
                                        <th class="text-center">Total Pembayaran</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($status['pesanan_masuk'] as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>.</td>
                                            <td><?= $value->nama_pelanggan ?></td>
                                            <td><?= $value->time ?></td>
                                            <td>Rp. <?= number_format($value->total_bayar) ?></td>
                                            <td class="text-center"><a href="<?= base_url('Admin/cTakeIn/detail_pesanan/' . $value->id_transaksi) ?>"><i class="align-middle" data-feather="align-justify"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="konfirmasi" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Konfirmasi Pembayaran</h5>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atas Nama</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Total Pembayaran</th>
                                        <th>Konfirmasi Pembayaran</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($status['konfirmasi'] as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>.</td>
                                            <td><?= $value->nama_pelanggan ?></td>
                                            <td><?= $value->time ?></td>
                                            <td>Rp. <?= number_format($value->total_bayar) ?></td>
                                            <td><a class="btn btn-warning" href="<?= base_url('admin/ctakein/konfirmasi_takein/' . $value->id_transaksi) ?>">Konfirmasi Pembayaran</a></td>
                                            <td class="text-center"><a href="<?= base_url('Admin/cTakeIn/detail_pesanan/' . $value->id_transaksi) ?>"><i class="align-middle" data-feather="align-justify"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="diproses" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Pesanan Diproses</h5>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atas Nama</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Total Pembayaran</th>
                                        <th>Selesai</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($status['diproses'] as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>.</td>
                                            <td><?= $value->nama_pelanggan ?></td>
                                            <td><?= $value->time ?></td>
                                            <td>Rp. <?= number_format($value->total_bayar) ?></td>
                                            <td><a href="<?= base_url('admin/ctakein/selesai/' . $value->id_transaksi) ?>" class="btn btn-success">Pesanan Selesai</a></td>
                                            <td class="text-center"><a href="<?= base_url('Admin/cTakeIn/detail_pesanan/' . $value->id_transaksi) ?>"><i class="align-middle" data-feather="align-justify"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="selesai" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Pesanan Selesai</h5>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atas Nama</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Total Pembayaran</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($status['selesai'] as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>.</td>
                                            <td><?= $value->nama_pelanggan ?></td>
                                            <td><?= $value->time ?></td>
                                            <td>Rp. <?= number_format($value->total_bayar) ?></td>
                                            <td class="text-center"><a href="<?= base_url('Admin/cTakeIn/detail_pesanan/' . $value->id_transaksi) ?>"><i class="align-middle" data-feather="align-justify"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>