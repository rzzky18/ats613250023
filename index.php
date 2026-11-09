<?php
session_start();
include 'koneksi.php';

$error = '';
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM member_023 WHERE email='$email' AND password='$password' AND aktive='1'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['nama'] = $row['nama'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Email atau Password salah / Akun tidak aktif!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center py-5" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Login Rental Mobil</h3>
                        <?php if ($error): ?>
                            <div class="alert alert-danger" role="alert"><?= $error ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required value="rizky@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required value="password123">
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>