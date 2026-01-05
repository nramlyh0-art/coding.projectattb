<?php 
session_start();
include '../config/db.php';

if (isset($_POST['login_admin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
    
    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin_login'] = true;
        $_SESSION['admin_user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Username atau Password Admin Salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 card p-4 text-dark shadow">
                <h3 class="text-center">Admin Login</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label>Username Admin</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password Admin</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" name="login_admin" class="btn btn-danger w-100">Login Admin</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>