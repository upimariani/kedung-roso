<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Laporan</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body m-sm-3 m-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted">Laporan Pelanggan.</div>
                                <strong>Laporan Pelanggan Per Jenis Kelamin dan Member Pelanggan</strong>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <div class="text-muted">Data</div>
                                <strong><?= $jk ?> / <?= $member ?></strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Create Member at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($laporan as $key => $value) {
                                ?>

                                    <tr>
                                        <td><?= $value->nama_pelanggan ?></td>
                                        <td><?= $value->jenis_kelamin ?></td>
                                        <td><?= $value->no_hp ?></td>
                                        <td><?= $value->alamat ?></td>
                                        <td><?= $value->create_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                        </table>

                        <div class="text-center">
                            <button class="btn btn-primary" onclick="window.print()"><i class="fas fa-print"></i>Cetak Laporan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>