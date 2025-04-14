<div class="navbar">
    <h1 class="logo">Thriftopia</h1>
    <input type="text" class="search-bar" placeholder="Cari...">
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
    </div>
</div>

<div class="menu-navbar">
    <a href="index.php"><img src="foto/home.png" alt="Home" class="menu-icon"></a>
    <a href="menu.php?kategori=Atasan">Atasan</a>
    <a href="menu.php?kategori=Bawahan">Bawahan</a>
    <a href="menu.php?kategori=Aksesoris">Aksesoris</a>
    <a href="menu.php?kategori=Sepatu">Sepatu</a>
    <a href="logout.php" style="color:white; text-decoration:none;">Logout</a>
</div>
