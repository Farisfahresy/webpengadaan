<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();}
include 'config.php';
// Ambil riwayat pengadaan unit yang telah diajukan
$username = $_SESSION['role'];
$query = "SELECT * FROM tabel_pengadaan WHERE nama_unit='$username'";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Unit - Pengadaan Barang</title>
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
</head>
<body>
    <div class="container">
<!-- Tambahkan tombol logout -->
        <a href="logout.php" class="logout-button">Logout</a>
        <h2>Dashboard Unit - Pengadaan</h2>

        <form action="submit_pengadaan.php" method="post">
            <label for="namaBarang">Pengadaan:</label>
            <input type="text" id="namaBarang" name="namaBarang" required>

            <label for="jenisPengadaan">Jenis Pengadaan:</label>
            <select id="jenisPengadaan" name="jenisPengadaan" required>
            <option value="BARANG">BARANG</option>
            <option value="SDM">SDM</option>
            </select>


            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" required>

            <label for="harga">Harga:</label>
            <input type="text" id="harga" name="harga" required>

            <label for="alasan">Alasan Pengadaan:</label>
            <textarea id="alasan" name="alasan" required></textarea>

            <button type="submit">Kirim Pengadaan</button>
        </form>

        <h3>Riwayat Pengadaan</h3>
        <table>
            <thead>
                <tr>
                    <th>Pengadaan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Alasan Pengadaan</th>
                    <th>jenis Pengadaan</th>
                    <th>Status</th>
		            <th>Tanggal Pengajuan</th>
                    <th>Tanggal Persetujuan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['nama_barang']}</td>";
                    echo "<td>{$row['jumlah']}</td>";
                    echo "<td>{$row['harga']}</td>";
                    echo "<td>{$row['alasan']}</td>";
                    echo "<td>{$row['jenis_pengadaan']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "<td>{$row['tanggal_pengajuan']}</td>";
                    echo "<td>{$row['tanggal_persetujuan']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
