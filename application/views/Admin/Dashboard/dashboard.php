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
			<div class="col-12 col-lg-12">
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
			</div>
			<div class="col-12 col-lg-6">
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
			</div>

			<div class="col-12 col-lg-6">
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

		</div>


	</div>
</main>