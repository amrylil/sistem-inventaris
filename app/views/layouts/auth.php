<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Inventaris App' ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Warna Tema Baru: Modern Indigo */
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-color: #f3f4f6; /* Abu-abu sangat muda untuk background body */
            --text-color: #1f2937;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            /* Pattern Background (Opsional - agar tidak terlalu polos) */
            background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;

            /* Centering Vertikal & Horizontal */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px; /* Padding agar card tidak nempel layar HP */
        }

        /* Container Card Utama */
        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 1000px; /* Lebar maksimal card */
            border-radius: 10px; /* Sudut sangat bulat */
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            overflow: hidden; /* Agar gambar tidak keluar dari radius */
            min-height: 600px; /* Tinggi minimal agar proporsional */
        }

        /* Kolom Kiri (Gambar) */
        .login-illustration-wrapper {
            background-color: #e0e7ff; /* Latar ungu/biru sangat muda */
            background-image: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
        }

        .login-illustration-wrapper img {
            width: 100%;
            max-width: 380px;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
            transition: transform 0.3s ease;
        }
        .login-illustration-wrapper:hover img {
            transform: scale(1.02);
        }

        /* Kolom Kanan (Form) */
        .login-form-wrapper {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Input Styling */
        .form-floating > .form-control {
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            background-color: #f9fafb;
        }
        .form-floating > .form-control:focus {
            background-color: #fff;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        /* Tombol Utama */
        .btn-primary-modern {
            background-color: var(--primary-color);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s;
            letter-spacing: 0.5px;
        }
        .btn-primary-modern:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        /* Link */
        a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Tidak perlu class wrapper khusus lagi karena body sudah flex -->
    <?php if (isset($content)) {
            echo $content;
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>