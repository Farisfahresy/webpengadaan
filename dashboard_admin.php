<?php
include 'config.php';

// Query untuk mendapatkan semua unit (role) dari tabel user
$sqlGetUnits = "SELECT DISTINCT role FROM users";
$resultGetUnits = $koneksi->query($sqlGetUnits);

$selectedUnit = $_GET['unit'] ?? '';  // Ambil unit dari parameter URL
$whereClause = $selectedUnit ? " WHERE u.role = '$selectedUnit'" : '';

$sqlPengadaanAdmin = "SELECT p.*, u.role AS nama_unit FROM tabel_pengadaan p
                     JOIN users u ON p.nama_unit = u.role
                     $whereClause
                     ORDER BY p.tanggal_pengajuan DESC"; // Urutkan berdasarkan tanggal_pengajuan secara descending (paling baru atas)

$resultPengadaanAdmin = $koneksi->query($sqlPengadaanAdmin);


$resultPengadaanAdmin = $koneksi->query($sqlPengadaanAdmin);
if (!$resultPengadaanAdmin) {
    die("Query error: " . $koneksi->error);}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Persetujuan Pengadaan</title>
    <link rel="stylesheet" href="style.css">
 <style>
      @media screen and (max-width: 600px) {
      /* Aturan untuk layar berukuran kecil */
table {
    width: 100%;
    margin-top: 30px;
    border-collapse: collapse;
  }

th, td {
    padding: 5px;
    text-align: left;
    font-size: 40%;
    border: 1px solid #ddd;
  }
.approve-button {
display: inline-block;
padding: 4px 6px;
font-size: 70%;
background-color: #5bc0de;
color: #fff;
text-decoration: none;
border-radius: 5px;
}

.approve-button:hover {
background-color: #46b8da;
}

.reject-button {
display: inline-block;
padding: 4px 6px;
font-size: 70%;
background-color: #d9534f;
color: #fff;
text-decoration: none;
border-radius: 5px;
}

.reject-button:hover {
background-color: #c9302c;
}
  }</style>
    <script>
        function refreshRiwayat() {
            var selectedUnit = document.getElementById("unitDropdown").value;
            window.location.href = 'dashboard_admin.php?unit=' + selectedUnit;
        }
        function konfirmasiSetujui(id) {
            var konfirmasi = confirm("Anda yakin ingin menyetujui pengadaan ini?");
            if (konfirmasi) {
                window.location.href = 'approve.php?id=' + id;
            }
        }

        function konfirmasiTidakSetujui(id) {
            var konfirmasi = confirm("Anda yakin ingin menolak pengadaan ini?");
            if (konfirmasi) {
                window.location.href = 'reject.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Dashboard Admin - Persetujuan Pengadaan</h2>

        <!-- Tambahkan tombol logout -->
        <a href="logout.php" class="logout-button">Logout</a>

        <!-- Tambahkan dropdown dan tombol refresh -->
        <label for="unitDropdown">Pilih Unit:</label>
        <select id="unitDropdown">
                <option value="">Semua Unit</option>
            <?php
            while ($rowUnit = $resultGetUnits->fetch_assoc()) {
                $selected = ($selectedUnit === $rowUnit['role']) ? 'selected' : '';
                echo "<option value='{$rowUnit['role']}' $selected>{$rowUnit['role']}</option>";
            }
            ?>
        </select>
        <button onclick="refreshRiwayat()">Refresh</button>

        <table>
            <thead>
                <tr>
                    <th>Nama Unit</th>
                    <th>Pengadaan</th>
                    <th>Jenis Pengadaan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Alasan Pengadaan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal Persetujuan</th>
		    <th>Status</th>
                    <th>Aksi</th> <!-- Tambahkan kolom Aksi -->
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $resultPengadaanAdmin->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['nama_unit']}</td>";
                    echo "<td>{$row['nama_barang']}</td>";
                    echo "<td>{$row['jenis_pengadaan']}</td>"; // Tampilkan jenis pengadaan
                    echo "<td>{$row['jumlah']}</td>";
                    echo "<td>{$row['harga']}</td>";
                    echo "<td>{$row['alasan']}</td>";
                    echo "<td>{$row['tanggal_pengajuan']}</td>";
                    echo "<td>{$row['tanggal_persetujuan']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "<td>";
                    // Tambahkan kelas tambahan pada tombol sesuai dengan status
                    if ($row['status'] == 'Menunggu') {
                        echo "<button onclick='konfirmasiSetujui({$row['id']})' class='approve-button'>Setujui</button> | ";
                        echo "<button onclick='konfirmasiTidakSetujui({$row['id']})' class='reject-button'>Tidak Setujui</button>";
                    } else {
                        echo "Sudah Diproses";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
