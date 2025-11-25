<!-- HEADER -->
<div class="d-flex align-items-center justify-content-between mb-4">
    <h3 class="fw-bold text-dark">Konfirmasi Peminjaman</h3>
    <a href="/barang" class="btn btn-secondary rounded-3 border-0"><i class="bi bi-arrow-left me-2"></i> Batal</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card card-saas border-0 shadow-sm rounded-4 p-4">

            <!-- Info Barang yang mau dipinjam -->
            <div class="d-flex align-items-center mb-4 p-3 bg-light rounded-3 border">
                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($item->nama_barang)?>&background=random&color=fff&size=128" class="rounded-3 me-3 shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                <div>
                    <h5 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($item->nama_barang)?></h5>
                    <div class="text-muted small">
                        Stok Tersedia: <span class="fw-bold text-success"><?php echo $item->stok?> Unit</span>
                    </div>
                </div>
            </div>

            <!-- Form Request -->
            <form action="/loan/storeRequest" method="POST">
                <!-- ID Barang (Hidden) -->
                <input type="hidden" name="item_id" value="<?php echo $item->id?>">

                <!-- Tanggal Pinjam -->
                <div class="mb-3">
                    <label class="form-label fw-bold small text-muted text-uppercase ls-1">Tanggal Peminjaman</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-calendar-event"></i></span>
                        <input type="date" name="tanggal_pinjam" class="form-control bg-light border-start-0" value="<?php echo date('Y-m-d')?>" required>
                    </div>
                </div>

                <!-- Jumlah (Qty) -->
                <div class="mb-3">
                    <label class="form-label fw-bold small text-muted text-uppercase ls-1">Jumlah (Qty)</label>
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('qty').stepDown()">-</button>
                        <input type="number" id="qty" name="qty" class="form-control text-center border-secondary" value="1" min="1" max="<?php echo $item->stok?>" required>
                        <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('qty').stepUp()">+</button>
                    </div>
                    <div class="form-text text-end small">Maksimal pinjam: <?php echo $item->stok?> item</div>
                </div>

                <!-- Catatan -->
                <div class="mb-4">
                    <label class="form-label fw-bold small text-muted text-uppercase ls-1">Keperluan / Catatan</label>
                    <textarea name="catatan" class="form-control bg-light" rows="3" placeholder="Contoh: Untuk presentasi meeting client..." required></textarea>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 fw-bold shadow-sm" style="background-color: #4f46e5; border: none;">
                    Ajukan Peminjaman
                </button>
            </form>

        </div>
    </div>
</div>

<!-- Style tambahan jika card-saas belum global -->
<style>
    .card-saas {
        background-color: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .ls-1 { letter-spacing: 1px; }
</style>