<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(<?= base_url('asset/foto2.jpg') ?>);">
	<h2 class="tit6 t-center">
		Penilaian Produk
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
						Penilaian Produk
					</h3>
					<?php if ($this->session->userdata('success')) {
						echo '<div class="alert alert-success" role="alert">';
						echo $this->session->userdata('success');
						echo '</div>';
					} ?>
				</div>
			</div>
			<div class="col-lg-12 p-b-30">
				<table class="view_detail table table-striped">
					<thead>
						<th class="text-center">No</th>
						<th class="text-center">Gambar Produk</th>
						<th class="text-center">Nama Produk</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Penilaian</th>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($produk as $key => $value) {
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $value->foto) ?>"></td>
								<td><?= $value->nama_produk ?></td>
								<td><?= $value->qty ?></td>
								<td>
									<?php
									if ($value->komentar == NULL) {
									?>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $value->id_detail ?>">
											Penilaian Produk
										</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleModal<?= $value->id_detail ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Penilaian Produk <?= $value->nama_produk ?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form action="<?= base_url('pelanggan/cpesanansaya/komentar/' . $value->id_detail) ?>" method="POST">
														<div class="modal-body">
															<p>Masukkan Rating bintang anda sesuai penilaian anda...</p>
															<div id='rate-0'>
																<input type='hidden' name='rating' id='rating'>
																<?php echo "
                                                        <ul class='star' onMouseOut=\"resetRating('0')\">"; //untuk menampilan value dari bintang
																for ($i = 1; $i <= 5; $i++) {
																	if ($i <= 0) {
																		$selected = "selected";
																	} else {
																		$selected = "";
																	}
																	echo "<li class='select' class='$selected' onmouseover=\" highlightStar(this,0)\" onmouseout=\"removeHighlight(0);\" onClick=\"addRating(this,0)\">&#9733;</li>";
																}
																echo "<ul>
                                                    </div> "; ?>
																<textarea rows="3" name="ulasan" class="form-control" placeholder="Masukkan komentar anda..." required></textarea>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary">Kirim Penilaian</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									<?php
									} else {
									?>
										<span class="badge badge-success">Ulasan Berhasil Dikirim!</span><br>
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $value->id_ulasan ?>">
											Perbaharui Penilaian
										</button>
										<div class="modal fade" id="edit<?= $value->id_ulasan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Penilaian Produk <?= $value->nama_produk ?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form action="<?= base_url('pelanggan/cpesanansaya/perbaharui_ulasan/' . $value->id_ulasan) ?>" method="POST">
														<div class="modal-body">
															<p>Masukkan Rating bintang anda sesuai penilaian anda...</p>
															<div id='rate-0'>
																<input type='hidden' value="<?= $value->rating ?>" name='rating' id='rating'>
																<?php echo "
                                                        <ul class='star' onMouseOut=\"resetRating('0')\">"; //untuk menampilan value dari bintang
																for ($i = 1; $i <= 5; $i++) {
																	if ($i <= 0) {
																		$selected = "selected";
																	} else {
																		$selected = "";
																	}
																	echo "<li class='select' class='$selected' onmouseover=\" highlightStar(this,0)\" onmouseout=\"removeHighlight(0);\" onClick=\"addRating(this,0)\">&#9733;</li>";
																}
																echo "<ul>
                                                    </div> "; ?>
																<textarea rows="3" name="ulasan" class="form-control" placeholder="Masukkan komentar anda..." required><?= $value->komentar ?></textarea>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary">Kirim Penilaian</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									<?php
									}
									?>

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
</section>