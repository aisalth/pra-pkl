<?php
   include "koneksi.php";

    session_start();

    if (isset($id_user)) {
        $id_user = $_SESSION['id_user'];
    } else{
        $id_user = '';
    };

   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }

?>

<style>
   .message {
    position: sticky;
    top: 0;
    background-color: #f1f1f1; /* Warna abu terang */
    max-width: 100%;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1100;
    border-bottom: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    font-family: sans-serif;
   }

   .message span {
      font-size: 16px;
      color: #333;
   }

   .message i {
      cursor: pointer;
      color: red;
      font-size: 18px;
   }

   .message i:hover {
      color: #000;
   }

   .message {
      animation: fadeIn 0.3s ease;
   }

   @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
   }

   .header .profile {
   position: absolute;
   top: 120%; 
   right: 2rem;
   background-color: #5E5344;
   border-radius: 0.5rem;
   box-shadow: var(--box-shadow);
   border: var(--border);
   padding: 2rem;
   width: 30rem;
   padding-top: 1.2rem;
   display: none;
   animation: fadeIn 0.2s linear;
   z-index: 1000;
}

.header .profile.active {
   display: block; 
}

.header .profile p {
   text-align: center;
   color: white;
   font-size: 2rem;
   margin-bottom: 1rem;
   font-weight: 500;
}

.header .profile .btn,
.header .profile .option-btn,
.header .profile .delete-btn {
   display: block;
   width: 100%;
   text-align: center;
   padding: 0.8rem 1.5rem;
   margin: 0.5rem 0;
   border-radius: 0.3rem;
   text-decoration: none;
   transition: all 0.3s ease;
   font-size: 1.4rem;
}

