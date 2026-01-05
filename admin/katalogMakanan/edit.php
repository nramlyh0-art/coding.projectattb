<?php
session_start();
include '../../config/db.php';
if (!isset($_SESSION['admin_login'])) { header("Location: ../login.php"); exit; }

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM makanan WHERE id=$id");
$mkn = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_makanan'];
    $harga = $_POST['harga'];
    $gambar_lama = $_POST['gambar_lama'];

    if ($_FILES['gambar']['name'] != "") {
        // Jika upload gambar baru
        $filename = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/" . $filename);
    } else {
        // Jika tetap pakai gambar lama
        $filename = $gambar_lama;
    }

    $query = "UPDATE makanan SET nama_makanan='$nama', harga='$harga', gambar='$filename' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 mx-auto" style="max-width: 500px;">
            <h4>Edit Menu Makanan</h4>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="gambar_lama" value="<?= $mkn['gambar']; ?>">
                <div class="mb-3">
                    <label>Nama Makanan</label>
                    <input type="text" name="nama_makanan" class="form-control" value="<?= $mkn['nama_makanan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= $mkn['harga']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Gambar (Biarkan kosong jika tidak diganti)</label>
                    <input type="file" name="gambar" class="form-control">
                    <img src="../../assets/img/<?= $mkn['gambar']; ?>" width="100" class="mt-2">
                </div>
                <button type="submit" name="update" class="btn btn-warning w-100">Update Menu</button>
                <a href="index.php" class="btn btn-secondary w-100 mt-2">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>