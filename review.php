<?php
    session_start();
    include "koneksi.php";

    $id_user = $_SESSION['id_user'];

    if(!isset($id_user)){
        header('location:login.php');
    }

    if(isset($_POST['kirim'])){
        $message = $_POST['message'];

        $query = mysqli_query($koneksi, "INSERT INTO review (id_user, pesan, tanggal) VALUES ('$id_user', '$message', now())");
        if($query){
            header("location:review.php?berhasil");
            // $message[] = 'berhasil mengirim review';
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
    <link rel="stylesheet" href="review.css">
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

    <section class="home" id="home">
        <div class="slides-container">
            <div class="slide">
                <div class="img">                                 
                    <div><img src="image\Rectangle 22.png" alt="" class="gragra" ></div>
                    <div><img src="image\Bakery shop aesthetic croissants 1.png" alt="" class="inti"></div>
                    <div><img src="image\corner 4(1).png" alt="" class="dpn"></div>
                </div>
            </div>
        </div>
    </section>

    <div class="testimonials">
            <!-- Testimonial 1 -->
            
                <?php
                    $select_review = mysqli_query($koneksi, "SELECT nama, username, pesan FROM user JOIN review ON user.id_user = review.id_user");
                    while($review = mysqli_fetch_assoc($select_review)){
                ?>
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
                        <?= $review['pesan']; ?>
                    </p>
                    <div class="author">
                        <svg class="author-pic" viewBox="0 0 24 24" fill="none" stroke="#5d5343" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="9" r="3"></circle>
                            <path d="M6.168 18.849A4 4 0 0 1 10 16h4a4 4 0 0 1 3.834 2.855"></path>
                        </svg>
                        <div class="author-info">
                            <span class="author-name"><?= $review['nama'] ?></span>
                            <span class="author-username">@<?= $review['username'] ?></span>
                        </div>
                    </div>
                </div>
                </div>
                <?php } ?>
            
</div>

    <div class="contact-container">
        <div class="contact-info">
            <h2>Get <span>in Touch!</span></h2>
            <p class="contact-description">Our detail contact</p>
            <p class="contact-text">Hubungi tim service kami untuk</p>
            <p class="contact-text">menyampaikan tiap pertanyaan, kritik, dan</p>
            <p class="contact-text">saran anda untuk kami.</p>
            <div class="divider"></div>
            
            <div class="contact-method">
                <div class="icon-circle">
                    <a href="https://web.whatsapp.com/" class="social-icon"><i class="fa-solid fa-phone"></i></i></a>
                </div>
                <div class="contact-detail">
                    <p>Phone/WhatsApp</p>
                    <p>+62 838-4664-3602</p>
                </div>
            </div>
            
            <div class="horizontal-line"></div>
            
            <div class="contact-method">
                <div class="icon-circle">
                    <a href="https://mail.google.com/mail/u/0/#inbox" class="social-icon"><i class="fa-regular fa-envelope"></i></i></i></a>
                </div>
                <div class="contact-detail">
                    <p>Email Support</p>
                    <p>cs@pasner.com</p>
                </div>
            </div>
            
            <div class="horizontal-line"></div>
            
            <div class="social-links">
                <a href="https://www.instagram.com/" class="social-i"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.tiktok.com/" class="social-i"><i class="fa-brands fa-tiktok"></i></a>
                <a href="https://x.com/" class="social-i"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://www.youtube.com/" class="social-i"><i class="fa-brands fa-youtube"></i></a>
            </div>

            <div class="horizontal-liner"></div>
        </div>
        
        <div class="contact-form">
            <h2>Berikan Review</h2>
            <form method="post" action="">
                <div>
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                
                <button type="submit" name="kirim">Kirim</button>
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

    <script src="dekstop4.js"></script>
</body>
</html>