<?php
// Baris ini memicu error jika MySQL mati atau konfigurasi salah
include '../config/db.php'; 

$makanan = mysqli_query($conn, "SELECT * FROM makanan");
$no_telepon = "6285772118396"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Lezat | Resto Murmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { background-color: #dc3545; }
        .food-card { border: none; border-radius: 20px; transition: 0.3s; overflow: hidden; background: white; }
        .food-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
        .food-img { width: 100%; height: 200px; object-fit: cover; }
        .btn-order { background-color: #25d366; color: white; border-radius: 12px; font-weight: 600; }
        .btn-order:hover { background-color: #128c7e; color: white; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark mb-5 py-3 shadow">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shop me-2"></i> RESTO MURMER</a>
            <a href="dashboard.php" class="btn btn-light btn-sm rounded-pill px-3">Kembali</a>
        </div>
    </nav>

    <div class="container mb-5 text-center">
        <h2 class="fw-bold mb-5">Pilih Menu Favoritmu</h2>
        <div class="row g-4 justify-content-center">
            <?php while($row = mysqli_fetch_assoc($makanan)) : ?>
            <div class="col-md-6 col-lg-3 text-start">
                <div class="card food-card shadow-sm h-100">
                    <img src="../assets/img/<?= $row['gambar']; ?>" class="food-img" onerror="this.src='https://placehold.co/400x300?text=Menu+Resto'">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-1"><?= $row['nama_makanan']; ?></h5>
                        <p class="text-danger fw-bold fs-5 mb-3">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                        
                        <?php 
                        $text = "Halo Resto Murmer, saya mau pesan " . $row['nama_makanan'];
                        $url_wa = "https://api.whatsapp.com/send?phone=" . $no_telepon . "&text=" . urlencode($text);
                        ?>
                        <a href="<?= $url_wa; ?>" target="_blank" class="btn btn-order w-100 py-2 shadow-sm">
                            <i class="bi bi-whatsapp me-2"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>