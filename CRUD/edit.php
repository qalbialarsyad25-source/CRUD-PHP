<?php
include "koneksi.php";

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = intval($_POST['harga']);
    $stok = intval($_POST['stok']);

    $stmt = $koneksi->prepare("UPDATE produk SET nama = ?, harga = ?, stok = ? WHERE id = ?");
    $stmt->bind_param("siii", $nama, $harga, $stok, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$result = $koneksi->query("SELECT * FROM produk WHERE id = $id");
$row = $result->fetch_assoc();

if (!$row) {
    die("Data tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Produk</h2>
        <form method="POST">
            <label>Nama Produk</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>

            <label>Harga</label>
            <input type="number" name="harga" value="<?= $row['harga'] ?>" required>

            <label>Stok</label>
            <input type="number" name="stok" value="<?= $row['stok'] ?>" required>

            <div class="form-aksi">
                <button type="submit" class="btn-simpan">Update</button>
                <a href="index.php" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
