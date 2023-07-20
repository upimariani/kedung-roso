<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(<?= base_url('asset/pato-master/') ?>images/bg-title-page-02.jpg);">
	<h2 class="tit6 t-center">
		Checkout
	</h2>
</section>


<!-- Reservation -->
<section class="section-reservation bg1-pattern p-t-100 p-b-113">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="t-center">
					<span class="tit2 t-center">
						SISI JALAN KOPI
					</span>

					<h3 class="tit3 t-center m-b-35 m-t-2">
						Pilih Pengiriman
					</h3>
				</div>
			</div>

			<div class="col-lg-8 p-b-30">
				<form action="<?= base_url('Pelanggan/cHome/checkout') ?>" method="POST">
					<?php
					$i = 1;
					foreach ($this->cart->contents() as $items) {
						echo form_hidden('qty' . $i++, $items['qty']);
					}
					?>
					<div class="row">
						<div class="col-md-6">
							<!-- Name -->
							<span class="txt9">
								Atas Nama
							</span>
							<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" value="<?= $pelanggan->nama_plggn ?>" type="text" placeholder="Name" readonly>
							</div>
						</div>

						<div class="col-md-6">
							<!-- Name -->
							<span class="txt9">
								No Telepon
							</span>
							<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" value="<?= $pelanggan->no_hp ?>" type="text" placeholder="Name" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<!-- Name -->
							<span class="txt9">
								Kecamatan
							</span>
							<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<select id="ongkir" name="kecamatan" class="bo-rad-10 sizefull txt10 p-l-20">
									<option value="">---Pilih Kecamatan---</option>
									<option data-vongkir="Rp. <?= number_format(12000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 12000) ?>" data-total="<?= $this->cart->total() +  12000 ?>" data-ongkir="12000" value="Ciawigebang">Brebes</option>
									<option data-vongkir="Rp. <?= number_format(20000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 20000) ?>" data-total="<?= $this->cart->total() +  20000 ?>" data-ongkir="20000" value="Cibeureum">Wanasari</option>
									<option data-vongkir="Rp. <?= number_format(22000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 22000) ?>" data-total="<?= $this->cart->total() +  22000 ?>" data-ongkir="22000" value="Cibingbin">Bulakamba</option>
									<option data-vongkir="Rp. <?= number_format(21000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 21000) ?>" data-total="<?= $this->cart->total() +  21000 ?>" data-ongkir="21000" value="Cidahu">Tanjung</option>
									<option data-vongkir="Rp. <?= number_format(23000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 23000) ?>" data-total="<?= $this->cart->total() +  23000 ?>" data-ongkir="23000" value="Cigandamekar">Losari</option>
									<option data-vongkir="Rp. <?= number_format(25000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 25000) ?>" data-total="<?= $this->cart->total() +  25000 ?>" data-ongkir="25000" value="Cilebak">Banjarharjo</option>
									<option data-vongkir="Rp. <?= number_format(19000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 19000) ?>" data-total="<?= $this->cart->total() +  19000 ?>" data-ongkir="19000" value="Cilimus">Kersana</option>
									<option data-vongkir="Rp. <?= number_format(26000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 26000) ?>" data-total="<?= $this->cart->total() +  26000 ?>" data-ongkir="26000" value="Cimahi">Ketanggungan</option>
									<option data-vongkir="Rp. <?= number_format(27000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 27000) ?>" data-total="<?= $this->cart->total() +  27000 ?>" data-ongkir="27000" value="Ciniru">Larangan</option>
									<option data-vongkir="Rp. <?= number_format(17000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 17000) ?>" data-total="<?= $this->cart->total() +  17000 ?>" data-ongkir="17000" value="Cipicung">Jatibarang</option>
									<option data-vongkir="Rp. <?= number_format(17000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 17000) ?>" data-total="<?= $this->cart->total() +  17000 ?>" data-ongkir="17000" value="Cipicung">Songgom</option>
									<option data-vongkir="Rp. <?= number_format(17000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 17000) ?>" data-total="<?= $this->cart->total() +  17000 ?>" data-ongkir="17000" value="Cipicung">Tonjong</option>
									<option data-vongkir="Rp. <?= number_format(17000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 17000) ?>" data-total="<?= $this->cart->total() +  17000 ?>" data-ongkir="17000" value="Cipicung">Sirampog</option>
									<option data-vongkir="Rp. <?= number_format(17000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 17000) ?>" data-total="<?= $this->cart->total() +  17000 ?>" data-ongkir="17000" value="Cipicung">Bumiayu</option>
									<option data-vongkir="Rp. <?= number_format(17000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 17000) ?>" data-total="<?= $this->cart->total() +  17000 ?>" data-ongkir="17000" value="Cipicung">Paguyangan</option>
									<option data-vongkir="Rp. <?= number_format(17000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 17000) ?>" data-total="<?= $this->cart->total() +  17000 ?>" data-ongkir="17000" value="Cipicung">Bantarkawung</option>
									<option data-vongkir="Rp. <?= number_format(17000) ?>" data-vtotal="Rp. <?= number_format($this->cart->total() + 17000) ?>" data-total="<?= $this->cart->total() +  17000 ?>" data-ongkir="17000" value="Cipicung">Salem</option>

								</select>
								<?= form_error('kecamatan', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<!-- Name -->
							<span class="txt9">
								Alamat Detail
							</span>
							<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" value="<?= $pelanggan->alamat ?>" name="alamat_detail" type="text" placeholder="Name">
							</div>
						</div>
					</div>
					<div class="wrap-btn-booking flex-c-m m-t-6">
						<!-- Button3 -->
						<div class="row">

							<input class="ongkir" name="ongkir" hidden>
							<input class="total" name="total" hidden>
							<div class="col-lg-6">
								<button type="submit" class="btn3 flex-c-m size13 txt11">
									Checkout
								</button>
							</div>


						</div>


					</div>
				</form>
			</div>


			<div class="col-lg-4">
				<table class="table table-striped">
					<tr>
						<th>Cart</th>
						<th>&nbsp;</th>
					</tr>
					<tr>
						<td>Subtotal</td>
						<td>
							<h5>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h5>
						</td>
					</tr>
					<tr>
						<td>Ongkos Kirim</td>
						<td>
							<h5 class="vongkir"></h5>
						</td>
					</tr>
					<tr>
						<td>Total Transaksi</td>
						<td>
							<h5 class="vtotal"></h5>
						</td>
					</tr>
				</table>
			</div>
		</div>

</section>
<!-- Modal -->