<?php 
session_start();
if (!isset($_SESSION['admin_login'])) { header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Resto Murmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar-brand { font-weight: 600; letter-spacing: 1px; }
        .card-menu { 
            transition: all 0.3s ease; 
            border: none; 
            border-radius: 15px;
        }
        .card-menu:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; 
        }
        .icon-circle {
            width: 60px;
            height: 60px;
            background-color: #eee;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-egg-fried me-2"></i> RESTO MURMER
            </a>
            <div class="ms-auto d-flex align-items-center">
                <span class="text-white me-3 d-none d-md-block">Selamat Datang, <strong>Admin</strong></span>
                <a href="logout.php" class="btn btn-light btn-sm rounded-pill px-3">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <h2 class="fw-bold">Ringkasan Panel Admin</h2>
                <p class="text-muted">Kelola operasional restoran Anda dalam satu tempat.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card card-menu shadow-sm h-100 p-3 text-center">
                    <div class="card-body">
                        <div class="icon-circle bg-success text-white">
                            <i class="bi bi-journal-richtext"></i>
                        </div>
                        <h5 class="card-title fw-semibold">Katalog Makanan</h5>
                        <p class="card-text text-muted small">Tambah, edit, atau hapus menu makanan dari daftar.</p>
                        <a href="katalogMakanan/index.php" class="btn btn-success w-100 rounded-pill">Buka Katalog</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card card-menu shadow-sm h-100 p-3 text-center">
                    <div class="card-body">
                        <div class="icon-circle bg-primary text-white">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title fw-semibold">Daftar User</h5>
                        <p class="card-text text-muted small">Lihat siapa saja pelanggan yang sudah mendaftar.</p>
                        <a href="infoUser.php" class="btn btn-primary w-100 rounded-pill">Lihat User</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card card-menu shadow-sm h-100 p-3 text-center text-muted" style="opacity: 0.7;">
                    <div class="card-body">
                        <div class="icon-circle bg-secondary text-white">
                            <i class="bi bi-gear"></i>
                        </div>
                        <h5 class="card-title fw-semibold">Pengaturan Toko</h5>
                        <p class="card-text small">Ubah jam operasional & info kontak resto.</p>
                        <button class="btn btn-secondary w-100 rounded-pill" disabled>Segera Hadir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 py-4 text-muted">
        <small>&copy; 2025 <b>Resto Murmer</b>. All Rights Reserved.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>