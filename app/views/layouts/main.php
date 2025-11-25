<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Sistem Inventaris' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <style>
        body { min-height: 100vh; overflow-x: hidden; }

        /* 1. Style Default Sidebar */
        #sidebar {
            width: 280px;               /* Lebar awal */
            transition: all 0.3s;       /* Animasi halus durasi 0.3 detik */
            white-space: nowrap;        /* Mencegah teks turun baris */
        }

        /* 2. Style Saat Sidebar Minimize (Collapsed) */
        #sidebar.collapsed {
            width: 0px;                 /* Lebar jadi 0 */
            padding: 0 !important;      /* Hilangkan padding bootstrap */
            overflow: hidden;           /* Sembunyikan konten yang meluap */
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <?php include __DIR__ . '/../partials/sidebar.php'; ?>

        <div class="d-flex flex-column w-100" style="background-color: #f8f9fa; max-height: 100vh; overflow-y: auto;">

            <?php include __DIR__ . '/../partials/navbar.php'; ?>

            <main class="container-fluid px-4">
                <?php if (isset($content)) {
                        echo $content;
                    }
                ?>
            </main>

            <footer class="py-4 bg-light mt-auto text-center text-muted">
                <small>&copy; 2024 Sistem Inventaris</small>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Ambil elemen
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');

        // Tambahkan event listener saat tombol diklik
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function(event) {
                event.preventDefault();
                // Toggle class 'collapsed' pada sidebar
                sidebar.classList.toggle('collapsed');
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            // Semua tabel dengan class "datatable" akan otomatis jadi DataTables
            $('.datatable').DataTable();
        });
    </script>
</body>
</html>