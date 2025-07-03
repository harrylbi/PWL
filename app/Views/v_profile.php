<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>History Transaksi Pembelian <strong><?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?></strong></h2>
<hr>
<div class="table-responsive">
    <table class="table datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Pembelian</th>
                <th>Waktu Pembelian</th>
                <th>Total Bayar</th>
                <th>Ongkir</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($buy)) : ?>
                <?php foreach ($buy as $index => $item) : ?>
                    <tr>
                        <th><?= $index + 1 ?></th>
                        <td><?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($item['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= number_to_currency($item['total_harga'], 'IDR') ?></td>
                        <td><?= number_to_currency($item['ongkir'], 'IDR') ?></td>
                        <td><?= htmlspecialchars($item['alamat'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= $item['status'] == "1" ? "Sudah Selesai" : "Belum Selesai" ?></td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal-<?= $item['id'] ?>">
                                Detail
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data transaksi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Detail -->
<?php if (!empty($buy)) : ?>
    <?php foreach ($buy as $item) : ?>
        <div class="modal fade" id="detailModal-<?= $item['id'] ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Transaksi #<?= $item['id'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php if (!empty($product[$item['id']])) : ?>
                            <?php foreach ($product[$item['id']] as $index2 => $item2) : ?>
                                <?php
                                    $harga = (int)$item2['harga'];
                                    $jumlah = (int)$item2['jumlah'];
                                    $subtotal = $harga * $jumlah;
                                ?>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-2">
                                        <?php if (!empty($item2['foto']) && file_exists("img/" . $item2['foto'])) : ?>
                                            <img src="<?= base_url("img/" . $item2['foto']) ?>" class="img-thumbnail" width="100">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-10">
                                        <p class="mb-1"><strong><?= $index2 + 1 ?>. <?= htmlspecialchars($item2['nama'], ENT_QUOTES, 'UTF-8') ?></strong></p>
                                        <p class="mb-0 small">(<?= $jumlah ?> pcs)</p>
                                        <p class="mb-0 small">Subtotal: <?= number_to_currency($subtotal, 'IDR') ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span>Ongkir</span>
                                <strong><?= number_to_currency($item['ongkir'], 'IDR') ?></strong>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span>Total Transaksi</span>
                                <strong><?= number_to_currency($item['total_harga'], 'IDR') ?></strong>
                            </div>
                        <?php else : ?>
                            <p class="text-muted">Detail produk tidak tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?= $this->endSection() ?>
