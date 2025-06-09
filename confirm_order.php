<?php
    session_start();
    include "koneksi.php";

    $id_user = $_SESSION['id_user'];
    
    $id_pesanan = $_GET['id_pesanan'];
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
    <link rel="stylesheet" href="dekstop17.css">
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
    <?php
        $select_order = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'");
        while($order = mysqli_fetch_assoc($select_order)){
    ?>
    <h1>Pesananmu Sedang <?= $order['status']; ?></h1>
    
    <hr class="solid">
    <p class="confirmation-text">
        Pesananmu sedang kami proses. Harap ditunggu.<br>
        Terimakasih sudah memesan produk kami
    </p>

    <a href="pesanan.php"><button class="view-order-btn">Lihat Pesanan</button></a>

    <h2 class="order-title">Detail Pesanan</h2>
    <div class="order-details">
            <h2>Detail Pesanan</h2>
                    <div class="address-box">
                        <p><strong>Informasi Pemesan:</strong></p>
                        <p><?= $order['customer']; ?></p>
                        <p><strong>Tipe Pesanan:</strong> <?= $order['tipe_pesanan']; ?></p>
                        <p><strong>Tanggal Pesanan:</strong> <?= $order['tanggal_order']; ?></p>
                    </div>

                    <hr class="garis-horizontal">
                    <h2>Produk</h2>
                    <div class="product-item">
                        <div class="product-details">
                            <div class="product-name"><?= $order['total_product']; ?></div>
                        </div>
                    </div>

                    <div class="summary-row">
                        <div>Sub Total</div>
                        <div>Rp <?= $order['total_harga']; ?></div>
                    </div>

                    <div class="total-row">
                        <div><strong>Total</strong></div>
                        <div><strong>Rp <?= $order['total_harga']; ?></strong></div>
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
    
        <script src="dekstop17.js"></script>
</body>
</html>