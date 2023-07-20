<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Laporan</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body m-sm-3 m-md-5">
						<div class="row">
							<div class="col-md-6">
								<div class="text-muted">Laporan Transaksi Pelanggan</div>
							</div>
							<div class="col-md-6 text-md-right">
								<div class="text-muted">Payment Date</div>
								<strong><?= date('Y-m-d') ?></strong>
							</div>
						</div>
						<br>
						<br>
						<table class="table table-sm">
							<thead>
								<tr>
									<th>Id Transaksi</th>
									<th>Tanggal Transaksi</th>
									<th>Nama Produk</th>
									<th>Quantity</th>
									<th>Total Bayar</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$total = 0;
								foreach ($detail as $key => $value) {
								?>

									<tr>
										<td><?= $value->id_transaksi ?></td>
										<td><?= $value->tgl_transaksi ?></td>
										<td><?= $value->nama_produk ?></td>
										<td><?= $value->qty ?></td>
										<td>Rp. <?= number_format($value->total_bayar) ?></td>
										<td><?= $value->time ?></td>
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
</main>
