<?php
    
    include "koneksi.php";

    session_start();

    if (isset($id_user)) {
        $id_user = $_SESSION['id_user'];
    } else{
        $id_user = '';
    };

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
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    
    <?php include "user_header.php"; ?>

    <!-- home section start -->
<section class="home" id="home">
    <div class="slides-container">
        <div class="slide">
            <div class="img">                                 
                <div><img src="image\Rectangle 19(1).png" alt="" class="cake" ></div>
                <div><img src="image\Menu_waifu2x_art_noise1 1.png" alt="" class="grid"></div>
                <div><img src="image\Selamat Datang di.png" alt="" class="welcome"></div>
                <div><img src="image\Line 1.png" alt="" class="left"></div>
                <div><img src="image\Line 2(1).png" alt="" class="right"></div>
                <div><img src="image\222.png" alt="" class="front"></div>
                <div><img src="image\stu.png" alt="" class="back"></div>
            </div>
        </div>
    </div>
</section>


<section class="topdecoration" id="topdecoration">
<div class="page-top-decoration" id="produk"></div>
    
    <div class="container">
        <div class="duwa">
            <h1>Dari Kami Untuk Kamu Nikmati</h1>
            <p>Jelajahi berbagai produk pastry buatan kami yang kaya rasa, lembut, dan manis kaya kamu. 
            Rasakan tiap kelezatan pastry kami untuk membangkitkan keceriaan dalam diri.</p>
            
            <a href="product.php" class="btn-katalog">Katalog</a>
        </div>
        
        <div class="pastry-gallery">
            <div class="pastry-item">
                <img src="image\one.png" >
            </div>
            <div class="pastry-item">
                <img src="image\two.png" >
            </div>
            <div class="pastry-item">
                <img src="image\three.png" >
            </div>
            <div class="pastry-item">
                <img src="image\four.png" >
            </div>
            <div class="pastry-item">
                <img src="image\five.png" >
            </div>
        </div>
    </div>
</section>

<section class="prdk" id="prdk">
    <div class="prdk">
        <div class="pala">
            <h1>Our Featured Product</h1>
            <a href="product.php"><button class="btn-lainnya">Lainnya</button></a>
        </div>
        
    <div class="divider"></div>
        
        
        <div class="product-carousel">
                
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-title">Mille-Feuille</div>
                <img src="image\j.png" alt="Strawberry Cake" class="product-image">
                <div class="rating">
                    <span class="star">★★★★</span>
                    <span class="star" style="color: #ddd;">★</span>
                    <div class="price">Rp 180.000,00</div>
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
            
            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-title">Danish Pastry</div>
                <img src="image\p.png" alt="Strawberry Cake" class="product-image">
                <div class="rating">
                    <span class="star">★★★★</span>
                    <span class="star" style="color: #ddd;">★</span>
                    <div class="price">Rp 180.000,00</div>
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
            
            <!-- Product 3 (Active Product) -->
            <div class="product-card ">
                <div class="product-title">Croissant</div>
                <img src="image\ccl.png" alt="Choco Lava Croissant" class="product-image">
                <div class="rating">
                    <span class="star">★★★★</span>
                    <span class="star" style="color: #ddd;">★</span>
                    <div class="price">Rp 180.000,00</div>
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
            
            <!-- Product 4 -->
            <div class="product-card">
                <div class="product-title">Pie</div>
                <img src="image\g.png" alt="Strawberry Cake" class="product-image">
                <div class="rating">
                    <span class="star">★★★★</span>
                    <span class="star" style="color: #ddd;">★</span>
                    <div class="price">Rp 180.000,00</div>
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
            
            <!-- Product 5 -->
            <div class="product-card">
                <div class="product-title">Choux</div>
                <img src="image\puff pastry fruit tarts _3 1(1).png" alt="Strawberry Cake" class="product-image">
                <button class="rating">
                    <span class="star">★★★★</span>
                    <span class="star" style="color: #ddd;">★</span>
                    <div class="price">Rp 180.000,00</div>
                </button>              
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

            <div class="butt">
                <button id="nele" class="fa-solid fa-angle-left"></button>
                <button id="neri" class="fa-solid fa-angle-right"></button>
            </div>
            
        </div>
    </div>
</section>

<section class="neks" id="neks">
    <div class="next">
        <div class="picture">
            <img src="image\Rectangle 17(1).png" alt="" width="300" height="350" class="behind">
            <img src="image\Chocolate eclairs(1).png" alt="" width="280px" height="290px" class="num1">
            <img src="image\wkwk.png" alt="" width="280px" height="290px" class="num2">
        </div>

        <div class="content">
            <div class="heading">
                <div class="row">
                    <span class="text-utama">KUNJUNGI</span>
                    <span class="text-samping">PASTRY</span>
                </div>
                <div class="row">                   
                    <span class="text-samping-y">CORNER</span>
                    <span class="text-utama">SEKARANG</span>
                </div>
                
            </div>
            <p class="description">
                Berawal dari satu hingga ke seribu. Outlet Aikey Bakery kini
                sudah tersebar di hampir seluruh Indonesia. Telah tersebar
                ke 10 provinsi dan 34 kota dengan total 57 gerai. Temukan
                cabang Aikey Bakery terdekat anda dan tunggu kami untuk
                segera hadir di seluruh penjuru Indonesia.
            </p>
            <a href="dekstop6.html" class="button" id="findLocation">Jelajahi</a>
        </div>
    </div>
</section>

