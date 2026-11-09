<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: index.php"); exit; }
include 'koneksi.php';

$no_id = $_GET['no_id'];
mysqli_query($conn, "DELETE FROM mobil_023 WHERE no_id='$no_id'");
header("Location: dashboard.php");
exit;
?>