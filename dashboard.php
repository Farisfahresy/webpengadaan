<?php
session_start();

// Pastikan pengguna telah login
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: index.php");
    exit();
}

include 'config.php';

// Tampilkan dashboard sesuai dengan peran pengguna
$role = $_SESSION['role'];

if ($role == 'admin') {
    include 'dashboard_admin.php';
} elseif ($role == 'Unit PKRS') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit IT') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit Farmasi') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit IGD') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit Gizi') {
    include 'dashboard_unit.php';
}  elseif ($role == 'Unit Rawat Inap') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit Rawat Jalan') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit VK') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit OK') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit Keuangan/Kasir') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit LAB') {
    include 'dashboard_unit.php';
}elseif ($role == 'Unit Manajemen') {
    include 'dashboard_unit.php';
} elseif ($role == 'Unit Rekam Medis') {
    include 'dashboard_unit.php';
}
?>
