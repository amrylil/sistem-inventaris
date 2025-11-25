<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
    <div class="mb-3 mb-md-0">
        <h3 class="fw-bold text-dark mb-1">Edit Barang</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/barang" class="text-decoration-none text-muted">Data Barang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <a href="/barang" class="btn btn-secondary rounded-3 fw-medium shadow-sm border-0">
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
                    <h5 class="fw-bold mb-0">Update Data Barang</h5>
                    <small class="text-muted">Ubah informasi detail barang inventaris.</small>
                </div>
            </div>

            <form action="/barang/update/<?php echo $item->id ?>" method="POST">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase ls-1">Kode Barang</label>
                        <div class="input-group">
                            <span class="input-group-text bg-secondary bg-opacity-10 border-end-0 text-muted"><i class="bi bi-upc-scan"></i></span>
                            <input type="text" class="form-control bg-secondary bg-opacity-10 border-start-0" value="<?php echo htmlspecialchars($item->kode_barang) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase ls-1">Nama Barang <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-tag"></i></span>
                            <input type="text" name="nama_barang" class="form-control bg-light border-start-0" value="<?php echo htmlspecialchars($item->nama_barang) ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase ls-1">Kategori</label>
                        <select name="kategori_id" class="form-select bg-light" required>
                            <?php foreach ($kategori as $kat): ?>
                                <option value="<?php echo $kat->id ?>"<?php echo($kat->id == $item->kategori_id) ? 'selected' : '' ?>>
                                    <?php echo $kat->nama_kategori ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase ls-1">Supplier</label>
                        <select name="supplier_id" class="form-select bg-light" required>
                            <?php foreach ($suppliers as $sup): ?>
                                <option value="<?php echo $sup->id ?>"<?php echo($sup->id == $item->supplier_id) ? 'selected' : '' ?>>
                                    <?php echo $sup->nama_supplier ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase ls-1">Stok Saat Ini</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-boxes"></i></span>
                            <input type="number" name="stok" class="form-control bg-light border-start-0" value="<?php echo $item->stok ?>" min="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase ls-1">Kondisi</label>
                        <select name="kondisi" class="form-select bg-light">
                            <option value="Baik"                                                                                                 <?php echo($item->kondisi == 'Baik') ? 'selected' : '' ?>>Baik</option>
                            <option value="Rusak"                                                                                                   <?php echo($item->kondisi == 'Rusak') ? 'selected' : '' ?>>Rusak</option>
                        </select>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                    <a href="/barang" class="btn btn-light text-muted me-md-2 px-4 rounded-3">Batal</a>
                    <button type="submit" class="btn btn-warning text-white px-5 py-2 rounded-3 fw-bold shadow-sm">
                        <i class="bi bi-check-circle me-2"></i> Update Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>