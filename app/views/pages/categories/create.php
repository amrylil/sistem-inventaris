<!-- Header & Breadcrumb -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
    <div class="mb-3 mb-md-0">
        <h3 class="fw-bold text-dark mb-1">Tambah Kategori</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/category" class="text-decoration-none text-muted">Master Kategori</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
    </div>
    <a href="/category" class="btn btn-secondary rounded-3 fw-medium shadow-sm border-0">
        <i class="bi bi-arrow-left me-2"></i> Kembali
    </a>
</div>

<!-- Form Card -->
<div class="row justify-content-center">
    <div class="">
        <div class="card card-saas border-0 shadow-sm rounded-4 p-4">

            <!-- Icon Header -->
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3">
                    <i class="bi bi-folder-plus fs-4"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-0">Form Kategori Baru</h5>
                    <small class="text-muted">Masukkan detail kategori barang baru.</small>
                </div>
            </div>

            <form action="/category/store" method="POST">

                <div class="mb-3">
                    <label class="form-label fw-bold text-muted small text-uppercase ls-1">Nama Kategori <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-tag"></i></span>
                        <input type="text" name="nama_kategori" class="form-control bg-light border-start-0" placeholder="Contoh: Elektronik" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-muted small text-uppercase ls-1">Lokasi Rak</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" name="lokasi_rak" class="form-control bg-light border-start-0" placeholder="Contoh: Rak A-01">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-muted small text-uppercase ls-1">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control bg-light" rows="3" placeholder="Tambahkan keterangan (opsional)..."></textarea>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary py-2 rounded-3 fw-bold shadow-sm" style="background-color: #4f46e5; border: none;">
                        <i class="bi bi-save me-2"></i> Simpan Data
                    </button>
                    <a href="/category" class="btn btn-light text-muted py-2 rounded-3">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>
