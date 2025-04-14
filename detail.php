<?php
include 'produk.php';

// Mengambil ID produk dari URL
$id = $_GET['id'] ?? null;
$product = null;

// Menemukan produk berdasarkan ID
if ($id !== null) {
    foreach ($produk as $item) {
        if ($item['id'] == $id) {
            $product = $item;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Thriftopia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="produk-detail">
        <?php if ($product): ?>
            <div class="produk-detail-image">
                <img src="foto/<?= $product['gambar'] ?>" alt="<?= $product['nama'] ?>">
            </div>
            <div class="produk-detail-info">
                <h2><?= $product['nama'] ?></h2>
                <p>Harga: <?= $product['harga'] ?></p>
                <p>Toko: <?= $product['toko'] ?></p>
                <p>Subkategori: <?= $product['subkategori'] ?></p>

                <!-- Tombol Tambah ke Keranjang -->
                <form action="cart.php" method="POST">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <input type="hidden" name="nama" value="<?= $product['nama'] ?>">
                    <input type="hidden" name="harga" value="<?= $product['harga'] ?>">
                    <input type="hidden" name="gambar" value="<?= $product['gambar'] ?>">
                    <input type="hidden" name="toko" value="<?= $product['toko'] ?>">
                    <button type="submit" class="beli-btn">Tambah ke Keranjang</button>
                </form>
            </div>
        <?php else: ?>
            <p>Produk tidak ditemukan.</p>
        <?php endif; ?>
    </div>

</body>
</html>
