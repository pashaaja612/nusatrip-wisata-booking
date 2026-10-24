<?php
$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NusaTrip | Pemesanan Paket Wisata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="hero">
        <nav class="navbar"><div class="brand">Nusa<span>Trip</span></div><div class="nav-label">Pemesanan Paket Wisata</div></nav>
        <div class="hero-content">
            <p class="eyebrow">JELAJAHI INDONESIA</p>
            <h1>Rencanakan liburan<br>seru bersama NusaTrip.</h1>
            <p>Pilih jenis wisata favoritmu dan isi formulir pemesanan di bawah ini.</p>
        </div>
    </header>
    <main class="container">
        <section class="intro">
            <h2>Form Pemesanan Paket Wisata</h2>
            <p>Lengkapi data pemesan dan pilih paket yang kamu inginkan.</p>
        </section>
        <?php if ($pesan === 'berhasil'): ?>
            <div class="alert success">Data paket wisata berhasil disimpan.</div>
        <?php elseif ($pesan === 'gagal'): ?>
            <div class="alert error">Data gagal disimpan. Periksa koneksi dan isian form.</div>
        <?php endif; ?>
        <section class="form-card">
            <form action="simpan.php" method="POST">
                <div class="form-grid">
                    <div class="field">
                        <label for="nama">Nama Pemesan</label>
                        <input id="nama" type="text" name="nama" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="field">
                        <label for="hp">Nomor HP</label>
                        <input id="hp" type="tel" name="hp" placeholder="Contoh: 081234567890" required>
                    </div>
                    <div class="field full">
                        <label for="jenis_paket">Jenis Paket Wisata</label>
                        <select id="jenis_paket" name="jenis_paket" required>
                            <option value="">-- Pilih jenis wisata --</option>
                            <option value="Pantai">Wisata Pantai</option>
                            <option value="Gunung">Wisata Gunung</option>
                            <option value="Budaya">Wisata Budaya</option>
                        </select>
                    </div>
                    <div class="field full">
                        <label for="deskripsi">Deskripsi Pemesanan</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Contoh: Paket wisata 1 hari atau camping akhir pekan" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn">Simpan Pemesanan</button>
            </form>
        </section>
        <section class="packages">
            <h2>Pilihan Wisata</h2>
            <div class="package-grid">
                <article class="package-card beach"><div class="package-icon">🏖️</div><h3>Wisata Pantai</h3><p>Menikmati suasana pantai dan pemandangan laut.</p></article>
                <article class="package-card mountain"><div class="package-icon">⛰️</div><h3>Wisata Gunung</h3><p>Menjelajahi alam dan menikmati udara pegunungan.</p></article>
                <article class="package-card culture"><div class="package-icon">🏛️</div><h3>Wisata Budaya</h3><p>Mengenal budaya, tradisi, dan tempat bersejarah.</p></article>
            </div>
            <a class="text-link" href="tampil.php">Lihat data pemesanan yang tersimpan →</a>
        </section>
    </main>
    <footer>© 2026 NusaTrip — Praktik PHP dan MySQL</footer>
</body>
</html>
