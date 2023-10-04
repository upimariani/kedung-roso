<!-- Slide1 -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1 item1-slick1" style="background-image: url(<?= base_url('asset/foto3.jpg') ?>);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-150">
					<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
						Selamat Datang di
					</span>

					<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
						RUMAH MAKAN KEDUNG ROSO
					</h2>
					<div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
						<!-- Button1 -->

					</div>
					<div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">

					</div>
				</div>
			</div>

			<div class="item-slick1 item2-slick1" style="background-image: url(<?= base_url('asset/foto3.jpg') ?>);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
						Selamat Datang di
					</span>

					<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
						MENERIMA PESAN ANTAR UNTUK WILAYAH KABUPATEN BREBES
					</h2>
					<div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
						<!-- Button1 -->

					</div>
					<div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">

					</div>
				</div>
			</div>

			<div class="item-slick1 item3-slick1" style="background-image: url(<?= base_url('asset/foto3.jpg') ?>);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
						Selamat Datang di
					</span>

					<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
						RUMAH MAKAN KEDUNG ROSO
					</h2>
					<div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
						<!-- Button1 -->

					</div>
					<div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">

					</div>
				</div>
			</div>

		</div>

		<div class="wrap-slick1-dots"></div>
	</div>
</section>

<!-- Welcome -->
<section class="section-welcome bg1-pattern p-t-120 p-b-105">
	<div class="container">
		<div class="row">
			<div class="col-md-6 p-t-45 p-b-30">
				<div class="wrap-text-welcome t-center">
					<span class="tit2 t-center">
						Rumah Makan
					</span>

					<h3 class="tit3 t-center m-b-35 m-t-5">
						KEDUNG ROSO
					</h3>

					<p class="t-center m-b-22 size3 m-l-r-auto">
						"Makanan adalah segalanya bagi kita. Ini merupakan perpanjangan dari perasaan nasionalis, perasaan etnis, sejarah pribadimu, provinsimu, daerahmu, sukumu, nenekmu. Itu tidak dapat dipisahkan sejak awal." - Anthony Bourdain</p>

					<a href="about.html" class="txt4">
						Our Story
						<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
					</a>
				</div>
			</div>

			<div class="col-md-6 p-b-30">
				<div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
					<img src="<?= base_url('asset/foto2.jpg') ?>" alt="IMG-OUR">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Intro -->
<section class="section-intro">
	<div class="header-intro parallax100 t-center p-t-135 p-b-158" style="background-image: url(<?= base_url('asset/foto2.jpg') ?>);">
		<span class="tit2 p-l-15 p-r-15">
			MENU MAKANAN
		</span>

		<h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
			RUMAH MAKAN KEDUNG ROSO
		</h3>
	</div>

	<div class="content-intro bg-white p-t-77 p-b-133">
		<div class="container">
			<div class="row">

				<?php
				foreach ($menu as $key => $value) {
				?>

					<div class="col-md-4 p-t-30">
						<?php
						if ($this->session->userdata('id') != '') {
						?>
							<form action="<?= base_url('pelanggan/chome/cart') ?>" method="POST">
								<input type="hidden" name="id" value="<?= $value->id_produk ?>">
								<input type="hidden" name="name" value="<?= $value->nama_produk ?>">

								<input type="hidden" name="qty" value="1">
								<input type="hidden" name="picture" value="<?= $value->foto ?>">
								<!-- Block1 -->
								<div class="blo1">
									<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
										<a href="#"><img style="width: 350px; height: 350px;" src="<?= base_url('asset/foto-produk/' . $value->foto) ?>" alt="IMG-INTRO"></a>
									</div>

									<div class="wrap-text-blo1 p-t-35">

										<h4 class="txt5 color0-hov trans-0-4 m-b-10">
											<?= $value->nama_produk ?>
										</h4>
										<?php
										if ($value->diskon != NULL) {
										?>
											<small class="badge badge-success"><?= $value->nama_promo ?> <?= $value->diskon ?>%</small>
										<?php
										}
										?>

										<p><?= $value->deskripsi ?></p><br>

										<h5>Rp. <?= number_format($value->harga - (($value->diskon / 100) * $value->harga), 0)  ?>
											<?php
											if ($value->diskon != NULL) {
											?>
												<del>Rp. <?= number_format($value->harga, 0)  ?></del>
											<?php
											}
											?>
										</h5>

										<input type="hidden" name="price" value="<?= $value->harga - (($value->diskon / 100)  * $value->harga) ?>">


										<br>
										<div class="row">
											<div class="col-lg-6"><?php
																	if ($this->session->userdata('id') != ' ') {
																	?>
													<button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4" ?>Add To Cart</button>

												<?php
																	}
												?>
											</div>
											<div class="col-lg-6">
												<a href="<?= base_url('Pelanggan/cHome/detail_produk/' . $value->id_produk) ?>" class="btn3 flex-c-m size18 txt11 trans-0-4" ?>Detail Produk</a>
											</div>
										</div>

									</div>
								</div>
							</form>
						<?php
						} else {
						?>
							<form action="<?= base_url('pelanggan/cLogin') ?>">
								<!-- Block1 -->
								<div class="blo1">
									<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
										<a href="#"><img style="width: 350px; height: 350px;" src="<?= base_url('asset/foto-produk/' . $value->foto) ?>" alt="IMG-INTRO"></a>
									</div>
									<div class="wrap-text-blo1 p-t-35">
										<h4 class="txt5 color0-hov trans-0-4 m-b-10">
											<?= $value->nama_produk ?>
										</h4>
										<p><?= $value->deskripsi ?></p><br>
										<h5>Rp. <?= number_format($value->harga, 0)  ?></h5>
										<br>
										<button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4" ?>Add To Cart</button>
									</div>
								</div>
							</form>
						<?php
						}
						?>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</section>