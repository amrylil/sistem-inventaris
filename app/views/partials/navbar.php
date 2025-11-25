<style>
    /* Styling khusus Navbar */
    .navbar-glass {
        background-color: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid #eff2f5;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
    }

    /* Search Bar Input */
    .search-group .form-control {
        border: 1px solid #f1f5f9;
        background-color: #f8fafc;
        border-radius: 8px 0 0 8px;
        font-size: 0.9rem;
        transition: all 0.3s;
    }
    .search-group .form-control:focus {
        background-color: #fff;
        border-color: #cbd5e1;
        box-shadow: none;
    }
    .search-group .btn {
        border-radius: 0 8px 8px 0;
        border: 1px solid #f1f5f9;
        border-left: none;
        background-color: #f8fafc;
        color: #64748b;
    }
    .search-group .btn:hover {
        background-color: #e2e8f0;
    }

    /* Icon Buttons (Bell, Message) */
    .nav-icon-btn {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        color: #64748b;
        transition: all 0.2s;
        background: transparent;
        position: relative;
    }
    .nav-icon-btn:hover {
        background-color: #f1f5f9;
        color: #2563eb;
    }

    /* Badge Notifikasi */
    .icon-badge {
        position: absolute;
        top: 8px;
        right: 8px;
        width: 8px;
        height: 8px;
        background-color: #ef4444;
        border-radius: 50%;
        border: 2px solid #fff;
    }

    /* Profile Dropdown */
    .nav-profile img {
        border: 2px solid #eff6ff;
    }
</style>

<nav class="navbar navbar-expand navbar-light navbar-glass sticky-top px-4 py-3 mb-4">
    <div class="d-flex align-items-center gap-4">
        <button class="btn btn-light border-0 shadow-none p-0" id="sidebarToggle">
            <i class="bi bi-list fs-4 text-secondary"></i>
        </button>

        <form class="d-none d-md-flex search-group input-group" style="width: 320px;">
            <input type="text" class="form-control" placeholder="Cari data, invoice, atau user..." aria-label="Search">
            <button class="btn" type="button">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <ul class="navbar-nav ms-auto align-items-center gap-3">

        <li class="nav-item d-md-none">
            <a class="nav-link nav-icon-btn" href="#">
                <i class="bi bi-search fs-5"></i>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link nav-icon-btn" href="#" id="alertsDropdown" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-bell fs-5"></i>
                <span class="icon-badge"></span> </a>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-0" style="width: 300px;">
                <li class="p-3 border-bottom d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold">Notifikasi</h6>
                    <small class="text-primary cursor-pointer">Tandai sudah dibaca</small>
                </li>
                <li>
                    <a class="dropdown-item p-3 d-flex align-items-start gap-3" href="#">
                        <div class="bg-warning bg-opacity-10 text-warning p-2 rounded">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <div>
                            <p class="mb-1 small fw-bold">Stok Menipis!</p>
                            <p class="mb-0 small text-muted">Monitor LG tersisa 2 unit.</p>
                            <small class="text-xs text-muted">Baru saja</small>
                        </div>
                    </a>
                </li>
                <li><hr class="dropdown-divider m-0"></li>
                <li><a class="dropdown-item text-center small text-muted py-2" href="#">Lihat Semua Notifikasi</a></li>
            </ul>
        </li>

        <div class="vr h-50 mx-2 text-secondary opacity-25 d-none d-md-block"></div>

        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center gap-2" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                <div class="text-end d-none d-md-block" style="line-height: 1.2;">
                    <span class="d-block fw-bold text-dark small">Administrator</span>
                    <span class="d-block text-muted" style="font-size: 10px;">Super Admin</span>
                </div>
                <div class="nav-profile">
                    <img src="https://ui-avatars.com/api/?name=Admin+Utama&background=2563eb&color=fff" alt="Profile" class="rounded-circle" width="40" height="40">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2 text-muted"></i> Profile Saya</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2 text-muted"></i> Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
