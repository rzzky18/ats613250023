<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM mobil_023");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Rental Mobil Muhammad Rizky Purnama</a>
            <div class="d-flex">
                <span class="navbar-text me-3 text-white">Halo, <?= htmlspecialchars($_SESSION['nama']) ?></span>
                <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container flex-grow-1">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Kendaraan</h5>
                <a href="tambah.php" class="btn btn-primary btn-sm">Tambah Mobil</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nomor Kendaraan</th>
                                <th>Jenis Kendaraan</th>
                                <th>Pemilik</th>
                                <th>Tahun Pembuatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nomor_kendaraan']) ?></td>
                                <td><?= htmlspecialchars($row['jenis_kendaraan']) ?></td>
                                <td><?= htmlspecialchars($row['pemilik']) ?></td>
                                <td><?= htmlspecialchars($row['tahun_pembuatan']) ?></td>
                                <td>
                                    <a href="edit.php?no_id=<?= $row['no_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus.php?no_id=<?= $row['no_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <small>&copy; 2026 Pemrograman Web Lanjut - Muhammad Rizky Purnama (613250023)</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>