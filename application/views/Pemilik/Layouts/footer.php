<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-left">
                <p class="mb-0">
                    <a href="index.html" class="text-muted"><strong>AdminKit Demo</strong></a> &copy;
                </p>
            </div>
            <div class="col-6 text-right">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Help Center</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Terms</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<?php
foreach ($grafik_transaksiDev as $key => $value) {
    $tanggal[] = $value->tanggal;
    $total_delivery[] = $value->total_delivery;
}
?>
<?php
foreach ($grafik_transaksi as $key => $value) {
    $tgl[] = $value->tgl_transaksi;
    $total[] = $value->total;
}
?>
<?php
foreach ($grafik_produk as $key => $value) {
    $produk[] = $value->nama_produk;
    $jumlah_qty[] = $value->jumlah_qty;
}
?>
<?php
foreach ($grafik_pelanggan as $key => $value) {
    $jenis[] = $value->jenis_kelamin;
    $jml[] = $value->jml;
}
?>
<?php
foreach ($grafik_alamat as $key => $value) {
    $alamat[] = $value->alamat;
    $jut[] = $value->jut;
}
?>
<?php
foreach ($grafik_promo as $key => $value) {
    $nama[] = $value->nama_promo;
    $jumlah[] = $value->jumlah;
}
?>
<script src="<?= base_url('asset/adminkit/examples/') ?>js/vendor.js"></script>
<script src="<?= base_url('asset/adminkit/examples/') ?>js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="<?= base_url() ?>asset/chart/dist/Chart.min.js"></script>
<script src="<?= base_url() ?>asset/chart/samples/utils.js"></script>
<script>
    var ctx = document.getElementById('transaksi_delivery');
    var grafik = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($tanggal) ?>,
            datasets: [{
                label: 'Grafik Analisis Transaksi Delivery',
                data: <?= json_encode($total_delivery) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                fill: false,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('transaksi');
    var grafik = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($tgl) ?>,
            datasets: [{
                label: 'Grafik Analisis Transaksi',
                data: <?= json_encode($total) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                fill: false,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('produk');
    var grafik = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($produk) ?>,
            datasets: [{
                label: 'Grafik Analisis Produk',
                data: <?= json_encode($jumlah_qty) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                fill: false,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('pelanggan');
    var grafik = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($jenis) ?>,
            datasets: [{
                label: 'Grafik Analisis Pelanggan',
                data: <?= json_encode($jml) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                fill: false,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('alamat');
    var grafik = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($alamat) ?>,
            datasets: [{
                label: 'Grafik Analisis alamat',
                data: <?= json_encode($jut) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                fill: false,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('promo');
    var grafik = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($nama) ?>,
            datasets: [{
                label: 'Grafik Analisis Besar Promo',
                data: <?= json_encode($jumlah) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 0.80)',
                    'rgba(54, 162, 235, 0.80)',
                    'rgba(255, 206, 86, 0.80)',
                    'rgba(75, 192, 192, 0.80)',
                    'rgba(153, 102, 255, 0.80)',
                    'rgba(255, 159, 64, 0.80)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 76, 76, 0.3)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(0, 140, 162, 1)',
                    'rgba(158, 109, 8, 1)',
                    'rgba(201, 76, 76, 0.8)',
                    'rgba(0, 129, 212, 1)',
                    'rgba(201, 77, 201, 1)',
                    'rgba(255, 207, 207, 1)',
                    'rgba(201, 77, 77, 1)',
                    'rgba(128, 98, 98, 1)',
                    'rgba(0, 0, 0, 1)',
                    'rgba(128, 128, 128, 1)'
                ],
                fill: false,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>

<script>
    $(function() {
        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });

    });
</script>
</body>

</html>
