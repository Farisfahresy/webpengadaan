<?php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaBarang = $_POST["namaBarang"];
    $jumlah = $_POST["jumlah"];
    $harga = $_POST["harga"];
    $alasan = $_POST["alasan"];
    $jenisPengadaan = $_POST["jenisPengadaan"]; // Ambil data jenis_pengadaan dari form
    $namaUnit = $_SESSION['role'];
    $tanggalPengajuan = date("Y-m-d");
    $status = "Menunggu"; // Default status saat pengajuan

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $koneksi->prepare("INSERT INTO tabel_pengadaan (nama_unit, nama_barang, jumlah, harga, alasan, jenis_pengadaan, status, tanggal_pengajuan) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssss", $namaUnit, $namaBarang, $jumlah, $harga, $alasan, $jenisPengadaan, $status, $tanggalPengajuan);

    if ($stmt->execute()) {
        echo "Data pengadaan berhasil disimpan.";
        // Redirect kembali ke dashboard unit
        header("Location: dashboard_unit.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $koneksi->close();
}
?>
