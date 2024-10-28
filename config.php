<?php
// Informasi koneksi ke database
$host = "sql301.infinityfree.com"; // Nama host server MySQL
$username = "if0_35939595"; // Nama pengguna MySQL (secara default root)
$password = "muktihusada"; // Kata sandi MySQL
$database = "if0_35939595_pengadaan"; // Nama database yang akan Anda gunakan

// Membuat koneksi ke MySQL
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Set karakter set ke UTF-8 (opsional)
$koneksi->set_charset("utf8");
?>
