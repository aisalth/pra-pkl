<?php
    session_start();
    include "koneksi.php";

    $id_user = $_SESSION['id_user'];

    if(!isset($id_user)){
        header('location:login.php');
    }
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
    <link rel="stylesheet" href="dekstop13.css">
    <title>Document</title>
</head>
<body>

    <?php include "user_header.php"; ?>

    

    <div class="divider"></div>

    <div class="key">
        <h2 class="card-title">Favorit Saya</h2>
    </div>
        
        <div class="product-carousel">
            
            
            <?php
                $select_fav = mysqli_query($koneksi, "SELECT * FROM wishlist");
                while($fav = mysqli_fetch_assoc($select_fav)){
            ?>
            <div class="product-card">
                <div class="product-title"><?= $fav['nama']; ?></div>
                <img src="product_image\<?= $fav['gambar']; ?>" alt="Strawberry Cake" class="product-image">
                <div class="rating">
                    <span class="star">★★★★</span>
                    <span class="star" style="color: #ddd;">★</span>
                    <div class="price">Rp <?= $fav['harga']; ?></div>
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
            <?php } ?>
              
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

    <script src="dekstop13.js"></script>
</body>
</html>