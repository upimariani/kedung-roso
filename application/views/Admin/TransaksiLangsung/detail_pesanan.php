<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Laporan Transaksi</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body m-sm-3 m-md-5">
						<div class="row">
							<div class="col-md-6">
								<div class="text-muted">No Transaksi.</div>
								<strong><?= $detail['transaksi']->tgl_transaksi . $detail['transaksi']->id_pesanan ?></strong><br>
								<strong>Atas Nama : <?= $detail['transaksi']->nama_plggn ?></strong>
							</div>
							<div class="col-md-6 text-md-right">
								<div class="text-muted">Tanggal</div>
								<strong><?= $detail['transaksi']->tgl_transaksi ?></strong>
							</div>
						</div>

						<hr class="my-4" />

						<div class="row mb-4">




						</div>

						<table class="table table-sm">
							<thead>
								<tr>
									<th>Quantity</th>
									<th>Produk</th>
									<th>Harga</th>
									<th class="text-right">Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($detail['pesanan'] as $key => $value) {
								?>
									<tr>
										<td><?= $value->qty ?></td>
										<td><?= $value->nama_produk ?></td>
										<td>Rp. <?= number_format($value->harga)  ?></td>
										<td class="text-right">Rp. <?= number_format($value->qty * $value->harga)  ?></td>
									</tr>
								<?php
								}
								?>



								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Total </th>
									<th class="text-right">Rp. <?= number_format($detail['transaksi']->total_bayar) ?></th>
								</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>

	</div>
</main>