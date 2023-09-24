<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(<?= base_url('asset/foto2.jpg') ?>);">
	<h2 class="tit6 t-center">
		Pesanan Saya
	</h2>
</section>


<!-- Reservation -->
<section class="section-reservation bg1-pattern p-t-100 p-b-113">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="t-center">
					<span class="tit2 t-center">
						RUMAH MAKAN KEDUNG ROSO
					</span>
					<h3 class="tit3 t-center m-b-35 m-t-2">
						Pesanan Saya
					</h3>
					<?php if ($this->session->userdata('success')) {
						echo '<div class="alert alert-success" role="alert">';
						echo $this->session->userdata('success');
						echo '</div>';
					} ?>
				</div>
			</div>
			<div class="col-lg-9 p-b-30">
				<h2 class="mb-3">Pesanan Saya</h2>

				<div id='console'></div>
				<table class="view_detail table table-striped">
					<thead>
						<th class="text-center">No</th>
						<th class="text-center">Transaksi</th>
						<th class="text-center">Atas Nama</th>
						<th class="text-center">Pembayaran</th>
						<th class="text-center">View Detail Pesanan</th>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($pesanan as $key => $value) {
							if ($value->status_order != '4') {

						?>
								<tr>
									<td><?= $no++ ?></td>
									<td>
										<p>Tgl Transaksi : <?= $value->tgl_transaksi ?></p>
										<?php
										if ($value->status_order == '0') {
											echo '<span class="badge badge-danger">Belum Bayar</span>';
										}
										if ($value->status_order == '1') {
											echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
										}
										if ($value->status_order == '2') {
											echo '<span class="badge badge-info">Pesanan Diproses</span>';
										}
										if ($value->status_order == '3') {
											echo ' <span class="badge badge-primary">Pesanan Dikirim</span>';
										?>
											<a href="<?= base_url('Pelanggan/cPesananSaya/diterima/' . $value->id_pesanan) ?>" class="btn btn-warning">Pesanan Diterima</a>
										<?php
										}
										if ($value->status_order == '4') {
											echo '<span class="badge badge-success">Pesanan Selesai</span>';
										}
										?>
										<br>
										Metode Pembayaran : <?php if ($value->metode_bayar == '1') {
																echo 'COD';
															} else {
																echo 'Transfer';
															} ?>
									</td>
									<td>
										<p><?= $value->nama_plggn ?></p>
										<p>No. Hp : <span class="badge badge-warning"> <?= $value->no_hp ?></span></p>
									</td>
									<td>
										<h4>Rp. <?= number_format($value->total_bayar, 0)  ?></h4><br>


										<?php if ($value->status_order == '0' && $value->metode_bayar == '2') {
											if ($value->status_bayar != '1') {
										?>
												Pembayaran*
												<?php echo form_open_multipart('pelanggan/cpesanansaya/bayar/' . $value->id_pesanan . '/' . $value->total_bayar); ?>
												<input type="file" name="bayar" class="form-control mb-2" required>
												<input name="bank" class="form-control mb-2" placeholder="Masukkan Nama Bank" required>
												<input name="norek" class="form-control mb-2" placeholder="Masukkan No Rekening" required>
												<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">Upload</button>
												</form>
											<?php
											}  ?>
										<?php } ?>
										<?php
										if ($value->metode_bayar == '2' && $value->bukti_pembayaran != null) {
										?>
											<p>Bukti Pembayaran:</p>
											<img style="width: 50px;" src="<?= base_url('asset/bukti-bayar/' . $value->bukti_pembayaran) ?>">
										<?php
										}
										?>
										<?php
										if ($value->status_order == '4') {
										?>
											<br>
											<a href="<?= base_url('Pelanggan/cPesananSaya/penilaian_produk/' . $value->id_pesanan) ?>" class="btn btn-success mt-3">Penilaian Produk</button>
											<?php
										}
											?>
									</td>
									<td class="text-center"><button data-id="<?= $value->id_pesanan ?>" class="btn_detail btn btn-default"><i class="fa fa-bars"></i></button></td>
								</tr>
						<?php
							}
						}
						?>

					</tbody>
				</table>


			</div>

			<div class="detail_pesanan col-lg-3" style="display: none;">
				<h4>Detail Pesanan</h4>
				<table class=" table table-striped">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Qty</th>
							<th>Harga </th>
						</tr>
					</thead>
					<tbody id="detail">

					</tbody>
				</table>
				<button id="hide" class="btn btn-danger">Kembali</button>
			</div>
			<div class="col-lg-9 p-b-30">
				<h2 class="mb-3">Pesanan Saya Selesai</h2>
				<table class="view_detail table table-striped">
					<thead>
						<th class="text-center">No</th>
						<th class="text-center">Transaksi</th>
						<th class="text-center">Atas Nama</th>
						<th class="text-center">Pembayaran</th>
						<th class="text-center">View Detail Pesanan</th>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($pesanan as $key => $value) {
							if ($value->status_order == '4') {
								# code...

						?>
								<tr>
									<td><?= $no++ ?></td>
									<td>
										<p>Tgl Transaksi : <?= $value->tgl_transaksi ?></p>
										<?php
										if ($value->status_order == '0') {
											echo '<span class="badge badge-danger">Belum Bayar</span>';
										}
										if ($value->status_order == '1') {
											echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
										}
										if ($value->status_order == '2') {
											echo '<span class="badge badge-info">Pesanan Diproses</span>';
										}
										if ($value->status_order == '3') {
											echo ' <span class="badge badge-primary">Pesanan Dikirim</span>';
										?>
											<a href="<?= base_url('Pelanggan/cPesananSaya/diterima/' . $value->id_pesanan) ?>" class="btn btn-warning">Pesanan Diterima</a>
										<?php
										}
										if ($value->status_order == '4') {
											echo '<span class="badge badge-success">Pesanan Selesai</span>';
										}
										?>
										<br>
										Metode Pembayaran : <?php if ($value->metode_bayar == '1') {
																echo 'COD';
															} else {
																echo 'Transfer';
															} ?>
									</td>
									<td>
										<p><?= $value->nama_plggn ?></p>
										<p>No. Hp : <span class="badge badge-warning"> <?= $value->no_hp ?></span></p>
									</td>
									<td>
										<h4>Rp. <?= number_format($value->total_bayar, 0)  ?></h4><br>


										<?php if ($value->status_order == '0' && $value->metode_bayar == '2') {
											if ($value->status_bayar != '1') {
										?>
												Pembayaran*
												<?php echo form_open_multipart('pelanggan/cpesanansaya/bayar/' . $value->id_pesanan . '/' . $value->total_bayar); ?>
												<input type="file" name="bayar" class="form-control mb-2" required>
												<input name="bank" class="form-control mb-2" placeholder="Masukkan Nama Bank" required>
												<input name="norek" class="form-control mb-2" placeholder="Masukkan No Rekening" required>
												<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">Upload</button>
												</form>
											<?php
											} ?>



										<?php } ?>
										<?php
										if ($value->status_order == '4') {
										?>
											<br>
											<a href="<?= base_url('Pelanggan/cPesananSaya/penilaian_produk/' . $value->id_pesanan) ?>" class="btn btn-success mt-3">Penilaian Produk</button>
											<?php
										}
											?>

									</td>
									<td class="text-center"><button data-id="<?= $value->id_pesanan ?>" class="btn_detail btn btn-default"><i class="fa fa-bars"></i></button></td>
								</tr>
						<?php
							}
						}
						?>

					</tbody>
				</table>


			</div>

		</div>

	</div>
</section>