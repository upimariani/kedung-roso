<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(<?= base_url('asset/pato-master/') ?>images/bg-title-page-03.jpg);">
	<h2 class="tit6 t-center">
		Chatting
	</h2>
</section>


<!-- Content page -->
<section>
	<div class="bread-crumb bo5-b p-t-17 p-b-17">
		<div class="container">
			<a href="<?= base_url('pelanggan/chome') ?>" class="txt27">
				Home
			</a>


			<span class="txt29 m-l-10 m-r-10">/</span>

			<span class="txt29">
				Chatting
			</span>
		</div>
	</div>

	<div class="container">
		<div class="row ">
			<div class="col-md-8 col-lg-9">
				<div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
					<!-- Block4 -->
					<div class="blo4 p-b-63">
						<!-- - -->
						<div class="pic-blo4  bo-rad-10 pos-relative">
							<h3>Chatting</h3>

						</div>
						<!-- - -->
						<?php
						foreach ($pesan as $key => $value) {
							if ($value->pelanggan_send != '0') {
						?>
								<div class="text-blo4 p-t-33">
									<p class="text-right">
										<a href="blog-detail.html"><strong><?= $value->nama_plggn ?></strong></a><br>
										Time : <?= $value->time ?>
									</p>
									<p class="text-right">
										<?= $value->pelanggan_send ?>
									</p>
								</div>
								<hr>
							<?php
							} else if ($value->admin_send != '0') {
							?>
								<div class="text-blo4 p-t-33">
									<p>
										<a href="blog-detail.html"><strong>Admin</strong></a><br>
										Time : <?= $value->time ?>
									</p>
									<p>
										<?= $value->admin_send ?>
									</p>
								</div>
							<?php
							}
							?>


						<?php
						}
						?>
					</div>
					<!-- Leave a comment -->
					<form action="<?= base_url('pelanggan/cchatting') ?>" method="POST" class="leave-comment p-t-10">
						<h4 class="txt33 p-b-14">
							Leave a Comment
						</h4>

						<p>
							Your chatting will not be published. Required fields are marked *
						</p>
						<?= form_error('pesan', '<small class="form-text text-danger">', '</small>'); ?>
						<textarea class="bo-rad-10 size29 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-10" name="pesan" placeholder="Write your reply..."></textarea>


						<!-- Button3 -->
						<button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4">
							Send
						</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</section>