<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Perbaharui Produk</h1>

		<div class="row">
			<div class="col-12 col-xl-8">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Produk</h5>
					</div>
					<div class="card-body">
						<?php echo form_open_multipart('admin/cproduk/update/' . $produk->id_produk); ?>
						<div class="form-group">
							<label class="form-label">Nama Produk</label>
							<input type="text" name="nama" value="<?= $produk->nama_produk ?>" class="form-control" placeholder="Masukkan Nama Produk">
							<?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label class="form-label">Harga Produk</label>
							<input type="number" name="harga" value="<?= $produk->harga ?>" class="form-control" placeholder="Masukkan Harga Produk">
							<?= form_error('harga', '<small class="form-text text-danger">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label class="form-label">Deskripsi</label>
							<input id="x" name="deskripsi" type="hidden" name="content">
							<trix-editor input="x"><?= $produk->deskripsi ?></trix-editor>
							<?= form_error('deskripsi', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label class="form-label w-100">Foto Produk</label>
							<img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $produk->foto) ?>"><br>
							<input type="file" name="gambar">
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="<?= base_url('admin/cproduk') ?>">Kembali</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>