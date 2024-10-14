<main class="flex-grow-1">
	<div class="container py-3">
		<?php $this->load->view('templates/alert') ?>

		<?= form_open(uri_string(), array('class' => 'card shadow')) ?>
			<div class="align-items-center card-header d-flex">
				<h5 class="mb-0 me-auto">
					<i class="bi bi-plus-lg"></i>
					Tambah data produk
				</h5>
				<a class="btn btn-secondary btn-sm shadow" href="<?= base_url() ?>">
					<i class="bi bi-arrow-left"></i>
					<span class="d-none d-sm-inline">Kembali</span>
				</a>
			</div>
			<div class="card-body">
				<div class="gx-3 mb-3 row">
					<label class="col-md-4 col-lg-3 col-form-label d-md-flex" for="name">
						Nama produk<b class="text-danger">*</b>
						<span class="d-none d-md-block fw-medium ms-auto">:</span>
					</label>
					<div class="col-md-8 col-lg-9">
						<input autofocus="autofocus" class="form-control <?= form_error('name') === '' ? '' : 'is-invalid' ?>" id="name" name="name" placeholder="Masukkan nama produk" type="text" value="<?= html_escape(set_value('name')) ?>" />
						<?= form_error('name', '<div class="invalid-feedback">', '</div>') ?>
					</div>
				</div>
				<div class="gx-3 mb-3 row">
					<label class="col-md-4 col-lg-3 col-form-label d-md-flex" for="quantity">
						Jumlah produk<b class="text-danger">*</b>
						<span class="d-none d-md-block fw-medium ms-auto">:</span>
					</label>
					<div class="col-md-8 col-lg-9">
						<div class="has-validation input-group">
							<input class="form-control <?= form_error('quantity') === '' ? '' : 'is-invalid' ?>" id="quantity" inputmode="numeric" name="quantity" oninput="numberFormat();" placeholder="Masukkan jumlah produk" type="text" value="<?= html_escape(set_value('quantity')) ?>" />
							<span class="input-group-text">pcs</span>
							<?= form_error('quantity', '<div class="invalid-feedback">', '</div>') ?>
						</div>
					</div>
				</div>
				<div class="gx-3 row">
					<label class="col-md-4 col-lg-3 col-form-label d-md-flex" for="price">
						Harga produk<b class="text-danger">*</b>
						<span class="d-none d-md-block fw-medium ms-auto">:</span>
					</label>
					<div class="col-md-8 col-lg-9">
						<div class="has-validation input-group">
							<span class="input-group-text">Rp</span>
							<input class="form-control <?= form_error('price') === '' ? '' : 'is-invalid' ?>" id="price" inputmode="numeric" name="price" oninput="numberFormat();" placeholder="Masukkan harga produk" type="text" value="<?= html_escape(set_value('price')) ?>" />
							<?= form_error('price', '<div class="invalid-feedback">', '</div>') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary shadow" type="submit">
					<i class="bi bi-plus-lg"></i>
					Tambah
				</button>
				<button class="btn btn-secondary shadow" type="reset">
					<i class="bi bi-x-lg"></i>
					Reset
				</button>
			</div>
		<?= form_close() ?>
	</div>
</main>