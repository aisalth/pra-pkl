<?php
session_start();
include "koneksi.php";

$id_user = $_SESSION['id_user'];

if (!isset($id_user)) {
    header('location:login.php');
    exit();
}

// Ambil ID pesanan dari parameter GET
$id_pesanan = isset($_GET['id_pesanan']) ? $_GET['id_pesanan'] : '';

if (empty($id_pesanan)) {
    echo "<script>
        alert('ID Pesanan tidak ditemukan!');
        window.location.href = 'dekstop14.html';
    </script>";
    exit();
}

// Proses pembayaran
if(isset($_POST['proses_payment'])){
    $id_pesanan = $_POST['id_pesanan'];
    $payment_method = $_POST['payment_method'];

    if(empty($payment_method)){
        $error_message = "Silahkan pilih metode pembayaran!";
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO payment (id_pesanan, id_method, waktu_payment) VALUES ('$id_pesanan', '$payment_method', now())");
        
        if($query){
            // Clear cart setelah payment berhasil
            mysqli_query($koneksi, "DELETE FROM cart");
            // Redirect ke halaman konfirmasi dengan ID pesanan
            header("location:confirm_payment.php?id_pesanan=" . $id_pesanan);
            exit();
        } else {
            $error_message = 'Terjadi kesalahan, silahkan coba lagi';
        }
    }
}

// Ambil data pesanan berdasarkan ID pesanan dan user
$query_order = "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan' AND id_user = '$id_user'";
$result_order = mysqli_query($koneksi, $query_order);

if(mysqli_num_rows($result_order) == 0){
    echo "<script>
        alert('Pesanan tidak ditemukan atau Anda tidak memiliki akses!');
        window.location.href = 'dekstop14.html';
    </script>";
    exit();
}

$order_data = mysqli_fetch_assoc($result_order);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bd5eaea774.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="dekstop27.css">
    <title>Payment - Pastry Corner</title>
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
        <div class="payment-methods">
            <h1>Payment - Order #<?= $order_data['id_pesanan']; ?></h1>

            <?php if(isset($error_message)): ?>
            <div class="error-message" style="color: red; margin: 10px 0; padding: 10px; background: #ffe6e6; border: 1px solid #ff9999; border-radius: 5px;">
                <?= $error_message; ?>
            </div>
            <?php endif; ?>

            <h2>
                <span class="material-symbols-outlined">account_balance_wallet</span>
                Metode Pembayaran
            </h2>

            <form method="POST" action="">
                <input type="hidden" name="id_pesanan" value="<?= $id_pesanan; ?>">
                
                <?php
                $select_payment = mysqli_query($koneksi, "SELECT * FROM payment_method");
                while($payment = mysqli_fetch_assoc($select_payment)){
                ?>
                <div class="payment-option">
                    <input type="radio" id="payment_<?= $payment['id_method']; ?>" name="payment_method" value="<?= $payment['id_method']; ?>" required>
                    <img src="image/<?= $payment['gambar']; ?>" alt="<?= $payment['metode']; ?>" class="payment-logo" width="75" height="20">
                    <label for="payment_<?= $payment['id_method']; ?>" class="payment-labelovo"><?= $payment['metode']; ?></label>
                </div>
                <?php } ?>

                <div class="order-summary">
                    <h2>Detail Pesanan</h2>
                    <div class="address-box">
                        <p><strong>Informasi Pemesan:</strong></p>
                        <p><?= htmlspecialchars($order_data['customer']); ?></p>
                        <p><strong>Tipe Pesanan:</strong> <?= ucfirst($order_data['tipe_pesanan']); ?></p>
                        <p><strong>Tanggal Pesanan:</strong> <?= date('d/m/Y H:i', strtotime($order_data['tanggal_order'])); ?></p>
                    </div>

                    <hr class="garis-horizontal">
                    <h2>Produk</h2>
                    <div class="product-item">
                        <div class="product-details">
                            <div class="product-name"><?= htmlspecialchars($order_data['total_product']); ?></div>
                        </div>
                    </div>

                    <div class="summary-row">
                        <div>Sub Total</div>
                        <div>Rp <?= number_format($order_data['total_harga'], 0, ',', '.'); ?></div>
                    </div>

                    <div class="total-row">
                        <div><strong>Total</strong></div>
                        <div><strong>Rp <?= number_format($order_data['total_harga'], 0, ',', '.'); ?></strong></div>
                    </div>

                    <button type="submit" name="proses_payment" class="process-button" id="processPayment">
                        Proses Pembayaran
                    </button>
                </div>
            </form>
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

    <script>
        // Validasi form sebelum submit
        document.getElementById('processPayment').addEventListener('click', function(e) {
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
            if (!paymentMethod) {
                e.preventDefault();
                alert('Silahkan pilih metode pembayaran terlebih dahulu!');
            }
        });
    </script>
</body>
</html>