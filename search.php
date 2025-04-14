<?php
session_start();
include 'produk.php'; // ini file yang berisi array $produk

$keyword = isset($_GET['keyword']) ? strtolower(trim($_GET['keyword'])) : '';

$hasil = [];
if (!empty($keyword)) {
    foreach ($produk as $item) {
        if (
            strpos(strtolower($item['nama']), $keyword) !== false ||
            strpos(strtolower($item['kategori']), $keyword) !== false ||
            strpos(strtolower($item['toko']), $keyword) !== false
        ) {
            $hasil[] = $item;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pencarian - Thriftopia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="search-result">
    <h2>Hasil Pencarian untuk: "<?= htmlspecialchars($keyword) ?>"</h2>

    <?php if (!empty($hasil)): ?>
        <div class="produk-container">
            <?php foreach ($hasil as $item): ?>
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
    <?php else: ?>
        <p>Tidak ada produk yang cocok dengan kata kunci "<strong><?= htmlspecialchars($keyword) ?></strong>".</p>
    <?php endif; ?>
</div>

</body>
</html>
