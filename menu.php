<?php
session_start();

$kategori = $_GET['kategori'] ?? 'Semua';
include 'produk.php';

$filtered = array_filter($produk, function($p) use ($kategori) {
    return $p['kategori'] === $kategori || $p['subkategori'] === $kategori;
});
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($kategori) ?> - Thriftopia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <h1 class="logo">Thriftopia</h1>

    <div class="search-form">
        <input type="text" class="search-bar" placeholder="Cari...">
    </div>

    <div class="icons">
        <a href="cart.php"><img src="foto/cart.png" alt="Cart" class="icon"></a>

        <div class="profil-dropdown">
            <img src="foto/profil.png" alt="Profil" class="profil">
            <div class="profil-menu">
                <?php if (isset($_SESSION['username'])): ?>
                    <p>Hi, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Menu Navbar -->
<div class="menu-navbar">
    <a href="index.php"><img src="foto/home.png" alt="Home" class="menu-icon"></a>
    <a href="menu.php?kategori=Atasan">Atasan</a>
    <a href="menu.php?kategori=Bawahan">Bawahan</a>
    <a href="menu.php?kategori=Aksesoris">Aksesoris</a>
    <a href="menu.php?kategori=Sepatu">Sepatu</a>
</div>

<h2 class="kategori"><?= htmlspecialchars($kategori) ?></h2>

<!-- Produk Container -->
<div class="produk-container">
    <?php if (empty($filtered)): ?>
        <p style="text-align:center;">Produk tidak ditemukan.</p>
    <?php else: ?>
        <?php foreach ($filtered as $item): ?>
            <a href="detail.php?id=<?= $item['id'] ?>" class="produk-card">
                <img src="foto/<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>" class="produk-gambar">
                <div class="produk-info">
                    <p class="nama"><?= $item['nama'] ?></p>
                    <p class="harga"><?= $item['harga'] ?></p>
                    <p class="toko"><?= $item['toko'] ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>
