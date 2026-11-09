<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: index.php"); exit; }
include 'koneksi.php';

$no_id = $_GET['no_id'];
$data = mysqli_query($conn, "SELECT * FROM mobil_023 WHERE no_id='$no_id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nomor_kendaraan = mysqli_real_escape_string($conn, $_POST['nomor_kendaraan']);
    $jenis_kendaraan = mysqli_real_escape_string($conn, $_POST['jenis_kendaraan']);
    $pemilik = mysqli_real_escape_string($conn, $_POST['pemilik']);
    $tahun_pembuatan = mysqli_real_escape_string($conn, $_POST['tahun_pembuatan']);

    $query = "UPDATE mobil_023 SET nomor_kendaraan='$nomor_kendaraan', jenis_kendaraan='$jenis_kendaraan', pemilik='$pemilik', tahun_pembuatan='$tahun_pembuatan' WHERE no_id='$no_id'";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white"><h5>Edit Data Kendaraan</h5></div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nomor Kendaraan</label>
                                <input type="text" name="nomor_kendaraan" class="form-control" value="<?= $row['nomor_kendaraan'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kendaraan</label>
                                <select name="jenis_kendaraan" class="form-select" required>
                                    <option value="Sedan" <?= $row['jenis_kendaraan'] == 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                                    <option value="Pickup" <?= $row['jenis_kendaraan'] == 'Pickup' ? 'selected' : '' ?>>Pickup</option>
                                    <option value="Truk" <?= $row['jenis_kendaraan'] == 'Truk' ? 'selected' : '' ?>>Truk</option>
                                    <option value="Bemo" <?= $row['jenis_kendaraan'] == 'Bemo' ? 'selected' : '' ?>>Bemo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pemilik</label>
                                <input type="text" name="pemilik" class="form-control" value="<?= $row['pemilik'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Pembuatan</label>
                                <input type="text" name="tahun_pembuatan" maxlength="4" class="form-control" value="<?= $row['tahun_pembuatan'] ?>" required>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>