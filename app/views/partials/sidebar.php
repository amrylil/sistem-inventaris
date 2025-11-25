<?php
    // Logika sederhana untuk menentukan menu aktif
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    function isActive($path, $uri)
    {
        if ($path == '/' && $uri == '/') {
            return 'active';
        }

        if ($path != '/' && strpos($uri, $path) === 0) {
            return 'active';
        }

        return '';
    }
?>

<style>
    #sidebar {
        background-color: #ffffff;
        border-right: 1px solid #eff2f5;
        box-shadow: 4px 0 24px 0 rgba(0, 0, 0, 0.02);
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .sidebar-brand-text {
        background: linear-gradient(45deg, #2563eb, #3b82f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: -0.5px;
    }

    /* Styling Menu Item */
    .nav-custom .nav-link {
        color: #64748b;
        font-weight: 500;
        padding: 12px 16px;
        margin-bottom: 8px;
        border-radius: 12px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
    }

    /* Hover State */
    .nav-custom .nav-link:hover {
        background-color: #f8fafc;
        color: #2563eb; /* Biru */
        transform: translateX(3px);
    }


    .nav-custom .nav-link.active {
        background-color: #eff6ff;
        color: #2563eb;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
    }

    .nav-custom .nav-link i {
        font-size: 1.1rem;
        transition: transform 0.2s;
    }

    .nav-custom .nav-link.active i {
        transform: scale(1.1);
    }

    .user-card {
        background-color: #f8fafc;
        border-radius: 12px;
        border: 1px solid #f1f5f9;
    }

    #sidebar.collapsed {
        width: 0 !important;
        padding: 0 !important;
        overflow: hidden;
    }
</style>

<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-4" style="min-height: 100vh; width: 280px;">

    <a href="/" class="d-flex align-items-center mb-4 text-decoration-none">
        <div class="bg-primary bg-gradient text-white rounded-3 p-2 me-2 d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;">
            <i class="bi bi-box-seam-fill fs-5"></i>
        </div>
        <span class="fs-4 fw-bold sidebar-brand-text text-nowrap">Inventaris<span class="text-primary">App</span></span>
    </a>

    <ul class="nav nav-custom flex-column mb-auto">
        <li class="nav-item">
            <h6 class="text-uppercase text-muted ms-2 mb-2" style="font-size: 0.75rem; letter-spacing: 1px;">Menu Utama</h6>
        </li>

        <li>
            <a href="/" class="nav-link text-nowrap                                                                                                                                                                                                                                                                                                                                                                                                                         <?php echo isActive('/', $uri) ?>">
                <i class="bi bi-grid-1x2-fill me-3"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/barang" class="nav-link text-nowrap                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <?php echo isActive('/barang', $uri) ?>">
                <i class="bi bi-box-seam me-3"></i>
                Data Barang
            </a>
        </li>
        <li>
            <a href="/categories" class="nav-link text-nowrap                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <?php echo isActive('/kategori', $uri) ?>">
                <i class="bi bi-bookmark-star me-3"></i>
                Kategori
            </a>
        </li>
       <li>
            <a href="/supplier" class="nav-link text-nowrap                                                                                                                                                                                                                                                                                                                                                            <?php echo isActive('/supplier', $uri) ?>">
                <i class="bi bi-truck me-3"></i>
                Supplier
            </a>
        </li>

        <li>
            <a href="/loan" class="nav-link text-nowrap                                                        <?php echo isActive('/loan', $uri) ?>">
                <i class="bi bi-arrow-left-right me-3"></i>
                Peminjaman
            </a>
        </li>

        <li class="mt-4">
            <h6 class="text-uppercase text-muted ms-2 mb-2" style="font-size: 0.75rem; letter-spacing: 1px;">Lainnya</h6>
        </li>
        <li>
            <a href="/laporan" class="nav-link text-nowrap                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo isActive('/laporan', $uri) ?>">
                <i class="bi bi-file-earmark-bar-graph me-3"></i>
                Laporan
            </a>
        </li>
        <li>
            <a href="/users" class="nav-link text-nowrap                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo isActive('/users', $uri) ?>">
                <i class="bi bi-people me-3"></i>
                Pengguna
            </a>
        </li>
    </ul>

    <div class="mt-auto">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle user-card p-2 w-100 text-nowrap" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://ui-avatars.com/api/?name=Admin+Sistem&background=random" alt="" width="38" height="38" class="rounded-circle me-2 border border-2 border-white shadow-sm">
                <div class="d-flex flex-column" style="line-height: 1.2;">
                    <strong class="text-dark small">Super Admin</strong>
                    <span class="text-muted" style="font-size: 11px;">admin@toko.com</span>
                </div>
            </a>
            <ul class="dropdown-menu text-small shadow border-0" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Sign out</a></li>
            </ul>
        </div>
    </div>
</div>