<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Pelanggan</h1>
		<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#defaultModalPrimary">
			Create Pelanggan
		</button>
		<div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Pelanggan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body m-3">
						<form action="<?= base_url('Admin/cPelanggan/create') ?>" method="POST">
							<div class="modal-body m-3">

								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="form-label">Nama Pelanggan</label>
											<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="form-label">Alamat</label>
											<input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="form-label">No Telepon</label>
											<input type="text" name="no_hp" class="form-control" placeholder="Masukkan No Telepon" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="form-label">Email</label>
											<input type="text" name="email" class="form-control" placeholder="Masukkan Email" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="form-label">Tempat, Tanggal Lahir</label>
											<input type="text" name="ttl" class="form-control" placeholder="Masukkan Tempat Tanggal Lahir" required>
										</div>
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
			<div class="col-12 col-xl-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Informasi Pelanggan</h5>
					</div>
					<div class="card-body">
						<table id="myTable" class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Pelanggan</th>
									<th>Alamat</th>
									<th>No Telepon</th>
									<th>Email</th>
									<th>Tempat, Tanggal Lahir</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($pelanggan as $key => $value) {
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $value->nama_plggn ?></td>
										<td><?= $value->alamat ?></td>
										<td><?= $value->no_hp ?></td>
										<td><?= $value->email ?></td>
										<td><?= $value->ttl ?></td>
										<td>
											<button class="btn btn-warning" data-toggle="modal" data-target="#defaultModalPrimary<?= $value->id_pelanggan ?>">Edit</button>
											<a class="btn btn-danger" href="<?= base_url('admin/cpelanggan/delete/' . $value->id_pelanggan) ?>">Hapus</a>
										</td>
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

<?php
foreach ($pelanggan as $key => $value) {
?>
	<div class="modal fade" id="defaultModalPrimary<?= $value->id_pelanggan ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update Pelanggan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('admin/cpelanggan/update/' . $value->id_pelanggan) ?>" method="POST">
					<div class="modal-body m-3">

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-label">Nama Pelanggan</label>
									<input type="text" value="<?= $value->nama_plggn ?>" name="nama" class="form-control" placeholder="Masukkan Nama">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-label">Alamat</label>
									<input type="text" name="alamat" value="<?= $value->alamat ?>" class="form-control" placeholder="Masukkan Alamat">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-label">No Telepon</label>
									<input type="text" value="<?= $value->no_hp ?>" name="no_hp" class="form-control" placeholder="Masukkan No Telepon">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-label">Email</label>
									<input type="text" value="<?= $value->email ?>" name="email" class="form-control" placeholder="Masukkan Email">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label class="form-label">Tempat, Tanggal Lahir</label>
									<input type="text" value="<?= $value->ttl ?>" name="ttl" class="form-control" placeholder="Masukkan Tempat Tanggal Lahir">
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