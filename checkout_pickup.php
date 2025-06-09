<?php
    session_start();
    include "koneksi.php";

    $id_user = $_SESSION['id_user'];

    if(!isset($id_user)){
        header('location:login.php');
    }
    
    if(isset($_POST['checkout_btn'])){
        $total_harga = $_POST['total_harga'];
        $total_products = $_POST['total_products'];
        $customer = $_POST['nama'].' - '.$_POST['no_telp'].' - '.$_POST['waktu'];
        $tipe_pesanan = "pickup";

        $query = mysqli_query($koneksi, "INSERT INTO pesanan (id_user, tanggal_order, total_harga, total_product, customer, tipe_pesanan) VALUES ('$id_user', NOW(), '$total_harga', '$total_products', '$customer', '$tipe_pesanan')");
        
        if($query){
            // Ambil ID pesanan yang baru saja dibuat
            $id_pesanan = mysqli_insert_id($koneksi);
            $message[] = 'Pesanan berhasil! Silahkan melakukan pembayaran';
            header("location:payment.php?id_pesanan=" . $id_pesanan);
            exit();
        } else {
            $message[] = 'Terjadi kesalahan, silahkan coba lagi';
        }
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
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
    rel="stylesheet">
    <link rel="stylesheet" href="dekstop16.css">
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

    <div class="checkout-container">
        <div class="ad">
            <h1>Checkout</h1>
            <div class="ad-divider"></div>
        </div>

        <div class="delivery-options">
            <div class="pickup-option">
                <i class="fa-solid fa-truck-fast"></i>
                <span>Ambil Di Tempat</span>
            </div>
            <div class="delivery-label">Delivery</div>
        </div>

        <div class="checkout-layout">
            <div class="checkout-left">
                <div class="card">
                    <h2 class="card-title">Alamat Toko</h2>
                    <div class="store-address">
                        <div>
                            <span class="store-name">Pastry Corner</span>
                            <span class="store-phone"> | +628384664382</span>
                        </div>
                        <div class="store-location">Jl. Menur, Kalimanah Wetan, Kalimanah, Purbalingga, Jawa Tengah, 53371</div>
                    </div>
                </div>

                    <div class="detail-customer">
                        <div class="payment-title">Informasi Pemesan</div>
                    </div>
                    <form action="" method="post">
                        <div class="modal-inner">
                            <label for="">Nama</label>
                            <input type="text" name="nama" required>
                            <label for="">Nomor HandPhone</label>
                            <input type="number" name="no_telp" required>
                            <label for="">Waktu Pengambilan</label>
                            <input type="time" name="waktu" required>
                        </div>  
                        <div class="card product-section">
                            <h2>Produk</h2>
                            <?php
                            $grandTotal = 0;
                            $cart_items = array();
                            $select_cart = mysqli_query($koneksi, "SELECT * FROM cart");
                            if(mysqli_num_rows($select_cart) > 0){
                                while($cart = mysqli_fetch_assoc($select_cart)){
                            ?>
                            <div class="product-item">
                                <img src="product_image/<?= $cart['gambar']; ?>" alt="<?= $cart['nama']; ?>" class="product-image">
                                <div class="product-details">
                                    <div class="product-name"><?= $cart['nama']; ?></div>
                                    <div class="product-variant"><i></i></div>
                                </div>
                                <div class="product-price"><?= $cart['harga']; ?></div>
                                <div class="product-quantity"><?= $cart['quantity']; ?></div>
                            </div>
                            <?php   
                                $cart_items[] = $cart['nama'].' ('.$cart['harga'].' x '. $cart['quantity'].') - ';
                                $total = ($cart['harga'] * $cart['quantity']);
                                $grandTotal += $total;
                                }
                            } else {
                                echo "<p>Keranjang kosong</p>";
                            }
                            $total_products = implode($cart_items);
                            ?>
                            </div>
                            <div class="checkout-right">
                                <div class="card order-summary">
                                    <div class="summary-row">
                                        <div class="summary-label">Sub Total</div>
                                        <div class="summary-value">Rp <?= number_format($grandTotal, 0, ',', '.'); ?></div>
                                    </div>
                                    <div class="summary-divider"></div>
                                    <div class="summary-row">
                                        <div class="summary-label summary-total">Total</div>
                                        <input type="hidden" name="total_products" value="<?= $total_products; ?>">
                                        <input type="hidden" name="total_harga" value="<?= $grandTotal ?>">
                                        <div class="summary-value summary-total">Rp <?= number_format($grandTotal, 0, ',', '.'); ?></div>
                                    </div>
                                    <?php if($grandTotal > 0): ?>
                                    <input type="submit" name="checkout_btn" value="Pesan Sekarang" class="checkout_btn">
                                    <?php else: ?>
                                    <p>Silahkan tambahkan produk ke keranjang terlebih dahulu</p>
                                    <?php endif; ?>
                                </div>
                        </div>
                    </form>
                    </div>

                </div>
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
    
        <script src="dekstop16.js"></script>
</body>
</html>