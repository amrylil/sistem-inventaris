<style>
    /* --- MODERN SAAS DASHBOARD STYLE --- */

    /* 1. Base Card Style */
    .card-saas {
        border: none;
        border-radius: 16px; /* Sudut lebih bulat */
        background-color: #ffffff;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04); /* Shadow super halus */
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-saas:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
    }

    /* 2. Icon Styling (Soft Square) */
    .icon-square {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    /* 3. Custom Soft Badges (Pengganti Badge Bootstrap yang pekat) */
    .badge-soft-danger {
        background-color: #fef2f2;
        color: #ef4444;
        border: 1px solid #fee2e2;
    }
    .badge-soft-warning {
        background-color: #fffbeb;
        color: #f59e0b;
        border: 1px solid #fef3c7;
    }
    .badge-soft-success {
        background-color: #f0fdf4;
        color: #16a34a;
        border: 1px solid #dcfce7;
    }

    /* 4. Table Styling */
    .table-custom thead th {
        background-color: #f8fafc;
        color: #64748b;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #f1f5f9;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }
    .table-custom td {
        padding-top: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
    }

    /* 5. Typography Utility */
    .text-label { color: #64748b; font-size: 0.875rem; font-weight: 500; }
    .text-value { color: #1e293b; font-weight: 700; }
</style>

<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-5">
    <div>
        <h3 class="fw-bold text-dark mb-1">Dashboard Overview</h3>
        <p class="text-muted mb-0">Halo Admin, inilah ringkasan inventaris hari ini.</p>
    </div>
    <div class="mt-3 mt-md-0">
        <button class="btn btn-primary px-4 py-2 rounded-3 fw-medium shadow-sm border-0" style="background-color: #2563eb;">
            <i class="bi bi-cloud-download me-2"></i> Download Laporan
        </button>
    </div>
</div>

<div class="row g-4 mb-5">

    <div class="col-xl-3 col-md-6">
        <div class="card card-saas h-100 p-3">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-square me-3" style="background-color: #eff6ff; color: #2563eb;">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div>
                        <div class="text-label">Total Aset</div>
                        <div class="text-value fs-4">450 Item</div>
                    </div>
                </div>
                <div class="d-flex align-items-center small">
                    <span class="text-success fw-bold me-2"><i class="bi bi-arrow-up-short"></i> 12%</span>
                    <span class="text-muted">dari bulan lalu</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-saas h-100 p-3">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-square me-3" style="background-color: #f0fdf4; color: #16a34a;">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div>
                        <div class="text-label">Estimasi Nilai</div>
                        <div class="text-value fs-4">Rp 185 Jt</div>
                    </div>
                </div>
                <div class="d-flex align-items-center small">
                    <span class="text-success fw-bold me-2"><i class="bi bi-arrow-up-short"></i> 5.4%</span>
                    <span class="text-muted">kenaikan aset</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-saas h-100 p-3">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-square me-3" style="background-color: #f0f9ff; color: #0891b2;">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <div>
                        <div class="text-label">Terjual (Bln)</div>
                        <div class="text-value fs-4">128 Pcs</div>
                    </div>
                </div>
                <div class="d-flex align-items-center small">
                    <span class="text-danger fw-bold me-2"><i class="bi bi-arrow-down-short"></i> 3%</span>
                    <span class="text-muted">dari rata-rata</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-saas h-100 p-3 border border-danger border-opacity-25" style="background-color: #fef2f2;">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="icon-square me-3 bg-white text-danger shadow-sm">
                        <i class="bi bi-exclamation-diamond"></i>
                    </div>
                    <div>
                        <div class="text-label text-danger">Perlu Restock</div>
                        <div class="text-value fs-4 text-danger">8 Item</div>
                    </div>
                </div>
                <div class="d-flex align-items-center small">
                    <span class="text-danger fw-bold me-2">Segera</span>
                    <span class="text-danger opacity-75">lakukan pengadaan</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-lg-8">
        <div class="card card-saas h-100">
            <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="fw-bold text-dark mb-0">Arus Keluar Masuk</h5>
                    <small class="text-muted">Statistik pergerakan barang 6 bulan terakhir</small>
                </div>
                <button class="btn btn-sm btn-light border"><i class="bi bi-download"></i></button>
            </div>
            <div class="card-body px-4 pb-4">
                <canvas id="chartArusBarang" style="height: 320px; width: 100%;"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-saas h-100">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold text-dark mb-0">Kategori</h5>
                <small class="text-muted">Distribusi jenis barang</small>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center position-relative">
                <div style="width: 100%; max-width: 280px;">
                    <canvas id="chartKategori"></canvas>
                </div>
                <div class="position-absolute text-center" style="pointer-events: none;">
                    <div class="h3 fw-bold mb-0 text-dark">450</div>
                    <small class="text-muted">Total</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card card-saas h-100 overflow-hidden">
            <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0">Stok Menipis</h5>
                <a href="/barang" class="text-decoration-none small fw-bold">Lihat Semua</a>
            </div>
            <div class="card-body p-0 mt-2">
                <div class="table-responsive">
                    <table class="table table-custom table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">Produk</th>
                                <th>Kategori</th>
                                <th class="text-center">Sisa Stok</th>
                                <th class="text-end pe-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-2 me-3"><i class="bi bi-display text-muted"></i></div>
                                        <div>
                                            <div class="fw-bold text-dark">Monitor LG 24"</div>
                                            <div class="small text-muted">Elektronik</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border">Elektronik</span></td>
                                <td class="text-center fw-bold text-danger">2</td>
                                <td class="text-end pe-4">
                                    <span class="badge badge-soft-danger px-3 py-2 rounded-pill">Critical</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-2 me-3"><i class="bi bi-file-text text-muted"></i></div>
                                        <div>
                                            <div class="fw-bold text-dark">Kertas A4 Rim</div>
                                            <div class="small text-muted">ATK</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border">ATK</span></td>
                                <td class="text-center fw-bold text-warning">5</td>
                                <td class="text-end pe-4">
                                    <span class="badge badge-soft-warning px-3 py-2 rounded-pill">Low Stock</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded p-2 me-3"><i class="bi bi-pen text-muted"></i></div>
                                        <div>
                                            <div class="fw-bold text-dark">Spidol Whiteboard</div>
                                            <div class="small text-muted">ATK</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-dark border">ATK</span></td>
                                <td class="text-center fw-bold text-warning">8</td>
                                <td class="text-end pe-4">
                                    <span class="badge badge-soft-warning px-3 py-2 rounded-pill">Low Stock</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-saas h-100">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold text-dark mb-0">Aktivitas</h5>
            </div>
            <div class="card-body px-4">
                <div class="border-start border-2 ps-3 border-light ms-2">

                    <div class="mb-4 position-relative">
                        <div class="position-absolute top-0 start-0 translate-middle rounded-circle bg-primary border border-4 border-white" style="width: 12px; height: 12px; left: -17px;"></div>
                        <p class="small text-muted mb-1">10 menit yang lalu</p>
                        <p class="mb-0 text-dark">Admin menambahkan stok <strong class="text-primary">Mouse Logitech</strong> sebanyak 50 unit.</p>
                    </div>

                    <div class="mb-4 position-relative">
                        <div class="position-absolute top-0 start-0 translate-middle rounded-circle bg-danger border border-4 border-white" style="width: 12px; height: 12px; left: -17px;"></div>
                        <p class="small text-muted mb-1">1 jam yang lalu</p>
                        <p class="mb-0 text-dark">Barang keluar: <strong>Laptop Asus</strong> (2 Unit) oleh Divisi IT.</p>
                    </div>

                    <div class="mb-0 position-relative">
                        <div class="position-absolute top-0 start-0 translate-middle rounded-circle bg-info border border-4 border-white" style="width: 12px; height: 12px; left: -17px;"></div>
                        <p class="small text-muted mb-1">3 jam yang lalu</p>
                        <p class="mb-0 text-dark">Update harga massal kategori <span class="badge bg-light text-dark border">Elektronik</span>.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- 1. SETUP LINE CHART (ARUS BARANG) ---
        const ctx1 = document.getElementById('chartArusBarang').getContext('2d');

        // Gradient Fill
        let gradientFill = ctx1.createLinearGradient(0, 0, 0, 300);
        gradientFill.addColorStop(0, "rgba(37, 99, 235, 0.2)"); // Biru pudar atas
        gradientFill.addColorStop(1, "rgba(37, 99, 235, 0)");   // Transparan bawah

        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [
                    {
                        label: 'Barang Masuk',
                        data: [65, 59, 80, 81, 56, 120],
                        borderColor: '#2563eb', // Biru SaaS Modern
                        backgroundColor: gradientFill,
                        borderWidth: 2,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#2563eb',
                        pointRadius: 4,
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Barang Keluar',
                        data: [28, 48, 40, 19, 86, 90],
                        borderColor: '#94a3b8', // Abu-abu Slate
                        borderDash: [5, 5],
                        borderWidth: 2,
                        pointRadius: 0, // Hilangkan titik untuk data sekunder
                        tension: 0.4,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false } // Sembunyikan legenda agar bersih
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { borderDash: [2, 4], color: '#f1f5f9' },
                        ticks: { font: { size: 11 }, color: '#94a3b8' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 11 }, color: '#94a3b8' }
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
            }
        });

        // --- 2. SETUP DOUGHNUT CHART (KATEGORI) ---
        const ctx2 = document.getElementById('chartKategori').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Elektronik', 'ATK', 'Furniture', 'Aksesoris'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#3b82f6', // Blue 500
                        '#10b981', // Emerald 500
                        '#f59e0b', // Amber 500
                        '#6366f1'  // Indigo 500
                    ],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20 } }
                },
                cutout: '75%',
            }
        });
    });
</script>
