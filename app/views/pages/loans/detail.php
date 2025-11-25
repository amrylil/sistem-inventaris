<!-- HEADER -->
<div class="d-flex align-items-center justify-content-between mb-4">
    <h3 class="fw-bold text-dark">Detail Peminjaman</h3>
    <a href="/loan" class="btn btn-light border"><i class="bi bi-arrow-left me-2"></i> Kembali</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-saas border-0 shadow-sm rounded-4 p-4 bg-white">

            <div class="text-center border-bottom pb-3 mb-3">
                <h5 class="fw-bold text-uppercase ls-1 mb-1">Bukti Peminjaman</h5>
                <small class="text-muted font-monospace">ID: <?php echo $loan->id?></small>
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <small class="text-muted d-block text-uppercase small">Peminjam</small>
                    <span class="fw-bold"><?php echo $loan->nama_lengkap?></span>
                </div>
                <div class="col-6 text-end">
                    <small class="text-muted d-block text-uppercase small">Tanggal</small>
                    <span class="fw-bold"><?php echo date('d M Y', strtotime($loan->tanggal_pinjam))?></span>
                </div>
            </div>

            <div class="table-responsive mb-4">
                <table class="table table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th class="text-center">Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                        <tr>
                            <td class="font-monospace small"><?php echo $item->kode_barang?></td>
                            <td><?php echo $item->nama_barang?></td>
                            <td class="text-center fw-bold"><?php echo $item->qty?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-6">
                    <small class="text-muted d-block text-uppercase small">Status</small>
                    <?php if ($loan->status == 'dipinjam'): ?>
                        <span class="badge bg-warning text-dark">BELUM DIKEMBALIKAN</span>
                    <?php else: ?>
                        <span class="badge bg-success">SUDAH DIKEMBALIKAN</span>
                        <div class="small text-muted mt-1">Tgl: <?php echo date('d M Y', strtotime($loan->tanggal_kembali))?></div>
                    <?php endif; ?>
                </div>
                <div class="col-6 text-end">
                    <small class="text-muted d-block text-uppercase small">Catatan</small>
                    <span class="fst-italic"><?php echo $loan->catatan ?: '-'?></span>
                </div>
            </div>

        </div>
    </div>
</div>