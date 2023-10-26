<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Data Promo Menu</h1>
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
					<strong>Hallo!!!</strong> <?= $this->session->userdata('success') ?>
				</div>
			</div>
		<?php
		}
		?>


		<div class="row">
			<div class="col-6 col-xl-7">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Informasi Promo Menu</h5>
					</div>
					<table id="myTable" class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Menu</th>
								<th>Nama Promo</th>
								<th>Besar Promo</th>
								<th>Tgl Promo</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($diskon as $key => $value) {
							?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $value->nama_produk ?></td>
									<td><?= $value->nama_promo ?></td>
									<td><?= $value->diskon ?>%</td>
									<td><?= $value->tgl_diskon ?></td>

									<td class="table-action">
										<button class="btn btn-success" data-toggle="modal" data-target="#edit<?= $value->kode_promo ?>"><i class="align-middle" data-feather="edit-2"></i></button>
										<button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $value->kode_promo ?>"><i class="align-middle" data-feather="trash"></i></button>
									</td>
								</tr>
							<?php
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
			<div class="col-12 col-xl-5">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Tambah Data Promo</h5>
					</div>
					<div class="card-body">
						<form action="<?= base_url('admin/cDiskon') ?>" method="POST">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="form-label">Nama Menu</label>
										<select class="form-control" name="menu">
											<option value="">---Pilih Menu---</option>
											<?php
											foreach ($produk as $key => $value) {
											?>
												<option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
											<?php
											}
											?>


										</select><?= form_error('menu', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="form-label">Nama Promo</label>
										<input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" placeholder="Masukkan Nama Promo">
										<?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-lg-12">
									<div class="form-group">
										<label class="form-label">Besar Diskon</label>
										<input type="text" value="<?= set_value('diskon') ?>" name="diskon" class="form-control" placeholder="Masukkan Besar Diskon">
										<?= form_error('diskon', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>


							<button type="submit" class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>



<?php
foreach ($diskon as $key => $value) {
?>

	<div class="modal fade" id="edit<?= $value->kode_promo ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form action="<?= base_url('admin/cDiskon/update/' . $value->kode_promo) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Update Data Diskon</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body m-3">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label class="form-label">Nama Menu</label>
									<select class="form-control" name="menu">
										<option value="">---Pilih Menu---</option>
										<?php
										foreach ($produk as $key => $item) {
										?>
											<option value="<?= $item->id_produk ?>" <?php if ($value->id_produk == $item->id_produk) {
																						echo 'selected';
																					} ?>><?= $item->nama_produk ?></option>
										<?php
										}
										?>


									</select><?= form_error('menu', '<small class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="form-label">Nama Promo</label>
									<input type="text" name="nama" value="<?= $value->nama_promo ?>" class="form-control" placeholder="Masukkan Nama Promo">
									<?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-lg-12">
								<div class="form-group">
									<label class="form-label">Besar Promo</label>
									<input type="text" value="<?= $value->diskon ?>" name="diskon" class="form-control" placeholder="Masukkan Besar Diskon">
									<?= form_error('diskon', '<small class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
			</form>
		</div>
	</div>
	</div>
<?php
}
?>

<?php
foreach ($diskon as $key => $value) {
?>

	<div class="modal fade" id="hapus<?= $value->kode_promo ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form action="<?= base_url('admin/cDiskon/delete/' . $value->kode_promo) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Informasi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body m-3">
						<p class="mb-0">Apakah Anda Yakin Untuk Menghapus?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
}
?>