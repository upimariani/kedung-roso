<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Chatting Pelanggan</h1>

		<div class="row">

			<div class="col-md-8 col-xl-9">
				<div class="card">
					<div class="card-header">

					</div>
					<div class="card-body h-100">
						<?php
						foreach ($chat as $key => $value) {
							if ($value->pelanggan_send != '0') {
						?>
								<div class="media">
									<div class="media-body">
										<small class="float-right text-navy"><?= $value->time ?></small>
										<strong><?= $value->nama_plggn ?></strong><br />

										<div class="border text-sm text-muted p-2 mt-1">
											<?= $value->pelanggan_send ?></div>

									</div>
								</div>
								<hr>
							<?php
							} else if ($value->admin_send != '0') {
							?>
								<div class="media">
									<div class="media-body">
										<small class="float-right text-navy"><?= $value->time ?></small>
										<strong>Admin</strong><br />

										<div class="border text-sm text-muted p-2 mt-1">
											<?= $value->admin_send ?></div>
									</div>
								</div>
								<hr>
							<?php
							}
							?>


						<?php
						}
						?>


						<form action="<?= base_url('Admin/cChatting/balasan/' . $id_pelanggan) ?>" method="POST">
							<textarea class="form-control mt-3" rows="5" name="balasan" placeholder="Tuliskan Balasan Anda..." required></textarea>
							<button type="submit" class="btn btn-primary btn-block mt-2">Kirim Balasan</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>