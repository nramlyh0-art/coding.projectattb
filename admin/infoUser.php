<?php 
session_start();
include '../config/db.php';
if (!isset($_SESSION['admin_login'])) { header("Location: login.php"); exit; }
$users = mysqli_query($conn, "SELECT id, username FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar User | Resto Murmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .card { border: none; border-radius: 15px; overflow: hidden; }
        .thead-custom { background-color: #dc3545; color: white; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0 text-danger">Daftar Pelanggan</h2>
                <p class="text-muted">Manajemen data user yang terdaftar di Resto Murmer</p>
            </div>
            <a href="dashboard.php" class="btn btn-outline-secondary rounded-pill">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-custom">
                        <tr>
                            <th class="px-4 py-3">ID</th>
                            <th class="py-3">Username</th>
                            <th class="py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($users)) : ?>
                        <tr class="align-middle">
                            <td class="px-4 fw-bold text-muted">#<?= $row['id']; ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="bi bi-person text-danger"></i>
                                    </div>
                                    <?= $row['username']; ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success rounded-pill px-3">Aktif</span>
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