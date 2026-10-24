<?php
require 'koneksi.php';
$data = mysqli_query($koneksi, 'SELECT * FROM wisata ORDER BY id DESC');
if (!$data) {
    die('Gagal mengambil data: ' . mysqli_error($koneksi));
}
function e($nilai) {
    return htmlspecialchars((string)$nilai, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NusaTrip | Data Pemesanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="small-hero"><nav class="navbar"><a class="brand" href="index.php">Nusa<span>Trip</span></a><div class="nav-label">Data Pemesanan</div></nav></header>
    <main class="container">
        <section class="intro"><h1>Data Paket Wisata</h1><p>Data yang ditampilkan berasal dari database <strong>db_wisata</strong>, tabel <strong>wisata</strong>.</p></section>
        <div class="table-wrap">
            <table>
                <thead><tr><th>ID</th><th>Nama Pemesan</th><th>Nomor HP</th><th>Jenis Paket</th><th>Deskripsi</th></tr></thead>
                <tbody>
                <?php if (mysqli_num_rows($data) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td><?= e($row['id']) ?></td>
                            <td><?= e($row['nama']) ?></td>
                            <td><?= e($row['hp']) ?></td>
                            <td><span class="tag"><?= e('Wisata ' . $row['jenis_paket']) ?></span></td>
                            <td><?= e($row['deskripsi']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="empty">Belum ada data pemesanan. Silakan isi form terlebih dahulu.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <a class="btn inline-btn" href="index.php">+ Tambah Pemesanan</a>
    </main>
    <footer>© 2026 NusaTrip — Praktik PHP dan MySQL</footer>
</body>
</html>
