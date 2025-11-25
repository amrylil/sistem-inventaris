<div class="row g-0 h-100">
    <!-- KOLOM KIRI (Ilustrasi Ungu) -->
    <div class="col-lg-6 d-none d-lg-flex auth-illustration-col">
        <div class="illustration-card">
            <!-- Gambar Ilustrasi Beda untuk Register -->
            <img src="https://cdni.iconscout.com/illustration/premium/thumb/sign-up-8694031-6983270.png" alt="Register Illustration" class="auth-illustration-img">
        </div>
    </div>

    <!-- KOLOM KANAN (Form) -->
    <div class="col-lg-6 auth-form-col">

        <!-- Link Login di pojok kanan atas -->
        <div class="position-absolute top-0 end-0 p-4">
            <span class="text-muted small">Already a member?</span>
            <a href="/auth/login" class="text-decoration-none fw-bold ms-1" style="color: var(--auth-primary-color);">Login here</a>
        </div>

        <div class="auth-form-container text-center">

            <h2 class="fw-bold mb-2">Create Account</h2>
            <p class="text-muted mb-5">Join us and start managing efficiently!</p>

            <!-- Alert Error -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger py-2 mb-4 text-start small border-0 bg-danger-subtle text-danger">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    <?php
                        if ($_GET['error'] == 'password_mismatch') {
                            echo "Password tidak cocok!";
                        } elseif ($_GET['error'] == 'username_taken') {
                            echo "Username sudah digunakan!";
                        } else {
                            echo "Gagal mendaftar.";
                        }

                    ?>
                </div>
            <?php endif; ?>

            <form action="/auth/store" method="POST">
                <input type="text" class="form-control form-control-lg" name="nama" placeholder="Full Name" required>

                <input type="text" class="form-control form-control-lg" name="username" placeholder="Choose Username" required>

                <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>

                <input type="password" class="form-control form-control-lg" name="confirm_password" placeholder="Confirm Password" required>

                <button type="submit" class="btn btn-primary-custom mt-3 mb-4">Sign Up</button>
            </form>

            <p class="text-muted small">
                By registering, you agree to our <a href="#" class="text-decoration-none text-dark fw-bold">Terms</a> & <a href="#" class="text-decoration-none text-dark fw-bold">Privacy Policy</a>
            </p>

        </div>
    </div>
</div>