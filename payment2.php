<?php
session_start();
include "koneksi.php";

$id_user = $_SESSION['id_user'];

if (!isset($id_user)) {
    header('location:login.php');
    exit();
}

if(isset($_POST['proses_payment'])){
        $id_pesanan = $_POST['id_pesanan'];
        $payment_method = $_POST['payment_methods'];

        $query = mysqli_query($koneksi, "INSERT INTO pesanan (id_pesanan, metode, waktu_payment) VALUES ('$id_pesanan', '$payment_method', now)");
        
        if($query){
            $message[] = 'Pesanan berhasil! Silahkan melakukan pembayaran';
            header("location:confirm_payment.php");
        } else {
            $message[] = 'Terjadi kesalahan, silahkan coba lagi';
        }
    }

// // Ambil data pesanan untuk ditampilkan
$query_order = "SELECT * FROM pesanan WHERE id_user = '$id_user' ORDER BY id_pesanan DESC LIMIT 1";
$result_order = mysqli_query($koneksi, $query_order);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bd5eaea774.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="dekstop27.css">
    <title>Checkout - Pastry Corner</title>
</head>
<body>
    <header class="header">
        <a href="" class="logo"><img src="image/222.png"></a>
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

    <div class="container">
        <form method="POST" action="">
            <div class="payment-methods">
                <h1>Checkout</h1>

                <h2>
                    <span class="material-symbols-outlined">account_balance_wallet</span>
                    Metode Pembayaran
                </h2>

                <!-- E-Wallet Section -->
                <div class="payment-option">
                    <input type="radio" id="ovo" name="payment_method" value="OVO">
                    <img src="image/ovo.png" alt="OVO" class="payment-logo" width="60" height="20">
                    <label for="ovo" class="payment-labelovo">OVO Payment</label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="dana" name="payment_method" value="DANA">
                    <img src="image/dana.png" alt="DANA" class="payment-logo" width="93" height="20">
                    <label for="dana" class="payment-label">Dana Payment</label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="gopay" name="payment_method" value="GoPay">
                    <img src="image/gopay.png" alt="GoPay" class="payment-logo" width="93" height="20">
                    <label for="gopay" class="payment-label">Gopay Payment</label>
                </div>

                <!-- Virtual Account Section -->
                <div class="payment-section-title">TRANSFER VIRTUAL ACCOUNT</div>

                <div class="payment-option">
                    <input type="radio" id="bca" name="payment_method" value="BCA Virtual Account">
                    <img src="image/bca.png" alt="BCA" class="payment-logo" width="75" height="20">
                    <label for="bca" class="payment-labelbca">BCA Virtual Account</label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="mandiri" name="payment_method" value="Mandiri Virtual Account">
                    <img src="image/mandiri.png" alt="Mandiri" class="payment-logomndri" width="88" height="20">
                    <label for="mandiri" class="payment-labelmndri">Mandiri Virtual Account</label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="bri" name="payment_method" value="BRI Virtual Account">
                    <img src="image/bank bri.png" alt="BRI" class="payment-logo" width="93" height="20">
                    <label for="bri" class="payment-labelbri">BRI Virtual Account</label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="bni" name="payment_method" value="BNI Virtual Account">
                    <img src="image/bni.png" alt="BNI" class="payment-logobni" width="70" height="20">
                    <label for="bni" class="payment-labelbni">BNI Virtual Account</label>
                </div>

                <div class="payment-option">
                    <input type="radio" id="mega" name="payment_method" value="Mega Virtual Account">
                    <img src="image/bank mega.png" alt="Mega" class="payment-logomega" width="65" height="20">
                    <label for="mega" class="payment-labelmega">Mega Virtual Account</label>
                </div>

                <!-- Credit Card Section -->
                <div class="payment-section-title">KARTU KREDIT/DEBIT</div>

                <div class="payment-option">
                    <input type="radio" id="credit-card" name="payment_method" value="Credit/Debit Card">
                    <label for="credit-card" class="payment-label">Credit/Debit Card</label>
                    <div class="credit-cards">
                        <img src="image/visa.png" alt="Visa" class="credit-card-logo">
                        <img src="image/mastercard.png" alt="Mastercard" class="credit-card-logo">
                        <img src="image/jcb.png" alt="JCB" class="credit-card-logo">
                        <img src="image/american express.png" alt="AMEX" class="credit-card-logo">
                    </div>
                </div>

                <!-- Cash Section -->
                <div class="payment-section-title">LAINNYA</div>

                <div class="payment-option">
                    <input type="radio" id="tunai" name="payment_method" value="Tunai">
                    <label for="tunai" class="payment-label">Tunai</label>
                </div>
            </div>

            <div class="order-summary">
                <h2>Alamat</h2>
                <div class="address-box">
                    <p><strong>aisa</strong> | +6283846643602</p>
                    <p>Jl. Menur, Kalimanah Wetan, Kalimanah, Purbalingga, Jawa Tengah, 53371</p>
                </div>

                <hr class="garis-horizontal">
                <h2>Produk</h2>
                <div class="product-item">
                    <input type="hidden" name="id_pesanan" value="<?= htmlspecialchars($order['id_pesanan']); ?>">
                    <?php
                    if (mysqli_num_rows($result_order) > 0) {
                        while ($order = mysqli_fetch_assoc($result_order)) {
                    ?>
                    <div class="product-details">
                        <div class="product-name"><?= htmlspecialchars($order['total_product']); ?></div>
                        <div class="product-variant"><i></i></div>
                    </div>
                </div>

                <div class="summary-row">
                    <div>Sub Total</div>
                    <div><?= htmlspecialchars($order['total_harga']); ?></div>
                </div>

                <div class="total-row">
                    <div>Total</div>
                    <div><?= htmlspecialchars($order['total_harga']); ?></div>
                </div>
                <?php 
                        }
                    } else {
                        echo "<p>Tidak ada pesanan ditemukan.</p>";
                    }
                    ?>

                <button type="submit" name="proses_payment" class="process-button" id="processPayment">
                    Proses Pembayaran
                </button>
            </div>
        </form>
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
    
            <div class="footer-section">
                <h3>Customer Care</h3>
                <p>cs@pasner.com</p>
                <p>083846643602 (WhatsApp)</p>
            </div>
        </div>
    
        <div class="copyright">
            2025 Copyright PASTRY CORNER. All Right Reserved
        </div>
    </footer> 
</body>
</html>
