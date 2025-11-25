<!-- app/views/pages/suppliers/index.php -->

<style>
    /* --- CSS UNIFIED (Sama dengan Barang & Kategori) --- */
    .card-saas {
        border: none;
        border-radius: 16px;
        background-color: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    /* Custom Table Styling */
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

    /* DataTables Pagination */
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

<!-- HEADER & BREADCRUMB -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-5">
    <div class="mb-3 mb-md-0">
        <h3 class="fw-bold text-dark mb-1">Data Supplier</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Supplier</li>
            </ol>
        </nav>
    </div>
    <a href="/supplier/create" class="btn btn-primary px-4 py-2 rounded-3 fw-bold shadow-sm" style="background-color: #4f46e5; border: none;">
        <i class="bi bi-plus-lg me-2"></i> Tambah Supplier
    </a>
</div>

<!-- KONTEN CARD -->
<div class="card card-saas overflow-hidden">

    <!-- TOOLBAR (Search & Actions) -->
    <div class="card-header bg-white border-bottom py-4 px-4">
        <div class="row g-3 align-items-center justify-content-between">

            <!-- Search Bar -->
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 ps-3 text-muted"><i class="bi bi-search"></i></span>
                    <input type="text" id="customSearch" class="form-control border-start-0 ps-2 bg-white" placeholder="Cari supplier, kontak, atau telepon...">
                </div>
            </div>

            <!-- Tombol Export -->
            <div class="col-md-4 text-md-end">
                <button class="btn btn-light border fw-medium text-muted shadow-sm"><i class="bi bi-download me-2"></i> Export CSV</button>
            </div>
        </div>
    </div>

    <!-- TABLE DATA -->
    <div class="table-responsive">
        <table id="tableSupplier" class="table table-custom align-middle mb-0 w-100">
            <thead>
                <tr>
                    <th class="ps-4" style="width: 50px;">No</th>
                    <th>Nama Perusahaan</th>
                    <th>Kontak Person</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($suppliers)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-box-4085812-3385481.png" alt="Empty" style="width: 120px; opacity: 0.6;">
                            <p class="mt-3 mb-0">Belum ada data supplier.</p>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1;foreach ($suppliers as $row): ?>
                    <tr>
                        <td class="ps-4 fw-bold text-muted"><?php echo $no++?></td>
                        <td>
                            <div class="fw-bold text-dark"><?php echo htmlspecialchars($row->nama_supplier)?></div>
                            <!-- Opsional: ID Supplier kecil di bawah nama -->
                            <small class="text-muted font-monospace" style="font-size: 0.7rem;">
                                <?php echo substr($row->id, 0, 8)?>...
                            </small>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="bi bi-person-fill small"></i>
                                </div>
                                <span class="fw-medium text-secondary"><?php echo htmlspecialchars($row->kontak_person ?? '-')?></span>
                            </div>
                        </td>
                        <td>
                            <?php if (! empty($row->telepon)): ?>
                                <span class="text-dark font-monospace"><i class="bi bi-telephone me-1 text-muted"></i><?php echo htmlspecialchars($row->telepon)?></span>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-muted small text-truncate" style="max-width: 200px;">
                            <i class="bi bi-geo-alt me-1"></i> <?php echo htmlspecialchars($row->alamat ?? '-')?>
                        </td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border shadow-sm" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu border-0 shadow">
                                    <li>
                                        <a class="dropdown-item" href="/supplier/edit/<?php echo $row->id?>">
                                            <i class="bi bi-pencil me-2 text-warning"></i> Edit
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="/supplier/delete/<?php echo $row->id?>" onclick="return confirm('Yakin ingin menghapus data supplier ini?')">
                                            <i class="bi bi-trash me-2"></i> Hapus
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer Pagination Place -->
    <div class="card-footer bg-white border-top-0 py-3 px-4"></div>
</div>

<!-- SCRIPT DATATABLES -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Inisialisasi jika tabel ada isinya
        if (document.querySelectorAll('#tableSupplier tbody tr td').length > 1) {
            var table = $('#tableSupplier').DataTable({
                "dom": 'rt<"d-flex justify-content-between align-items-center px-4 py-3"ip>',
                "pageLength": 5,
                "ordering": true,
                "autoWidth": false,
                "language": {
                    "info": "Menampilkan <span class='fw-bold'>_START_</span> - <span class='fw-bold'>_END_</span> dari <span class='fw-bold'>_TOTAL_</span> data",
                    "paginate": {
                        "next": "<i class='bi bi-chevron-right'></i>",
                        "previous": "<i class='bi bi-chevron-left'></i>"
                    },
                    "emptyTable": "Data supplier kosong"
                },
                "columnDefs": [
                    { "orderable": false, "targets": [5] } // Matikan sort kolom Aksi
                ]
            });

            // Hubungkan Custom Search
            $('#customSearch').on('keyup', function() {
                table.search(this.value).draw();
            });
        }
    });
</script>