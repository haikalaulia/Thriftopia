<?php
session_start();
include 'produk.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thriftopia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <h1 class="logo">Thriftopia</h1>

    <form class="search-form" method="GET" action="search.php">
        <input type="text" name="keyword" class="search-bar" placeholder="Cari..." required>
    </form>

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

<!-- Menu Navigasi -->
<div class="menu-navbar">
    <a href="index.php"><img src="foto/home.png" alt="Home" class="menu-icon"></a>
    <a href="menu.php?kategori=Atasan">Atasan</a>
    <a href="menu.php?kategori=Bawahan">Bawahan</a>
    <a href="menu.php?kategori=Aksesoris">Aksesoris</a>
    <a href="menu.php?kategori=Sepatu">Sepatu</a>
</div>

<!-- Kategori -->
<section class="kategori">
    <h2>Kategori</h2>
    <div class="scroll-container">
        <div class="kategori-container">
            <a href="menu.php?kategori=Baju Kaos" class="kategori-card baju-kaos"><span>Baju Kaos</span></a>
            <a href="menu.php?kategori=Celana Panjang" class="kategori-card celana-panjang"><span>Celana Panjang</span></a>
            <a href="menu.php?kategori=Celana Pendek" class="kategori-card celana-pendek"><span>Celana Pendek</span></a>
            <a href="menu.php?kategori=Jaket" class="kategori-card jaket"><span>Jaket</span></a>
            <a href="menu.php?kategori=Hoodie" class="kategori-card hoodie"><span>Hoodie</span></a>
            <a href="menu.php?kategori=Kemeja" class="kategori-card kemeja"><span>Kemeja</span></a>
            <a href="menu.php?kategori=Topi" class="kategori-card topi"><span>Topi</span></a>
            <a href="menu.php?kategori=Sepatu" class="kategori-card sepatu"><span>Sepatu</span></a>
            <a href="menu.php?kategori=Ikat Pinggang" class="kategori-card ikat-pinggang"><span>Ikat Pinggang</span></a>
            <a href="menu.php?kategori=Kacamata" class="kategori-card kacamata"><span>Kacamata</span></a>
        </div>
    </div>
</section>

<!-- Produk Rekomendasi -->
<h2>Rekomendasi</h2>
<div class="produk-container">
    <?php foreach ($produk as $item): ?>
        <a href="detail.php?id=<?= $item['id'] ?>" class="produk-card">
            <img src="foto/<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>" class="produk-gambar">
            <div class="produk-info">
                <p class="nama"><?= $item['nama'] ?></p>
                <p class="harga"><?= $item['harga'] ?></p>
                <p class="toko"><?= $item['toko'] ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>

</body>
</html>
