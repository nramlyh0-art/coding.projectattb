<?php
session_start();
include '../../config/db.php';
if (!isset($_SESSION['admin_login'])) { header("Location: ../login.php"); exit; }

if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_makanan']);
    $harga = $_POST['harga'];
    
    // Proses Upload Gambar
    $filename = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $folder = "../../assets/img/";

    // Pastikan folder ada
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    move_uploaded_file($tmp_name, $folder . $filename);

    $query = "INSERT INTO makanan (nama_makanan, harga, gambar) VALUES ('$nama', '$harga', '$filename')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Menu Baru | Resto Murmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .card { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .form-label { font-weight: 600; color: #444; }
        .form-control { border-radius: 10px; padding: 12px; border: 1px solid #ddd; }
        .form-control:focus { border-color: #198754; box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.1); }
        .btn-save { border-radius: 10px; padding: 12px; font-weight: 600; transition: 0.3s; }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="index.php" class="btn btn-link text-decoration-none text-muted mb-3 p-0">
                    <i class="bi bi-arrow-left"></i> Kembali ke Katalog
                </a>

                <div class="card p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="bg-success-subtle d-inline-block p-3 rounded-circle mb-3">
                            <i class="bi bi-plus-circle fs-1 text-success"></i>
                        </div>
                        <h3 class="fw-bold">Tambah Menu</h3>
                        <p class="text-muted">Masukkan detail hidangan baru untuk restoran Anda.</p>
                    </div>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="form-label">Nama Makanan</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-tag"></i></span>
                                <input type="text" name="nama_makanan" class="form-control" placeholder="Contoh: Nasi Goreng Gila" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Harga (IDR)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">Rp</span>
                                <input type="number" name="harga" class="form-control" placeholder="0" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Foto Makanan</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*" required>
                            <div class="form-text mt-2">Gunakan gambar berkualitas tinggi (JPG/PNG).</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="simpan" class="btn btn-success btn-save">
                                <i class="bi bi-cloud-arrow-up me-2"></i> Simpan ke Katalog
                            </button>
                            <button type="reset" class="btn btn-light btn-save border text-muted">Reset Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>