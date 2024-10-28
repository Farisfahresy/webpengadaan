<?php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Lakukan validasi login (contoh sederhana, sesuaikan dengan kebutuhan)
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // Login berhasil, simpan informasi pengguna di session
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirect ke dashboard sesuai dengan role
        header("Location: dashboard.php");
        exit();
    } else {
        // Login gagal
        echo "Login gagal. Cek kembali username, password, dan role.";
    }
}
?>
