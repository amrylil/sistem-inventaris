<!-- HEADER -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4">
    <div class="mb-3 mb-md-0">
        <h3 class="fw-bold text-dark mb-1">Input Peminjaman</h3>
        <a href="/loan" class="btn btn-secondary rounded-3 border-0"><i class="bi bi-arrow-left me-2"></i> Kembali</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-saas border-0 shadow-sm rounded-4 p-4" style="background: #fff;">

            <form action="/loan/store" method="POST">

                <!-- Info Peminjam -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase">Peminjam</label>
                        <select name="user_id" class="form-select bg-light" required>
                            <option value="">-- Pilih User --</option>
                            <?php foreach ($users as $u): ?>
                                <option value="<?php echo $u->id?>"><?php echo $u->nama_lengkap?> (<?php echo $u->username?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-muted small text-uppercase">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" class="form-control bg-light" value="<?php echo date('Y-m-d')?>" required>
                    </div>
                </div>

                <!-- List Barang (Dinamis) -->
                <div class="mb-4">
                    <label class="form-label fw-bold text-muted small text-uppercase">Daftar Barang</label>
                    <div class="table-responsive border rounded-3">
                        <table class="table table-sm mb-0 bg-white" id="itemTable">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3" style="width: 60%">Nama Barang</th>
                                    <th style="width: 25%">Qty</th>
                                    <th class="text-center" style="width: 15%">Hapus</th>
                                </tr>
                            </thead>
                            <tbody id="itemBody">
                                <!-- Row Pertama (Default) -->
                                <tr>
                                    <td class="ps-3">
                                        <select name="item_id[]" class="form-select form-select-sm border-0" required>
                                            <option value="">-- Pilih Barang --</option>
                                            <?php foreach ($items as $i): ?>
                                                <option value="<?php echo $i->id?>">
                                                    <?php echo $i->nama_barang?> (Stok: <?php echo $i->stok?>)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="qty[]" class="form-control form-control-sm border-0 text-center" value="1" min="1" required>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm text-danger remove-row" disabled><i class="bi bi-x-circle-fill"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-sm btn-light text-primary mt-2 border" id="addRow">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Baris Barang
                    </button>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-muted small text-uppercase">Catatan</label>
                    <textarea name="catatan" class="form-control bg-light" rows="2" placeholder="Keperluan peminjaman..."></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary py-2 rounded-3 fw-bold shadow-sm" style="background-color: #4f46e5;">
                        Proses Peminjaman
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Script Tambah Row Dinamis -->
<script>
    document.getElementById('addRow').addEventListener('click', function() {
        let table = document.getElementById('itemBody');
        let row = table.rows[0].cloneNode(true); // Clone baris pertama

        // Reset value input di baris baru
        row.querySelector('select').value = "";
        row.querySelector('input').value = "1";

        // Aktifkan tombol hapus
        row.querySelector('.remove-row').disabled = false;
        row.querySelector('.remove-row').addEventListener('click', function() {
            this.closest('tr').remove();
        });

        table.appendChild(row);
    });
</script>