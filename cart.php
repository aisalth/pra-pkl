<?php
    include "koneksi.php";


    if(isset($_POST['update_qty'])){
        $id_product = $_POST['id_product'];
        $quantity = $_POST['quantity'];

        $select_cart = mysqli_query($koneksi, "SELECT * FROM cart WHERE id_product = '$id_product'");

        if(mysqli_num_rows($select_cart) > 0){
            $update_qty = mysqli_query($koneksi, "UPDATE `cart` SET quantity = '$quantity' WHERE id_product = '$id_product'");
        }


        // $message[] = 'jumlah keranjang diperbarui';
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="dekstop14.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <a href="" class="logo"><img src="c:\Users\ASUS\Downloads\222.png" ></a>
        <nav class="navbar">
            <a href="index.html#home">Beranda</a>
            <a href="index.html#topdecoration">Produk</a>
            <a href="index.html#sout">Tentang</a>
            <a href="index.html#testimonial-section">Review</a>
            <a href="index.html#neks">Kontak</a>
        </nav>
        <div class="icons">
           <div id="user-icon"><i class="fa-regular fa-circle-user"></i></div>
           <div id="heart-icon"><i class="fa-regular fa-heart"></i></div>
           <div id="shopping-cart-icon"><i class="fa-solid fa-cart-shopping"></i></div>
           <div id="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
           <div id="menu-btn"><i class="fa-solid fa-bars"></i></div>
        </div>

        <div class="search-form">
            <input type="search" name="search" id="search-box" placeholder="cari disini...">
            <label for="search-box" class="fa-solid fa-magnifying-glass"></label>
        </div>

    </header>


    <div class="er">
        <h1>Keranjang</h1>
    </div>
    <div class="container">
        
        <div class="cart-container">
            <div class="select-all">
                <label>
                    <input type="checkbox" id="select-all-checkbox" checked>
                    <span>Pilih Semua</span>
                </label>
                <button class="hapus-btn">Hapus</button>
            </div>
            
            <div class="items-list">
                
                <!-- Item 1 -->
                 <?php 
                    $grandTotal = 0;
                    $select_cart = mysqli_query($koneksi, "SELECT * FROM cart");
                    if(mysqli_num_rows($select_cart) > 0){
                        while($cart = mysqli_fetch_assoc($select_cart)){

                 ?>
                 <form class="item" method="post">
                    <input type="hidden" name="id_cart" value="<?= $cart['id_cart']; ?>">
                    <input type="hidden" name="id_product" value="<?= $cart['id_product']; ?>">
                    <input type="checkbox" class="item-checkbox" checked>
                    <img src="product_image/<?= $cart['gambar']; ?>" alt="Croissant" class="item-image">
                    <div class="item-details">
                        <div class="item-name"><?= $cart['nama']; ?></div>
                        <!-- <div class="item-variant"><?= $cart['']; ?></div> -->
                        <div class="item-price">Rp <?= $cart['harga']; ?></div>
                    </div>
                    <div class="item-actions">
                        <button class="action-btn delete-btn"><i class="fa-regular fa-trash-can"></i></button>
                        
                        <div class="quantity-control">
                            <button class="action-btn decrease-btn update_qty" name="update_qty">-</button>
                            <input type="number" class="quantity-input" name="quantity" value="<?= $cart['quantity']; ?>" readonly>
                            <button class="action-btn increase-btn update_qty" name="update_qty">+</button>
                        </div>
                    </div>
                </div>
                </form>
                <?php 
                    $total = ($cart['harga'] * $cart['quantity']);
                    $grandTotal += $total ;
                        }
                    }
                ?>
                
            </div>
        </div>
    </div> 

    <!-- Summary Section -->
    <div class="summary-section">
        <div class="summary-ine">
            <div class="summary-row">
                <span>Sub Total</span>
                <span>Rp <?= $grandTotal ?></span>
            </div>
            <button class="checkout-btn" id="openModal">Pesan Sekarang</button>
        </div>
    </div>
</div>

<div class="modal" id="modal">
    <div class="modal-inner">
        <h2>Silahkan Opsi Pembelian</h2>
        <div class="delivery">
            <a href="checkout_delivery.php">
                <i class="fa-solid fa-truck-fast"></i>
                <span>Delivery</span>
            </a>
        </div>
        <div href="checkout_pickup.html" class="pick-up">
            <a href="checkout_pickup.php">
                <i class="fa-solid fa-truck-fast"></i>
                <span>Ambil Di Tempat</span>
            </a>
        </div>
        <button id="closeModal">x</button>
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
                    <li><a href="index.html#sout">Tentang Kami</a></li>
                    <li><a href="index.html#testimonial-section">Review</a></li>
                    <li><a href="index.html#neks">Lokasi</a></li>
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
    
        <script src="dekstop14.js"></script>
</body>
</html>