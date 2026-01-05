<?php
session_start();
include '../../config/db.php';
if (!isset($_SESSION['admin_login'])) { header("Location: ../login.php"); exit; }
$makanan = mysqli_query($conn, "SELECT * FROM makanan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Katalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Manajemen Katalog Makanan</h3>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Menu</a>
        <a href="../dashboard.php" class="btn btn-secondary mb-3">Kembali</a>
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($makanan)) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><img src="../../assets/img/<?= $row['gambar']; ?>" width="80"></td>
                    <td><?= $row['nama_makanan']; ?></td>
                    <td>Rp <?= number_format($row['harga']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>