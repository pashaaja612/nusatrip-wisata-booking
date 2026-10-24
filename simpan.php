<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$hp = trim($_POST['hp'] ?? '');
$jenis = trim($_POST['jenis_paket'] ?? '');
$deskripsi = trim($_POST['deskripsi'] ?? '');
$jenisValid = ['Pantai', 'Gunung', 'Budaya'];

if ($nama === '' || $hp === '' || $deskripsi === '' || !in_array($jenis, $jenisValid, true)) {
    header('Location: index.php?pesan=gagal');
    exit;
}

$stmt = mysqli_prepare($koneksi, 'INSERT INTO wisata (nama, hp, jenis_paket, deskripsi) VALUES (?, ?, ?, ?)');
mysqli_stmt_bind_param($stmt, 'ssss', $nama, $hp, $jenis, $deskripsi);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header('Location: index.php?pesan=berhasil');
    exit;
}

mysqli_stmt_close($stmt);
header('Location: index.php?pesan=gagal');
exit;
?>
