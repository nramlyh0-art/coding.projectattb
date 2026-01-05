<?php
session_start();
include '../../config/db.php';
if (!isset($_SESSION['admin_login'])) { header("Location: ../login.php"); exit; }
$makanan = mysqli_query($conn, "SELECT * FROM makanan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Menu | Resto Murmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .card { border: none; border-radius: 15px; }
        .img-menu { width: 70px; height: 70px; object-fit: cover; border-radius: 12px; }
        .btn-action { border-radius: 8px; margin: 0 2px; }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0 text-success">Manajemen Menu</h2>
                <p class="text-muted">Atur katalog makanan yang tampil di halaman user</p>
            </div>
            <div>
                <a href="../dashboard.php" class="btn btn-outline-secondary rounded-pill me-2">Kembali</a>
                <a href="tambah.php" class="btn btn-success rounded-pill px-4">
                    <i class="bi bi-plus-lg"></i> Tambah Menu
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-success text-dark">
                        <tr>
                            <th class="px-4 py-3">Gambar</th>
                            <th class="py-3">Nama Makanan</th>
                            <th class="py-3">Harga</th>
                            <th class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($makanan)) : ?>
                        <tr>
                            <td class="px-4">
                                <img src="../../assets/img/<?= $row['gambar']; ?>" class="img-menu border shadow-sm" alt="makanan">
                            </td>
                            <td>
                                <span class="fw-bold d-block"><?= $row['nama_makanan']; ?></span>
                                <small class="text-muted">ID: #<?= $row['id']; ?></small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border px-3">
                                    Rp <?= number_format($row['harga'], 0, ',', '.'); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm btn-action text-white">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Yakin ingin menghapus menu ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>