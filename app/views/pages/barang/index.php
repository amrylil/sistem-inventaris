<style>
    /* --- CSS UNIFIED --- */
    .card-saas {
        border: none;
        border-radius: 16px;
        background-color: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .product-img {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        object-fit: cover;
        background-color: #f1f5f9;
    }
    .badge-soft-success { background-color: #d1fae5; color: #065f46; }
    .badge-soft-warning { background-color: #fef3c7; color: #92400e; }
    .badge-soft-danger  { background-color: #fee2e2; color: #b91c1c; }
    .badge-soft-primary { background-color: #dbeafe; color: #1e40af; }

    /* DataTables Styling */
    table.dataTable.no-footer { border-bottom: none !important; }
    .table-custom thead th {
        background-color: #f9fafb;
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        padding: 1.2rem 1rem;
        border-bottom: 1px solid #e5e7eb !important;
        border-top: none !important;
    }
    .table-custom tbody td {
        padding: 1.2rem 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #f3f4f6;
        font-size: 0.95rem;
        color: #374151;
    }
    .table-custom tbody tr:hover { background-color: #f9fafb; }

    /* Pagination */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 8px !important;
        border: 1px solid #e5e7eb !important;
        background: white !important;
        color: #374151 !important;
        margin: 0 4px;
        padding: 6px 14px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #4f46e5 !important;
        color: white !important;
        border-color: #4f46e5 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #eef2ff !important;
        color: #4f46e5 !important;
        border-color: #4f46e5 !important;
    }
</style>

<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-5">
    <div class="mb-3 mb-md-0">
        <h3 class="fw-bold text-dark mb-1">Manajemen Aset</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
            </ol>
        </nav>
    </div>

    <?php if ($_SESSION['user_role'] == 'admin'): ?>
    <a href="/barang/create" class="btn btn-primary px-4 py-2 rounded-3 fw-bold shadow-sm" style="background-color: #4f46e5; border: none;">
        <i class="bi bi-plus-lg me-2"></i> Tambah Barang
    </a>
    <?php endif; ?>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-6">
        <div class="card card-saas p-4 h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted text-uppercase fw-bold mb-1 small ls-1">Total Aset</p>
                    <h3 class="mb-0 fw-bold text-dark"><?php echo number_format($stats['total_item'])?> <span class="fs-6 text-muted fw-normal">Unit</span></h3>
                </div>
                <div class="rounded-circle bg-indigo-soft p-3 text-primary" style="background-color: #eef2ff;">
                    <i class="bi bi-box-seam fs-3" style="color: #4f46e5;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-saas p-4 h-100 border-start border-4 border-danger">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-danger text-uppercase fw-bold mb-1 small ls-1">Stok Kritis (< 5)</p>
                    <h3 class="mb-0 fw-bold text-danger"><?php echo $stats['stok_kritis']?> <span class="fs-6 text-danger fw-normal">Item</span></h3>
                </div>
                <div class="rounded-circle bg-danger-soft p-3 text-danger" style="background-color: #fef2f2;">
                    <i class="bi bi-exclamation-triangle fs-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-saas overflow-hidden">

    <div class="card-header bg-white border-bottom py-4 px-4">
        <div class="row g-3 align-items-center">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 ps-3 text-muted"><i class="bi bi-search"></i></span>
                    <input type="text" id="customSearch" class="form-control border-start-0 ps-2 bg-white" placeholder="Cari nama barang atau kode...">
                </div>
            </div>
            <div class="col-md-3">
                <select id="categoryFilter" class="form-select text-muted">
                    <option value="">Semua Kategori</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Alat Tulis">Alat Tulis</option>
                </select>
            </div>
            <div class="col-md-4 text-md-end">
                <button class="btn btn-light border fw-medium text-muted shadow-sm"><i class="bi bi-printer me-2"></i> Cetak Data</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="tableBarang" class="table table-custom align-middle mb-0 w-100">
            <thead>
                <tr>
                    <th class="ps-4" style="width: 50px;">No</th>
                    <th>Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Kondisi</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($barang)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-state-2130362-1800926.png" alt="Empty" style="width: 120px; opacity: 0.6;">
                            <p class="mt-3 mb-0">Belum ada data barang.</p>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1;foreach ($barang as $item): ?>
                    <tr>
                        <td class="ps-4 fw-bold text-muted"><?php echo $no++?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($item->nama_barang)?>&background=random&color=fff&size=128" class="product-img me-3 shadow-sm" alt="Produk">
                                <div>
                                    <div class="fw-bold text-dark"><?php echo htmlspecialchars($item->nama_barang)?></div>
                                    <small class="text-muted font-monospace bg-light px-2 py-0 rounded border">
                                        <?php echo htmlspecialchars($item->kode_barang)?>
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-soft-primary rounded-pill px-3 py-2">
                                <?php echo htmlspecialchars($item->nama_kategori ?? 'Umum')?>
                            </span>
                        </td>
                        <td>
                            <?php if ($item->stok <= 0): ?>
                                <span class="badge bg-secondary">Habis</span>
                            <?php elseif ($item->stok <= 5): ?>
                                <span class="text-danger fw-bold"><i class="bi bi-exclamation-circle-fill me-1"></i> <?php echo $item->stok?> Unit</span>
                            <?php else: ?>
                                <span class="text-success fw-bold"><?php echo $item->stok?> Unit</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php
                                $badgeClass = 'badge-soft-success';
                                if ($item->kondisi == 'Rusak Ringan') {
                                    $badgeClass = 'badge-soft-warning';
                                }

                                if ($item->kondisi == 'Rusak Berat' || $item->kondisi == 'Rusak') {
                                    $badgeClass = 'badge-soft-danger';
                                }

                            ?>
                            <span class="badge <?php echo $badgeClass?> px-3 py-1">
                                <?php echo htmlspecialchars($item->kondisi)?>
                            </span>
                        </td>
                        <td class="text-end pe-4">

                            <?php if ($_SESSION['user_role'] == 'admin'): ?>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border shadow-sm" type="button" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                    <ul class="dropdown-menu border-0 shadow">
                                        <li><a class="dropdown-item" href="/barang/edit/<?php echo $item->id?>"><i class="bi bi-pencil me-2 text-warning"></i> Edit</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="/barang/delete/<?php echo $item->id?>" onclick="return confirm('Hapus barang ini?')">
                                                <i class="bi bi-trash me-2"></i> Hapus
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <?php if ($item->stok > 0): ?>
                                    <a href="/loan/request/<?php echo $item->id?>" class="btn btn-sm btn-primary px-3 rounded-3 fw-bold shadow-sm" style="background-color: #4f46e5; border: none;">Pinjam</a>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-light border text-muted px-3 rounded-3" disabled>Habis</button>
                                <?php endif; ?>
                            <?php endif; ?>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="card-footer bg-white border-top-0 py-3 px-4"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.querySelectorAll('#tableBarang tbody tr td').length > 1) {
            var table = $('#tableBarang').DataTable({
                "dom": 'rt<"d-flex justify-content-between align-items-center px-4 py-3"ip>',
                "pageLength": 5,
                "ordering": true,
                "autoWidth": false,
                "language": {
                    "info": "Menampilkan <span class='fw-bold'>_START_</span> - <span class='fw-bold'>_END_</span> dari <span class='fw-bold'>_TOTAL_</span> data",
                    "paginate": { "next": "<i class='bi bi-chevron-right'></i>", "previous": "<i class='bi bi-chevron-left'></i>" },
                    "emptyTable": "Tidak ada data barang."
                },
                "columnDefs": [ { "orderable": false, "targets": [5] } ]
            });

            $('#customSearch').on('keyup', function() { table.search(this.value).draw(); });
            $('#categoryFilter').on('change', function() { table.column(2).search(this.value).draw(); });
        }
    });
</script>