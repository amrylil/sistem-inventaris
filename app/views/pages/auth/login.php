<div class="login-card row g-0">

    <!-- KOLOM KIRI: ILUSTRASI -->
    <!-- d-none d-lg-flex artinya sembunyi di HP, tampil di Layar Besar -->
    <div class="col-lg-6 d-none d-lg-flex login-illustration-wrapper">
        <div class="text-center">
            <!-- Ganti src ini dengan path gambar lokal Anda: /assets/images/login.png -->
          <img src="https://cdni.iconscout.com/illustration/premium/thumb/login-3305943-2757111.png" alt="Login Illustration" class="img-fluid mb-4">

            <h4 class="fw-bold text-primary mb-2">Kelola Inventaris</h4>
            <p class="text-muted small px-4">Sistem manajemen barang yang efisien, cepat, dan mudah digunakan.</p>
        </div>
    </div>

    <!-- KOLOM KANAN: FORM -->
    <div class="col-lg-6 login-form-wrapper">
        <div class="w-100" style="max-width: 400px; margin: 0 auto;">

            <!-- Header Form -->
            <div class="mb-5">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-primary bg-opacity-10 text-primary p-2 rounded-3">
                        <i class="bi bi-box-seam-fill fs-5"></i>
                    </span>
                    <span class="fw-bold text-dark h5 mb-0">InventarisApp</span>
                </div>
                <h2 class="fw-bold mb-1">Selamat Datang!</h2>
                <p class="text-muted">Silakan login untuk melanjutkan.</p>
            </div>

            <!-- Alerts -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger border-0 bg-danger-subtle text-danger d-flex align-items-center mb-4 rounded-3 p-3">
                    <i class="bi bi-exclamation-octagon-fill me-2 fs-5"></i>
                    <small>
                        <?php
                            if ($_GET['error'] == 'invalid_credentials') {
                                echo "Username atau Password salah!";
                            } else {
                                echo "Terjadi kesalahan sistem.";
                            }

                        ?>
                    </small>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success border-0 bg-success-subtle text-success d-flex align-items-center mb-4 rounded-3 p-3">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <small>Registrasi berhasil! Silakan login.</small>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form action="/auth/authenticate" method="POST">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com" required>
                    <label for="username" class="text-muted"><i class="bi bi-person me-2"></i>Username</label>
                </div>

                <div class="form-floating mb-3 position-relative">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password" class="text-muted"><i class="bi bi-lock me-2"></i>Password</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label text-muted small" for="remember">Ingat Saya</label>
                    </div>
                    <a href="#" class="small">Lupa Password?</a>
                </div>

                <button type="submit" class="btn btn-primary-modern mb-4">
                    Masuk Sekarang <i class="bi bi-arrow-right ms-2"></i>
                </button>

                <div class="text-center">
                    <p class="text-muted small mb-0">Belum memiliki akun? <a href="/auth/register" class="fw-bold">Daftar Gratis</a></p>
                </div>

            </form>
        </div>
    </div>
</div>