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

        <div class="profile">
         <?php          
            $select_profile = mysqli_query($koneksi, "SELECT * FROM user");
            if(mysqli_num_rows ($select_profile) > 0){
                while(mysqli_fetch_assoc($select_profile)){
         ?>
         <p><?= $user["nama"];?></p>
         <a href="update_user.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php
            }
         ?>
         <?php
            }else{
         ?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

    </header>