<?php 
session_start();
// Cek apakah user sudah login
if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Resto Murmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f8f9fa; 
            margin: 0;
        }
        /* Hero Section / Banner */
        .welcome-banner {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            border-radius: 0 0 30px 30px;
            margin-bottom: -50px;
        }
        /* Navigasi */
        .navbar {
            background-color: transparent !important;
            transition: 0.3s;
        }
        .navbar.scrolled {
            background-color: #dc3545 !important;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        /* Card Action */
        .action-card {
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
        .action-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }
        .icon-box {
            width: 70px;
            height: 70px;
            background-color: #fff4f4;
            color: #dc3545;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 20px;
        }
        .logout-btn {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            backdrop-filter: blur(5px);
            border-radius: 50px;
            padding: 8px 20px;
            transition: 0.3s;
        }
        .logout-btn:hover {
            background-color: #fff;
            color: #dc3545;
        }
    </style>
</head>
<body>

    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark fixed-top px-4">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">
                <i class="bi bi-egg-fried me-2"></i> RESTO MURMER
            </a>
            <div class="ms-auto">
                <a href="logout.php" class="logout-btn text-decoration-none">
                    <i class="bi bi-box-arrow-right me-1"></i> Keluar
                </a>
            </div>
        </div>
    </nav>

    <header class="welcome-banner text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-2">Halo, <?php echo $_SESSION['user_name']; ?>! 👋</h1>
            <p class="lead fw-light">Sudah siap untuk menikmati hidangan spesial hari ini?</p>
        </div>
    </header>

    <main class="container mb-5">
        <div class="row justify-content-center g-4">
            
            <div class="col-md-5 col-lg-4">
                <a href="katalog.php" class="card action-card shadow-sm h-100 p-4">
                    <div class="card-body p-0">
                        <div class="icon-box">
                            <i class="bi bi-book-half"></i>
                        </div>
                        <h4 class="fw-bold text-dark">Daftar Menu</h4>
                        <p class="text-muted">Lihat semua pilihan makanan dan minuman lezat kami.</p>
                        <div class="text-danger fw-bold">
                            Mulai Pesan <i class="bi bi-arrow-right ms-2"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-5 col-lg-4">
                <div class="card action-card shadow-sm h-100 p-4">
                    <div class="card-body p-0">
                        <div class="icon-box">
                            <i class="bi bi-info-circle"></i>
                        </div>
                        <h4 class="fw-bold text-dark">Info Resto</h4>
                        <p class="text-muted">Buka jam 08:00 - 22:00. <br>Jl. Kenangan No. 123, Jakarta.</p>
                        <div class="text-primary fw-bold">
                            Lihat Lokasi <i class="bi bi-geo-alt ms-2"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="alert alert-warning border-0 shadow-sm p-4 rounded-4 d-flex align-items-center">
                    <div class="fs-1 me-4">🔥</div>
                    <div>
                        <h5 class="fw-bold mb-1">Promo Akhir Tahun!</h5>
                        <p class="mb-0 text-muted small">Dapatkan diskon 20% untuk semua menu Ayam Bakar setiap hari Jumat.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center py-4 text-muted mt-5">
        <small>&copy; 2025 <b>Resto Murmer</b>. Cita Rasa Mewah, Harga Ramah.</small>
    </footer>

    <script>
        window.onscroll = function() {
            var nav = document.getElementById('mainNavbar');
            if (window.pageYOffset > 50) {
                nav.classList.add("scrolled");
            } else {
                nav.classList.remove("scrolled");
            }
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>