<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Laporan</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body m-sm-3 m-md-5">
						<div class="row">
							<div class="col-md-6">
								<div class="text-muted">Laporan Transaksi.</div>
								<strong>Laporan Transaksi Bulanan</strong>
							</div>
							<div class="col-md-6 text-md-right">
								<div class="text-muted">Tanggal</div>
								<strong><?= $bulan ?> / <?= $tahun ?></strong>
							</div>
						</div>
						<br>
						<br>
						<table class="table table-sm">
							<thead>
								<tr>
									<th>Id Transaksi</th>
									<th>Tanggal Transaksi</th>
									<th>Atas Nama</th>
									<th>Total Bayar</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$total = 0;
								foreach ($laporan as $key => $value) {
									$total += $value->total_bayar;
								?>

									<tr>
										<td><?= $value->id_pesanan ?></td>
										<td><?= $value->tgl_transaksi ?></td>
										<?php
										if ($value->nama_plggn == null) {
										?>
											<td>Transaksi Langsung</td>
										<?php
										} else {
										?><td><?= $value->nama_plggn ?></td>
										<?php
										}
										?>
										<td>Rp. <?= number_format($value->total_bayar) ?></td>
									</tr>
								<?php
								}
								?>

								<tr>
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