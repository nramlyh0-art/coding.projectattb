<?php
$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika menggunakan standar XAMPP
$db   = "db_project"; // Pastikan nama database ini benar-benar ada di phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>