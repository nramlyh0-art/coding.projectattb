<?php
include '../config/db.php';

if (isset($_POST['daftar'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Enkripsi Password agar aman (Hashed)
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cek_user) > 0) {
        $error = "Username sudah digunakan, silakan pilih yang lain.";
    } else {
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password_hashed')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Pendaftaran Berhasil! Silakan Login.'); window.location='login.php';</script>";
        } else {
            $error = "Gagal mendaftar, coba lagi.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun | Resto Murmer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #dc3545 0%, #ffc107 100%); min-height: 100vh; display: flex; align-items: center; }
        .card { border: none; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
        .form-control { border-radius: 10px; padding: 12px; }
        .btn-daftar { border-radius: 10px; padding: 12px; font-weight: 600; background-color: #dc3545; color: white; transition: 0.3s; }
        .btn-daftar:hover { background-color: #bb2d3b; color: white; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4 p-md-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">Buat Akun</h3>
                    <p class="text-muted">Bergabung dengan Resto Murmer sekarang!</p>
                </div>

                <?php if(isset($error)): ?>
                    <div class="alert alert-danger py-2 small text-center"><?= $error; ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" name="daftar" class="btn btn-daftar">Daftar Sekarang</button>
                    </div>
                    <div class="text-center">
                        <small class="text-muted">Sudah punya akun? <a href="login.php" class="text-danger text-decoration-none fw-bold">Login di sini</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>