<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
    <div class="mb-3 mb-md-0">
        <h3 class="fw-bold text-dark mb-1">Edit Supplier</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/supplier" class="text-decoration-none text-muted">Data Supplier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <a href="/supplier" class="btn btn-secondary rounded-3 fw-medium shadow-sm border-0">
        <i class="bi bi-arrow-left me-2"></i> Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="">
        <div class="card card-saas border-0 shadow-sm rounded-4 p-4">

            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3 me-3">
                    <i class="bi bi-pencil-square fs-4"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-0">Update Data Supplier</h5>
                    <small class="text-muted">Perbarui informasi kontak dan alamat supplier.</small>
                </div>
            </div>

            <form action="/supplier/update/<?php echo $supplier->id ?>" method="POST">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase ls-1">Nama Supplier <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-building"></i></span>
                            <input type="text" name="nama_supplier" class="form-control bg-light border-start-0" value="<?php echo htmlspecialchars($supplier->nama_supplier) ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase ls-1">Kontak Person (PIC)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-person"></i></span>
                            <input type="text" name="kontak_person" class="form-control bg-light border-start-0" value="<?php echo htmlspecialchars($supplier->kontak_person) ?>">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-muted small text-uppercase ls-1">No. Telepon</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-telephone"></i></span>
                        <input type="text" name="telepon" class="form-control bg-light border-start-0" value="<?php echo htmlspecialchars($supplier->telepon) ?>">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-muted small text-uppercase ls-1">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control bg-light" rows="3"><?php echo htmlspecialchars($supplier->alamat) ?></textarea>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                    <a href="/supplier" class="btn btn-light text-muted me-md-2 px-4 rounded-3">Batal</a>
                    <button type="submit" class="btn btn-warning text-white px-5 py-2 rounded-3 fw-bold shadow-sm">
                        <i class="bi bi-check-circle me-2"></i> Update Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>