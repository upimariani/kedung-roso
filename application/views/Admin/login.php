<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

	<link rel="shortcut icon" href="<?= base_url('asset/adminkit/examples/') ?>img/icons/icon-48x48.png" />

	<title>RUMAH MAKAN KEDUNG ROSO</title>

	<link href="<?= base_url('asset/adminkit/examples/') ?>css/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/trix-main/dist/') ?>trix.css">
	<script type="text/javascript" src="<?= base_url('asset/trix-main/dist/') ?>trix.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">


</head>
<div class="container">

	<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-12 d-flex flex-column align-items-center justify-content-center">


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
								<strong>Hallo!</strong> <?= $this->session->userdata('success') ?>
							</div>
						</div>
					<?php
					}
					?>
					<?php
					if ($this->session->userdata('error')) {
					?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="alert-icon">
								<i class="far fa-fw fa-bell"></i>
							</div>
							<div class="alert-message">
								<strong>Hello there!</strong> <?= $this->session->userdata('error') ?>
							</div>
						</div>
					<?php
					}
					?>
					<div class="card mb-3">
						<div class="card-body">
							<div class="pt-4 pb-2">
								<h5 class="card-title text-center pb-0 fs-4">Login</h5>
							</div>
							<form class="row g-3 needs-validation" action="<?= base_url('admin/clogin') ?>" method="POST">
								<div class="col-12">
									<label for="yourUsername" class="form-label">Username</label>
									<input type="text" name="username" class="form-control" id="yourUsername">
									<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-12 mt-2">
									<label for="yourPassword" class="form-label">Password</label>
									<input type="password" name="password" class="form-control" id="yourPassword">
									<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-12 mt-3">
									<button class="btn btn-primary w-100" type="submit">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>
<script src="<?= base_url('asset/adminkit/examples/') ?>js/vendor.js"></script>
<script src="<?= base_url('asset/adminkit/examples/') ?>js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 3000)
</script>