<section class="sout" id="sout">
    <div class="sout">
        <div class="foto">
            <div><img src="image\Desain tanpa judul (6) 1(1).png" alt="" class="bkg"></div>
            <div><img src="image\y.png" alt="" class="cro"></div>
            <div><img src="image\bll.png" alt="" class="blu"></div>
            <div><img src="image\kk.png" alt="" class="bblo"></div>
        </div>
        <div class="kon">
            <div class="ding">
                <div class="rr">
                    <span class="TU">KONSISTEN</span>
                    <span class="TU">MENJAGA</span>
                </div>
                <div class="rr">
                    <span class="TS">KUALITAS</span>
                    <span class="TU">DAN</span>
                    <span class="TS">CITA</span>
                </div>
                <div class="rr">
                    <span class="TS">RASA</span>
                </div>
            </div>
            <p class="des">
                Sejak awal berdiri kami selalu mengutamakan kepuasan dan 
                kesenangan konsumen. Kami selalu konsisten dalam soal kualitas 
                produk dan cita rasa. Setiap produk yang kami hasilkan selalu 
                menggunakan bahan baku terbaik dan dibuat dengan penuh cinta 
                untuk menghasilkan cita rasa yang bisa dinikmati oleh semua 
                generasi. Kualitas yang selalu terjagalah yang menarik konsumen dari 
                seluruh penjuru Indonesia untuk menjadi konsumen setia kami.
            </p>
            <div class="stats-container">
                <div class="stat-box">
                    <p class="stat-number">20.000</p>
                    <p class="stat-label">Item Terjual</p>
                </div>
                
                <div class="stat-box">
                    <p class="stat-number">1.000</p>
                    <p class="stat-label">Member Aktif</p>
                </div>
                
                <div class="stat-box">
                    <p class="stat-number">700</p>
                    <p class="stat-label">Kata Konsumen</p>
                </div>
            </div>
    </div>
</section>

    <section class="testimonial-section" id="testimonial-section">
    <div class="onta">
        <h1>APA KATA MEREKA?</h1>
        
        <div class="testimonials">
            <!-- Testimonial 1 -->
            <div class="testimonial-cardsatu">
                <div class="card-back"></div>
                <div class="card-front">
                    <div class="quote-mark">
                        <img src="image\Ellipse 12(1).png" alt="" class="cok">
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                    <div class="rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty-star">★</span>
                    </div>
                    <p class="testimonial-text">
                        Lorem Ipsum Dollor Sit Amet, Consectectur Adispicing Elite
                    </p>
                    <div class="author">
                        <svg class="author-pic" viewBox="0 0 24 24" fill="none" stroke="#5d5343" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="9" r="3"></circle>
                            <path d="M6.168 18.849A4 4 0 0 1 10 16h4a4 4 0 0 1 3.834 2.855"></path>
                        </svg>
                        <div class="author-info">
                            <span class="author-name">aisa</span>
                            <span class="author-username">@aisalth</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="testimonial-carddua">
                <div class="card-back"></div>
                <div class="card-front">
                    <div class="quote-mark">
                        <img src="image\Ellipse 12(1).png" alt="" class="cok">
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                    <div class="rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty-star">★</span>
                    </div>
                    <p class="testimonial-text">
                        Lorem Ipsum Dollor Sit Amet, Consectectur Adispicing Elite
                    </p>
                    <div class="author">
                        <svg class="author-pic" viewBox="0 0 24 24" fill="none" stroke="#5d5343" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="9" r="3"></circle>
                            <path d="M6.168 18.849A4 4 0 0 1 10 16h4a4 4 0 0 1 3.834 2.855"></path>
                        </svg>
                        <div class="author-info">
                            <span class="author-name">aisa</span>
                            <span class="author-username">@aisalth</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="testimonial-cardtiga">
                <div class="card-back"></div>
                <div class="card-front">
                    <div class="quote-mark">
                        <img src="image\Ellipse 12(1).png" alt="" class="cok">
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                    <div class="rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty-star">★</span>
                    </div>
                    <p class="testimonial-text">
                        Lorem Ipsum Dollor Sit Amet, Consectectur Adispicing Elite
                    </p>
                    <div class="author">
                        <svg class="author-pic" viewBox="0 0 24 24" fill="none" stroke="#5d5343" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="9" r="3"></circle>
                            <path d="M6.168 18.849A4 4 0 0 1 10 16h4a4 4 0 0 1 3.834 2.855"></path>
                        </svg>
                        <div class="author-info">
                            <span class="author-name">aisa</span>
                            <span class="author-username">@aisalth</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 4 -->
            <div class="testimonial-cardempat">
                <div class="card-back"></div>
                <div class="card-front">
                    <div class="quote-mark">
                        <img src="image\Ellipse 12(1).png" alt="" class="cok">
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                    <div class="rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty-star">★</span>
                    </div>
                    <p class="testimonial-text">
                        Lorem Ipsum Dollor Sit Amet, Consectectur Adispicing Elite
                    </p>
                    <div class="author">
                        <svg class="author-pic" viewBox="0 0 24 24" fill="none" stroke="#5d5343" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="9" r="3"></circle>
                            <path d="M6.168 18.849A4 4 0 0 1 10 16h4a4 4 0 0 1 3.834 2.855"></path>
                        </svg>
                        <div class="author-info">
                            <span class="author-name">aisa</span>
                            <span class="author-username">@aisalth</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="aneka" id="aneka">
    <div class="aneka">
        <div class="ktr">
            <img src="image\4(1).png" alt="" class="kiri">
            <img src="image\5(1).png" alt="" class="lele">
            <img src="image\1 1(1).png" alt="" class="tgh">
            <img src="image\3(2).png" alt="" class="nana">
            <img src="image\2(1).png" alt="" class="kanan">
        </div>
    </div>
</section>

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
    
    <script src="index.js"></script>
</body>
</html>