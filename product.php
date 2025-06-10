<?php
    session_start();
    include "koneksi.php";

    $id_user = $_SESSION['id_user'];

    if(!isset($id_user)){
        header('location:login.php');
    }
    
    // Add to cart
    if(isset($_POST['add_to_cart'])){
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $gambar = $_POST['gambar'];
        $quantity = 1;
        $id_product = $_POST['id_product'];

        // Check if product already in cart
        $select_cart = mysqli_query($koneksi, "SELECT * FROM cart WHERE id_product = '$id_product'");

        if(mysqli_num_rows($select_cart) > 0){
            // Update quantity if exists
            mysqli_query($koneksi, "UPDATE cart SET quantity = quantity + 1 WHERE id_product = '$id_product");
            $message[] = "Produk ditambahkan ke keranjang";
        } else {
            // Insert new product to cart
            mysqli_query($koneksi, "INSERT INTO cart(nama, harga, quantity, gambar, id_product) VALUES('$nama', '$harga', '$quantity', '$gambar', '$id_product')");
            $message[] = "Produk telah ditambahkan ke keranjang";
        }
    }

    // Add to wishlist
    if(isset($_POST['add_to_fav'])){
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $gambar = $_POST['gambar'];
        $id_product = $_POST['id_product'];

        // Check if product already in wishlist
        $select_fav = mysqli_query($koneksi, "SELECT * FROM wishlist WHERE id_product = '$id_product'");

        if(mysqli_num_rows($select_fav) > 0){
            $message[] = "Produk sudah ada di wishlist";
        } else {
            // Insert new product to wishlist
            mysqli_query($koneksi, "INSERT INTO wishlist(nama, harga, gambar, id_product) VALUES('$nama', '$harga', '$gambar', '$id_product')");
            $message[] = "Produk telah ditambahkan ke wishlist";
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
    <link rel="stylesheet" href="dekstop2.css">
    <title>Beranda</title>
</head>
<body>

    <?php include "user_header.php"; ?>

    <div class="container">
        <div class="image-wrapper">
            <img src="c:\Users\ASUS\Downloads\Sweet art bakery.png" alt="Image 1">
        </div>
        <div class="image-wrapper">
            <img src="c:\Users\ASUS\Downloads\Explore the New Standard in Photo Licensing on Stills_com.png" alt="Image 2">
        </div>
        <div class="image-wrapper">
            <img src="c:\Users\ASUS\Downloads\🥐.png" alt="Image 3">
        </div>
        <div class="image-wrapper">
            <img src="c:\Users\ASUS\Downloads\Fashion Snoops.png" alt="Image 4">
        </div>
        <div class="grada">
            <img src="c:\Users\ASUS\Downloads\Rectangle 21.png" alt="" class="trans">
        </div>
    </div>
    <h1 class="hero-text">FROM OUR OVEN<br>TO YOUR TABLE</h1>

    <div class="kontener">
        <div class="khusuh">
            <div class="sidebar">
                <img src="c:\Users\ASUS\Downloads\Line 5.png" alt="" class="line">
                
                <div class="menu-item" id="croissant-item">
                    <p>Croissant</p> <i class="satu"><i class="fa-solid fa-angle-down"></i></i>
                </div>
                <div class="submenu" id="croissant-submenu">
                    <div class="submenu-item">bisscoff cookie croissant</div>
                    <div class="submenu-item">lemon meringue croissant</div>
                    <div class="submenu-item">mango cream croissant</div>
                    <div class="submenu-item">mentaiko croissant</div>
                    <div class="submenu-item">thai milk tea croissant</div>
                </div>

                <div class="menu-item" id="pie-item">
                    <p>Pie</p> <i class="dua"><i class="fa-solid fa-angle-down"></i></i>
                </div>
                <div class="submenu" id="pie-submenu">
                    <div class="submenu-item">Pie Strawberry</div>
                    <div class="submenu-item">Pie Apple</div>
                    <div class="submenu-item">Pie Raspberry</div>
                    <div class="submenu-item">Pie Blueberry</div>
                    <div class="submenu-item">Pie Nanas</div>
                </div>

                <div class="menu-item" id="choux-item">
                    <p>Choux</p> <i class="tiga"><i class="fa-solid fa-angle-down"></i></i>
                </div>
                <div class="submenu" id="choux-submenu">
                    <div class="submenu-item">Choux Tiramisu</div>
                    <div class="submenu-item">Choux Coklat</div>
                    <div class="submenu-item">Choux Vanila</div>
                    <div class="submenu-item">Choux Anggur</div>
                    <div class="submenu-item">Choux Kopi</div>
                </div>

                <div class="menu-item" id="danish-item">
                    <p>Danish Pastry</p> <i class="empat"><i class="fa-solid fa-angle-down"></i></i>
                </div>
                <div class="submenu" id="danish-submenu">
                    <div class="submenu-item">Danish Pastry Pisang</div>
                    <div class="submenu-item">Danish Pastry Melon</div>
                    <div class="submenu-item">Danish Pastry Kiwi</div>
                    <div class="submenu-item">Danish Pastry Nanas</div>
                    <div class="submenu-item">Danish Pastry Pepaya</div>
                </div>

                <div class="menu-item" id="mille-item">
                    <p>Mille Feuille</p> <i class="lima"><i class="fa-solid fa-angle-down"></i></i>
                </div>
                <div class="submenu" id="mille-submenu">
                    <div class="submenu-item">Mille Feuille Coklat</div>
                    <div class="submenu-item">Mille Feuille Strawberry</div>
                    <div class="submenu-item">Mille Feuille Tiramisu</div>
                    <div class="submenu-item">Mille Feuille Vanila</div>
                    <div class="submenu-item">Mille Feuille Kopi</div>
                </div>
            </div>
        </div>
    
        <div class="divider"></div>
        
        <div class="product-carousel">
            <?php
            $select_product = mysqli_query($koneksi, "SELECT * FROM products");
            if(mysqli_num_rows($select_product) > 0){
                while($product = mysqli_fetch_assoc($select_product)) {
            ?>
            <div class="product-area">
                <a href="detail_product.php?detail=<?= $product['id_product']; ?>">
                    <img src="product_image/<?= $product['gambar']; ?>" alt="" class="product-image">
                    <div class="product-title"><?= $product['nama']; ?></div>
                    <div class="rating">
                        <span class="star">★★★★</span>
                        <span class="star" style="color: #ddd;">★</span> 
                        <div class="price">Rp <?= number_format($product['harga']) ?></div>
                    </div>
                </a>
                
                <!-- Buttons Form -->
                <form action="" method="POST">
                    <input type="hidden" name="id_product" value="<?= $product['id_product']; ?>">
                    <input type="hidden" name="gambar" value="<?= $product['gambar'] ?>">
                    <input type="hidden" name="nama" value="<?= $product['nama'] ?>">
                    <input type="hidden" name="harga" value="<?= $product['harga'] ?>">
                    
                    <div class="button-group">
                        <button type="submit" name="add_to_fav" class="btn-favorite">♡</button>
                        <button type="submit" name="add_to_cart" class="btn-cart">Add to Cart</button>
                    </div>
                </form>
            </div>
            <?php
                }
            }
            ?>

            <!-- Indicator dots -->
            <div class="indicator-dots">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
                <span class="dot" data-index="3"></span>
                <span class="dot" data-index="4"></span>
            </div>
        </div>
    </div>

    <div class="keranjang">
        <h1>Keranjang</h1>
        <div class="daftarBrg"></div>
        <div class="btn"></div>
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

    <script src="dekstop2.js"></script>
</body>
</html>