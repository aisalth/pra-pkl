<?php
    include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script 
    src="https://kit.fontawesome.com/bd5eaea774.js" 
    crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="dekstop5.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <a href="" class="logo"><img src="image\222.png" ></a>
        <nav class="navbar">
            <a href="index.html#home">Beranda</a>
            <a href="index.html#topdecoration">Produk</a>
            <a href="dekstop3.html">Tentang</a>
            <a href="index.html#testimonial-section">Review</a>
            <a href="dekstop4.html">Kontak</a>
        </nav>
        <div class="icons">
            <a href="login.html"><div id="user-icon"><i class="fa-regular fa-circle-user"></i></div></a>
            <a href="dekstop13.html"><div id="heart-icon"><i class="fa-regular fa-heart"></i></div></a>
            <a href="dekstop14.html"><div id="shopping-cart-icon"><i class="fa-solid fa-cart-shopping"></i></div></a>
           <div id="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
           <div id="menu-btn"><i class="fa-solid fa-bars"></i></div>
        </div>

        <div class="search-form">
            <input type="search" name="search" id="search-box" placeholder="cari disini...">
            <label for="search-box" class="fa-solid fa-magnifying-glass"></label>
        </div>

    </header>

    <div class="product-container">
        <?php
            $id_product = $_GET['detail'];
            $select_product = mysqli_query($koneksi, "SELECT * FROM products WHERE id_product='$id_product'");
            if(mysqli_num_rows($select_product) > 0){
                while($product = mysqli_fetch_assoc($select_product)) {
        ?>
        <div class="product-image">
            <img src="product_image\<?= $product['gambar']; ?>" alt="Croissant">
        </div>
        <div class="product-details">
            <h1 class="product-ti"><?= $product['nama']; ?></h1>
            <div class="product-rating">
                ★★★★☆
            </div>
            <div class="product-price">
                Rp <?= $product['harga']; ?>
            </div>
            <button class="btn-cart">
                <div id="cart-btn" class="fas fa-shopping-cart"></div> 
                <span style="margin-left: 8px;"></span> Add to Cart
            </button>
            <div class="horizontal-line"></div>
            <div class="product-description">
                <?= $product['deskripsi']; ?>
            </div>
            <?php } } ?>
        </div>
    </div>

    <div class="prdk">
        <div class="pala">
            <h1>Rekomendasi</h1>
        </div>
        
        <div class="product-carousel">
                
            <!-- Product 1 -->
             <?php
                $select_product = mysqli_query($koneksi, "SELECT * FROM products LIMIT 5");
                if(mysqli_num_rows($select_product) > 0){
                    while($product = mysqli_fetch_assoc($select_product)) {
            ?>
            <div class="product-card">
                <div class="product-title"><?= $product['nama']; ?></div>
                <img src="product_image\<?= $product['gambar']; ?>" alt="Strawberry Cake" class="product-image">
                <div class="rating">
                    <span class="star">★★★★</span>
                    <span class="star" style="color: #ddd;">★</span>
                    <div class="price">Rp <?= $product['harga']; ?></div>
                </div>               
                <div class="button-group">
                    <button class="btn-favorite">
                        <div id="love-btn"><i class="fa-regular fa-heart"></i></div>
                    </button>
                    <button class="btn-cart">
                        <div id="cart-btn" class="fas fa-shopping-cart"></div> 
                        <span style="margin-left: 8px;"></span> Add to Cart
                    </button>
                </div>
            </div>
            <?php } } ?>
            
                </div>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Connect To Us</h3>
                <div class="social-icons">
                    <a href="https://www.instagram.com/" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/" class="social-icon"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://x.com/" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://www.youtube.com/" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
    
            <div class="footer-section">
                <ul class="footer-links">
                    <li><a href="index.html#home">Beranda</a></li>
                    <li><a href="index.html#topdecoration">Produk</a></li>
                    <li><a href="dekstop3.html">Tentang Kami</a></li>
                    <li><a href="index.html#testimonial-section">Review</a></li>
                    <li><a href="dekstop6.html">Lokasi</a></li>
                </ul>
            </div>
    
            <div class="footer-sectionth">
                <h3>Customer Care</h3>
                <p>cs@pasner.com</p>
                <p>083846643602 (WhatsApp)</p>
            </div>
    
    
        </div>
    
        <div class="copyright">
            2025 Copyright PASTRY CORNER. All Right Reserved
        </div>
    </footer> 

    <script src="dekstop5.js"></script>
</body>
</html>