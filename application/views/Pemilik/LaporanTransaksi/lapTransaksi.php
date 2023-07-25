<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Analisis</strong> Transaksi</h3>
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
			<div class="col-md-4">
				<div class="card card-light">
					<div class="card-header">
						<h3 class="card-title">Laporan Harian</h3>
					</div>
					<div class="card-body">
						<?php
						echo form_open('Pemilik/cLaporan_Transaksi/lap_harian_transaksi') ?>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Tanggal</label>
									<select name="tanggal" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 31; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Bulan</label>
									<select name="bulan" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 12; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" class="form-control">
										<?php
										$mulai = date('Y') - 1;
										for ($i = $mulai; $i < $mulai + 10; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info mt-3"><i class="fa fa-print"></i> Cetak Laporan</button>
								</div>
							</div>
						</div>
						<?php
						echo form_close() ?>
					</div>
				</div>
			</div>


			<div class="col-md-4">
				<div class="card card-light">
					<div class="card-header">
						<h3 class="card-title">Laporan Bulanan</h3>
					</div>
					<div class="card-body">
						<?php
						echo form_open('Pemilik/cLaporan_Transaksi/lap_bulanan_transaksi') ?>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Bulan</label>
									<select name="bulan" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 12; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" class="form-control">
										<?php
										$mulai = date('Y') - 1;
										for ($i = $mulai; $i < $mulai + 10; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info mt-3"><i class="fa fa-print"></i> Cetak Laporan</button>
								</div>
							</div>
						</div>
						<?php
						echo form_close() ?>
					</div>
				</div>
			</div>


			<div class="col-md-4">
				<div class="card card-light">
					<div class="card-header">
						<h3 class="card-title">Laporan Tahunan</h3>
					</div>
					<div class="card-body">
						<?php
						echo form_open('Pemilik/cLaporan_Transaksi/lap_tahunan_transaksi') ?>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" class="form-control">
										<?php
										$mulai = date('Y') - 1;
										for ($i = $mulai; $i < $mulai + 10; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info mt-3"><i class="fa fa-print"></i> Cetak Laporan</button>
								</div>
							</div>
						</div>
						<?php
						echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>