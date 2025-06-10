<?php
    session_start();
    include "koneksi.php";

    $id_user = $_SESSION['id_user'];

    if(!isset($id_user)){
        header('location:login.php');
    }

    // Proses checkout
    if(isset($_POST['checkout_btn'])){
        $nama = $_POST['nama'];
        $no_telp = $_POST['no_telp'];
        $detail = $_POST['detail'];
        $desa = $_POST['desa'];
        $kecamatan =  $_POST['kecamatan'];
        $kbp = $_POST['kbp'];
        $total_products = $_POST['total_products'];
       $total_harga = $_POST['total_harga'];
        $shipping_cost = $_POST['shipping'];
        $grand_total = $total_harga + $shipping_cost;
        $tipe_pesanan = "delivery";
        
        $alamat = $detail . ', ' . $desa . ', ' . $kecamatan . ', ' . $kbp;
        $customer = $nama . ', ' . $no_telp;
        
        $insert_order = mysqli_query($koneksi, "INSERT INTO pesanan (id_user, tanggal_order, total_harga, total_product, customer, alamat, tipe_pesanan) VALUES ('$id_user', now(), '$grand_total', '$total_products', '$customer', '$alamat', '$tipe_pesanan')");
        
        if($insert_order){
            $id_pesanan = mysqli_insert_id($koneksi);
            $message[] = 'Pesanan berhasil! Silahkan melakukan pembayaran';
            header("location:payment.php?id_pesanan=" . $id_pesanan);
            exit();
        } else {
            echo "<script>alert('Gagal membuat pesanan!');</script>";
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
    <link rel="stylesheet" href="dekstop15.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
      rel="stylesheet">
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
        <div class="he">
            <h1>Checkout</h1>
        </div>

        <div class="delivery-section">
            <div class="delivery-title">
                <i class="fa-solid fa-truck-fast"></i>
                <span>Delivery</span>
            </div>
            <a href="dekstop26.html">Ganti metode</a> 
        </div>

        <div class="card">
            
            <form action="" method="post" id="checkoutForm">
                        <div class="modal-inner">
                            <label for="">Nama</label>
                            <input type="text" name="nama" required>
                            <label for="">Nomor HandPhone</label>
                            <input type="number" name="no_telp" required>
                            <label for="">Detail</label>
                            <input type="text" name="detail" required>
                            <label for="">Desa</label>
                            <input type="text" name="desa" required>
                            <label for="">Kecamatan</label>
                            <input type="text" name="kecamatan" required>
                            <label for="">Kabupaten</label>
                            <input type="text" name="kbp" required>
                        </div>  
</div>

                        <div class="card">
                            <h2>Pengiriman</h2>
                            <div class="shipping-method">
                                <div class="shipping-option">
                                    <input type="radio" id="reguler" name="shipping" value="10000" onchange="updateTotal()">
                                    <label for="reguler">Reguler (Rp 10.000)</label>
                                </div>
                                <div class="shipping-option">
                                    <input type="radio" id="hemat" name="shipping" value="5000" onchange="updateTotal()">
                                    <label for="hemat">Hemat (Rp 5.000)</label>
                                </div>
                                <div class="shipping-option">
                                    <input type="radio" id="express" name="shipping" value="15000" onchange="updateTotal()">
                                    <label for="express">Express (Rp 15.000)</label>
                                </div>
                            </div>
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
                                    <div class="summary-row">
                                        <div class="summary-label">Ongkos Kirim</div>
                                        <div class="summary-value" id="shippingCost">Rp 0</div>
                                    </div>
                                    <div class="summary-divider"></div>
                                    <div class="summary-row">
                                        <div class="summary-label summary-total">Total</div>
                                        <input type="hidden" name="total_products" value="<?= $total_products; ?>">
                                        <input type="hidden" name="total_harga" value="<?= $grandTotal ?>">
                                        <div class="summary-value summary-total" id="finalTotal">Rp <?= number_format($grandTotal, 0, ',', '.'); ?></div>
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
    
    <script>
        const subTotal = <?= $grandTotal; ?>;
        
        function updateTotal() {
            const shippingRadios = document.getElementsByName('shipping');
            let shippingCost = 0;
            let selectedShipping = '';
            
            for (let radio of shippingRadios) {
                if (radio.checked) {
                    shippingCost = parseInt(radio.value);
                    if (radio.id === 'reguler') ;
                    else if (radio.id === 'hemat');
                    else if (radio.id === 'express');
                    break;
                }
            }
            
            // Update tampilan ongkos kirim
            document.getElementById('shippingCost').textContent = 'Rp ' + shippingCost.toLocaleString('id-ID');
            
            // Update total keseluruhan
            const finalTotal = subTotal + shippingCost;
            document.getElementById('finalTotal').textContent = 'Rp ' + finalTotal.toLocaleString('id-ID');
            
            // Update info pengiriman
            document.getElementById('shippingInfo').innerHTML = '<strong>' + selectedShipping + '</strong>';
            
            // Enable/disable checkout button
            document.getElementById('checkoutBtn').disabled = shippingCost === 0;
        }
        
        // Disable checkout button initially
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('checkoutBtn').disabled = true;
        });
    </script>

</body>
</html>