<?php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update status pengadaan menjadi 'Ditolak'
    $sqlReject = "UPDATE tabel_pengadaan SET status = 'Ditolak' WHERE id = $id";

    if ($koneksi->query($sqlReject) === TRUE) {
        header("Location: dashboard_admin.php");
        exit();
    } else {
        echo "Gagal menolak pengadaan.";
    }
} else {
    header("Location: dashboard_admin.php");
    exit();
}
?>
