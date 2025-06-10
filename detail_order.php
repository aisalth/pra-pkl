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
    <link rel="stylesheet" href="dekstop18.css">
    <title>Document</title>
</head>
<body>

    <?php include "user_header.php"; ?>

    <h1>Pesanan</h1>
    <hr class="solid">
    <h2>Detail Pesanan</h2>

    <div class="order-card">
        <div class="order-item">
            <div class="item-details">
                <img src="image\newjir.png" alt="Croissant" class="item-image">
                <div class="item-description">
                    <h3>Croissant</h3>
                    <p>Strawberry Deluxe</p>
                </div>
            </div>
            <div class="item-price">Rp 18.000,00</div>
        </div>

        <div class="order-item">
            <div class="item-details">
                <img src="image\newjir.png" alt="Croissant" class="item-image">
                <div class="item-description">
                    <h3>Croissant</h3>
                    <p>Strawberry Deluxe</p>
                </div>
            </div>
            <div class="item-price">Rp 18.000,00</div>
        </div>

        <div class="order-item">
            <div class="item-details">
                <img src="image\newjir.png" alt="Croissant" class="item-image">
                <div class="item-description">
                    <h3>Croissant</h3>
                    <p>Strawberry Deluxe</p>
                </div>
            </div>
            <div class="item-price">Rp 18.000,00</div>
        </div>

        <div class="order-summary">
            <div class="summary-row">
                <span>Sub Total</span>
                <span>Rp 124.000,00</span>
            </div>
            <div class="summary-row shipping">
                <span>Biaya Pengiriman</span>
                <span class="free-text">FREE!</span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span>Rp 124.000,00</span>
            </div>
            <div class="summary-row status">
                <span>Status</span>
                <span class="status-text">Di siapkan</span>
            </div>
        </div>
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
    
        <script src="dekstop18.js"></script>
</body>
</html>