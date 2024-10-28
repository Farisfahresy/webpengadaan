<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Pengadaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="Unit PKRS">Unit PKRS</option>
                <option value="Unit Farmasi">Unit Farmasi</option>
		        <option value="Unit IGD">Unit IGD</option>
                <option value="Unit Gizi">Unit Gizi</option>
                <option value="Unit Rawat Inap">Unit Rawat Inap</option>
                <option value="Unit Rawat Jalan">Unit Rawat Jalan</option>
		        <option value="Unit VK">Unit VK</option>
                <option value="Unit OK">Unit OK</option>
                <option value="Unit Keuangan/Kasir">Unit Keuangan/Kasir</option>
                <option value="Unit LAB">Unit LAB</option>
                <option value="Unit Manajemen">Unit Manajemen</option>
                <option value="Unit Rekam Medis">Unit Rekam Medis</option>
		        <option value="Unit IT">Unit IT</option>
            </select>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
