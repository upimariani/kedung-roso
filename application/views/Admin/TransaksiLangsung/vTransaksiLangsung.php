<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Katalog Produk</h1>
		<?php
		if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="alert-icon">
					<i class="far fa-fw fa-bell"></i>
				</div>
				<div class="alert-message">
					<strong>Haloo!!</strong> <?= $this->session->userdata('success') ?>
				</div>
			</div>
		<?php
		}
		?>
		<?php
		$qty = 0;
		foreach ($this->cart->contents() as $key => $value) {
			$qty += $value['qty'];
		}
		if ($qty != 0) {
		?>
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Informasi Keranjang</h5>
				</div>

				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Nama Produk</th>
							<th>Quantity</th>
							<th>Harga</th>
							<th>Subtotal</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php echo form_open('Admin/cTransaksiLangsung/update_cart'); ?>
						<?php
						$no = 1;
						$i = 1;
						foreach ($this->cart->contents() as $key => $value) {
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><img style="width: 150px;" class="rounded-circle" src="<?= base_url('asset/foto-produk/' . $value['picture']) ?>"></td>
								<td><?= $value['name'] ?></td>
								<td>
									<input name="<?= $i . '[qty]' ?>" min="1" type="number" value="<?= $value['qty'] ?>">
									<button type="submit" class="btn btn-success">Update Qty</button>
								</td>
								<td>Rp. <?= number_format($value['price'], 0)  ?></td>
								<td>Rp. <?= number_format($value['price'] * $value["qty"])  ?></td>
								<td><a href="<?= base_url('Admin/cTransaksiLangsung/delete/' . $value['rowid']) ?>">Hapus</a></td>
							</tr>
						<?php
							$i++;
						}
						?>
						<?php echo form_close(); ?>
						<form action="<?= base_url('Admin/cTransaksiLangsung/selesai') ?>" method="POST">
							<tr>
								<td>Pesanan Atas Nama:</td>
								<td colspan="3">
									<select id="cars" name="pelanggan" class="js-example-basic-single form-control">
										<option>---Pilih Nama Pelanggan---</option>
										<?php
										foreach ($pelanggan as $key => $value) {
										?>
											<option value="<?= $value->id_pelanggan  ?>"><?= $value->nama_plggn ?> | <?= $value->alamat ?></option>
										<?php
										}
										?>
									</select>
								</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td><button type="submit" class="btn btn-success">Selesai</button></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Total: </td>
								<td>
									<h4>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h4>
								</td>
								<td></td>
							</tr>
						</form>
					</tbody>
				</table>

			</div>
		<?php
		}
		?>


		<div class="row">
			<div class="col-md-3 col-xl-2">

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Transaksi</h5>
					</div>

					<div class="list-group list-group-flush" role="tablist">
						<a class="list-group-item list-group-item-action active" data-toggle="list" href="#kasir" role="tab">
							Kasir Langsung
						</a>
						<a class="list-group-item list-group-item-action" data-toggle="list" href="#selesai" role="tab">
							Kasir Selesai
						</a>

					</div>
				</div>
			</div>

			<div class="col-md-9 col-xl-10">
				<div class="tab-content">
					<div class="tab-pane fade show active" id="kasir" role="tabpanel">

						<div class="card">
							<div class="row">
								<?php
								foreach ($produk as $key => $value) {
								?>
									<div class="col-12 col-md-6 col-lg-4 mt-3">
										<div class="card">
											<img style="height: 150px;" class="card-img-top" src="<?= base_url('asset/foto-produk/' . $value->foto) ?>" alt="Unsplash">
											<div class="card-header">
												<h4 class="card-title mb-2"><?= $value->nama_produk ?></h4>
												<h5 class="card-title mb-0">Rp. <?= number_format($value->harga) ?></h5>
											</div>
											<div class="card-body">
												<p class="card-text"><?= $value->deskripsi ?></p>
												<a href="<?= base_url('Admin/cTransaksiLangsung/cart/' . $value->id_produk) ?>" class="btn btn-primary">Add To Cart</a>
											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>



						</div>
					</div>
					<div class="tab-pane fade" id="selesai" role="tabpanel">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Transaksi Langsung Selesai</h5>
							</div>
							<table class="table">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Waktu Order</th>
										<th class="text-center">Total Pembayaran</th>
										<th class="text-center">Metode Pembayaran</th>
										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($transaksi as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?>.</td>
											<td class="text-center"><?= $value->tgl_transaksi ?></td>
											<td class="text-center">Rp. <?= number_format($value->total_bayar) ?></td>
											<td class="text-center">
												<span class="badge badge-success">LANGSUNG</span>

											</td>
											<td class="text-center"><a href="<?= base_url('Admin/cTransaksiLangsung/detail_tran_langsung/' . $value->id_pesanan) ?>"><i class="align-middle" data-feather="align-justify"></i></a></td>
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