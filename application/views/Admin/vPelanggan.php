<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Pelanggan</h1>
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
									<!-- <th>Username</th>
									<th>Password</th> -->
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
										<!-- <td><?= $value->username ?></td>
										<td><?= $value->password ?></td> -->

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