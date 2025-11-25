<style>
    .card-saas { border: none; border-radius: 16px; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .badge-soft-warning { background: #fffbeb; color: #b45309; }
    .badge-soft-success { background: #d1fae5; color: #047857; }
    .badge-soft-danger { background: #fee2e2; color: #b91c1c; }
</style>

<!-- HEADER -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-5">
    <div class="mb-3 mb-md-0">
        <h3 class="fw-bold text-dark mb-1">Transaksi Peminjaman</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-muted text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active">Peminjaman</li>
            </ol>
        </nav>
    </div>

    <?php if ($role === 'admin'): ?>
    <a href="/loan/create" class="btn btn-primary px-4 py-2 rounded-3 fw-bold shadow-sm" style="background-color: #4f46e5; border: none;">
        <i class="bi bi-plus-lg me-2"></i> Pinjamkan Barang
    </a>
    <?php endif; ?>
</div>

<!-- TABLE -->
<div class="card card-saas overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4 py-3">Tanggal</th>
                    <th>Peminjam</th>
                    <th>Status</th>
                    <th>Catatan</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($loans)): ?>
                    <tr><td colspan="5" class="text-center py-5 text-muted">Belum ada riwayat peminjaman.</td></tr>
                <?php else: ?>
                    <?php foreach ($loans as $row): ?>
                    <tr>
                        <td class="ps-4 font-monospace"><?php echo date('d M Y', strtotime($row->tanggal_pinjam))?></td>
                        <td class="fw-bold text-dark"><?php echo htmlspecialchars($row->peminjam)?></td>
                        <td>
                            <?php if ($row->status == 'dipinjam'): ?>
                                <span class="badge badge-soft-warning rounded-pill px-3">Dipinjam</span>
                            <?php elseif ($row->status == 'dikembalikan'): ?>
                                <span class="badge badge-soft-success rounded-pill px-3">Selesai</span>
                            <?php else: ?>
                                <span class="badge badge-soft-danger rounded-pill px-3">Hilang</span>
                            <?php endif; ?>
                        </td>
                        <td class="small text-muted text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($row->catatan)?></td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border shadow-sm" type="button" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                <ul class="dropdown-menu border-0 shadow">
                                    <li>
                                        <a class="dropdown-item" href="/loan/show/<?php echo $row->id?>">
                                            <i class="bi bi-eye me-2 text-info"></i> Detail Barang
                                        </a>
                                    </li>

                                    <!-- Menu khusus Admin & Jika status masih dipinjam -->
                                    <?php if ($role === 'admin' && $row->status == 'dipinjam'): ?>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item text-success" href="/loan/return/<?php echo $row->id?>" onclick="return confirm('Barang sudah dikembalikan dan stok akan bertambah?')">
                                                <i class="bi bi-check-circle me-2"></i> Tandai Kembali
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>