.header .profile .btn {
   background-color: var(--main-color, #3498db);
   color: white;
}

.header .profile .btn:hover {
   background-color: var(--main-color-dark, #2980b9);
   transform: translateY(-2px);
}

.header .profile .flex-btn {
   display: flex;
   gap: 1rem;
   margin: 1rem 0;
}

.header .profile .flex-btn .option-btn {
   flex: 1;
   background-color: var(--light-bg, #f8f9fa);
   color: var(--black);
   border: 1px solid var(--border-color, #dee2e6);
}

.header .profile .flex-btn .option-btn:hover {
   background-color: var(--main-color, #3498db);
   color: white;
   border-color: var(--main-color, #3498db);
}

/* Logout button */
.header .profile .delete-btn {
   background-color: var(--red, #e74c3c);
   color: white;
   margin-top: 1rem;
}

.header .profile .delete-btn:hover {
   background-color: var(--red-dark, #c0392b);
   transform: translateY(-2px);
}

@media (max-width: 768px) {
   .header .profile {
      width: calc(100vw - 4rem);
      right: 2rem;
      left: 2rem;
      max-width: 30rem;
   }
   
   .header .profile .flex-btn {
      flex-direction: column;
      gap: 0.5rem;
   }
}

@keyframes fadeIn {
   from {
      opacity: 0;
      transform: translateY(-10px);
   }
   to {
      opacity: 1;
      transform: translateY(0);
   }
}

.header .profile {
   transition: all 0.3s ease;
}

.header .profile.active {
   animation: slideDown 0.3s ease forwards;
}

@keyframes slideDown {
   from {
      opacity: 0;
      transform: translateY(-20px) scale(0.95);
   }
   to {
      opacity: 1;
      transform: translateY(0) scale(1);
   }
}

/* Container untuk semua produk */
.products-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    padding: 20px;
    max-width: 1400px;
    margin: 20px auto 0;
    background: #f8f9fa;
    min-height: 400px;
}

/* Styling khusus untuk area produk di bawah search */
.search-results-section {
    width: 100%;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e0e0e0;
}

/* Styling untuk setiap produk box */
.box {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    padding: 12px;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    text-align: center;
    max-width: 220px;
    margin: 0 auto;
}

.box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

/* Tombol wishlist dan quick view */
.box .fas.fa-heart,
.box .fas.fa-eye {
    position: absolute;
    top: 8px;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: none;
    background: rgba(255, 255, 255, 0.9);
    color: #666;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 12px;
}

.box .fas.fa-heart {
    right: 38px;
}

.box .fas.fa-eye {
    right: 8px;
}

.box .fas.fa-heart:hover {
    background: #ff6b6b;
    color: white;
}

.box .fas.fa-eye:hover {
    background: #4ecdc4;
    color: white;
}

/* Gambar produk */
.box img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    border-radius: 6px;
    margin-bottom: 10px;
}

/* Nama produk */
.box .nama {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.3;
    height: 36px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

/* Container untuk harga dan quantity */
.box .flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    gap: 8px;
}

/* Styling harga */
.box .harga {
    font-size: 15px;
    font-weight: 700;
    color: #2c3e50;
}

.box .harga span {
    font-size: 12px;
    color: #666;
}

/* Input quantity */
.box .qty {
    width: 50px;
    height: 30px;
    border: 2px solid #e0e0e0;
    border-radius: 4px;
    text-align: center;
    font-size: 12px;
    font-weight: 600;
}

.box .qty:focus {
    outline: none;
    border-color: #4ecdc4;
}

/* Tombol add to cart */
.box .btn {
    width: 100%;
    padding: 8px 15px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.box .btn:hover {
    background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
    transform: translateY(-2px);
}

/* Pesan empty */
.empty {
    grid-column: 1 / -1;
    text-align: center;
    padding: 40px;
    color: #666;
    font-size: 18px;
    background: #f8f9fa;
    border-radius: 12px;
    margin: 20px 0;
}

/* Responsive design */
@media (max-width: 768px) {
    .products-container {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 12px;
        padding: 15px;
    }
    
    .box {
        padding: 10px;
        max-width: 190px;
    }
    
    .box img {
        height: 120px;
    }
    
    .box .nama {
        font-size: 13px;
        height: 32px;
    }
    
    .box .harga {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .products-container {
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 10px;
        padding: 10px;
    }
    
    .box {
        padding: 8px;
        max-width: 170px;
    }
    
    .box img {
        height: 100px;
    }
    
    .box .nama {
        font-size: 12px;
        height: 30px;
    }
    
    .box .harga {
        font-size: 13px;
    }
    
    .box .qty {
        width: 45px;
        height: 28px;
    }
    
    .box .btn {
        font-size: 11px;
        padding: 6px 12px;
    }
}
</style>

<header class="header">
   
        <a href="" class="logo"><img src="image\222.png" ></a>
        <nav class="navbar">
            <a href="index.php">Beranda</a>
            <a href="product.php">Produk</a>
            <a href="tentang.php">Tentang</a>
            <a href="review.php">Review</a>
            <a href="pesanan.php">Kontak</a>
        </nav>
        <div class="icons" id="icons">
         <div id="user-btn"><i class="fa-regular fa-circle-user"></i></div></a>
            <a href="wishlist.html"><div id="heart-icon"><i class="fa-regular fa-heart"></i></div></a>
            <a href="cart.html"><div id="shopping-cart-icon"><i class="fa-solid fa-cart-shopping"></i></div></a>
           <a href="search.php"><div id="search-icon" ><i class="fa-solid fa-magnifying-glass"></i></div></a>
           <div id="menu-btn"><i class="fa-solid fa-bars"></i></div>
        </div>

        <div class="search-form">
            <input type="search" name="search" id="search-box" placeholder="cari disini...">
            <label for="search-box" class="fa-solid fa-magnifying-glass"></label>
        </div>

        
        <div class="profile">
         <?php          
            $select_profile = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
            if(mysqli_num_rows ($select_profile) > 0){
                while($user = mysqli_fetch_assoc($select_profile)){
         ?>
         <p>Selamat Datang, <?= $user["username"];?></p>
         <a href="user_profile.php?user=<?= $user['id_user']; ?>" class="btn">update profile</a>
         <a href="logout.php" class="delete-btn" onclick="return confirm('logout dari website?');">logout</a> 
         <?php
            }
         ?>
         <?php
            }else{
         ?>
         <p>Silahkan Login</p>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

    </header>

    <script>
      let navbar = document.querySelector('.navbar');
      let profile = document.querySelector('.profile');

      document.querySelector('#menu-btn').onclick = () =>{
         navbar.classList.toggle('active');
         profile.classList.remove('active');
      }

      document.querySelector('#user-btn').onclick = () =>{
         profile.classList.toggle('active');
         navbar.classList.remove('active');
      }        

      window.onscroll = () =>{
         navbar.classList.remove('active');
         profile.classList.remove('active');
      }

    </script>

   