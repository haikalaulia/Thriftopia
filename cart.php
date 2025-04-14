<?php
session_start();

// Mengecek apakah ada produk yang ditambahkan ke keranjang
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = [
        'id' => $_POST['id'],
        'nama' => $_POST['nama'],
        'harga' => $_POST['harga'],
        'gambar' => $_POST['gambar'],
        'toko' => $_POST['toko']
    ];

    // Menyimpan produk ke dalam session keranjang
    $_SESSION['keranjang'][] = $product;
}

// Menghapus produk dari keranjang jika diminta
if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    unset($_SESSION['keranjang'][$index]);
    $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Thriftopia</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="cart-container">
        <h2>Keranjang Belanja</h2>

        <?php if (!empty($_SESSION['keranjang'])): ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['keranjang'] as $index => $item): ?>
                        <tr>
                            <td><img src="foto/<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>"></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['harga'] ?></td>
                            <td><input type="number" value="1" min="1"></td>
                            <td>
                                <a href="cart.php?remove=<?= $index ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="checkout.php" class="btn">Checkout</a>
        <?php else: ?>
            <p>Keranjang Anda kosong.</p>
        <?php endif; ?>
    </div>

</body>
</html>
