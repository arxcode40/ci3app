<main class="flex-grow-1">
	<div class="container py-3">
		<?php $this->load->view('templates/alert') ?>

		<div class="card shadow">
			<div class="align-items-center card-header d-flex">
				<h5 class="mb-0 me-auto">
					<i class="bi bi-table"></i>
					Tabel produk
				</h5>
				<a class="btn btn-primary btn-sm shadow" href="<?= base_url('tambah') ?>">
					<i class="bi bi-plus-lg"></i>
					<span class="d-none d-sm-inline">Tambah</span>
				</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="align-middle mb-0 table table-hover w-100">
						<thead>
							<tr class="align-middle">
								<th scope="col">#</th>
								<th scope="col">Nama</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Harga</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody class="table-group-divider">
							<?php if ( ! $products): ?>
								<tr>
									<td class="text-center" colspan="5">Tidak ada data produk yang tersedia</td>
								</tr>
							<?php endif ?>

							<?php foreach ($products as $index => $product): ?>
								<tr class="align-middle">
									<th scope="row"><?= $index + 1 ?></th>
									<td><?= html_escape($product['name']) ?></td>
									<td><?= html_escape(number_format($product['quantity'], 0, ',', '.')) ?> pcs</td>
									<td>Rp <?= html_escape(number_format($product['price'], 0, ',', '.')) ?></td>
									<td class="text-nowrap">
										<a class="btn btn-primary btn-sm shadow" href="<?= base_url(array('ubah', html_escape($product['id']))) ?>">
											<i class="bi bi-pencil-square"></i>
											<span class="d-none d-sm-inline">Ubah</span>
										</a>
										<a class="btn btn-danger btn-sm shadow" href="<?= base_url(array('hapus', html_escape($product['id']))) ?>">
											<i class="bi bi-trash-fill"></i>
											<span class="d-none d-sm-inline">Hapus</span>
										</a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>