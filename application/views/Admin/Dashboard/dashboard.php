<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Analisis</strong> Dashboard</h3>
			</div>

			<div class="col-auto ml-auto text-right mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="#">AdminKit</a></li>
						<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
						<li class="breadcrumb-item active" aria-current="page">Analisis</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
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
							<strong>Sukses!</strong> <?= $this->session->userdata('success') ?>
						</div>
					</div>
				<?php
				}
				?>
			</div>

		</div>

		<div class="row">
			<div class="col-6 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Grafik Analisis Transaksi Pelanggan</h5>
						<!-- <h6 class="card-subtitle text-muted">A bar chart provides a way of showing data values represented as vertical bars.</h6> -->
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="pelanggan"></canvas>
						</div>
					</div>
				</div>
				<div class="card flex-fill w-100">
					<div class="card-header">
						<h5 class="card-title">Grafik Analisis Produk Terjual</h5>
						<!-- <h6 class="card-subtitle text-muted">A line chart is a way of plotting data points on a line.</h6> -->
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="produk"></canvas>
						</div>
					</div>

				</div>
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Grafik Analisis Transaksi</h5>
						<!-- <h6 class="card-subtitle text-muted">A bar chart provides a way of showing data values represented as vertical bars.</h6> -->
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="transaksi"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-6">
				<div class="card">
					<div class="card-header">

						<h5 class="card-title mb-0">Ulasan Pelanggan</h5>
						<div class="chart">
							<canvas id="ulasan"></canvas>
						</div>
					</div>
					<div class="card-body h-100">

						<?php
						foreach ($ulasan as $key => $value) {
						?>
							<hr>
							<div class="media">
								<div class="media-body">
									<small class="float-right text-navy"><?= $value->time_ulasan ?></small>
									<strong><?= $value->nama_plggn ?></strong> <?= $value->komentar ?> <strong><br />
										<small class="text-muted"><?= $value->nama_produk ?>
											<div class="quickview-ratting">
												<?php
												if ($value->rating == '0') {
												?>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
												<?php
												} else if ($value->rating == '1') {
												?>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
												<?php
												} else if ($value->rating == '2') {
												?>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
												<?php
												} else if ($value->rating == '3') {
												?>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
												<?php
												} else if ($value->rating == '4') {
												?>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star"></span>
												<?php
												} else if ($value->rating == '5') {
												?>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
												<?php
												}
												?>

											</div>
										</small><br />
										<div class="row">
											<div class="col-lg-6">
												<button type="button" data-toggle="modal" data-target="#defaultModalPrimary<?= $value->id_ulasan ?>" class="btn btn-primary btn-block">Balas Komentar</button>

											</div>
											<div class="col-lg-6">
												<a href="<?= base_url('Admin/cDashboard/hapus_ulasan/' . $value->id_ulasan) ?>" class="btn btn-danger btn-block">Hapus Ulasan</a>
											</div>
										</div>

								</div>


							</div>
							<br>
							<?php
							if ($value->isi_balasan != NULL) {
							?>
								<div class="media">
									<div class="media-body">
										<small class="float-right text-navy"><?= $value->time ?></small>
										<strong>Admin</strong> <?= $value->isi_balasan ?><br />
									</div>
								</div>
							<?php
							}
							?>

							<div class="modal fade" id="defaultModalPrimary<?= $value->id_ulasan ?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<form action="<?= base_url('Admin/cDashboard/balas_ulasan/' . $value->id_ulasan) ?>" method="POST">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Balas Komentar</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body m-3">
												<label>Tulis Balasan Komentar Pelanggan...</label>
												<textarea class="form-control" name="balasan" rows="5"></textarea>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Kirim</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-6">

			</div>

			<div class="col-12 col-lg-6">

			</div>
		</div>


	</div>
</main>