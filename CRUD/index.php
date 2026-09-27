<?php
include "koneksi.php";

if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $koneksi->query("DELETE FROM produk WHERE id = $id");
    header("Location: index.php");
    exit;
}

$data = $koneksi->query("SELECT * FROM produk ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Data Produk</h1>

        <a href="tambah.php" class="btn btn-tambah">+ Tambah Produk</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td><?= $row['stok'] ?></td>
                <td class="aksi">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                    <a href="index.php?hapus=<?= $row['id'] ?>" class="btn btn-hapus"
                       onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
