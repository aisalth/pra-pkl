<?php

    include "koneksi.php";

        if(isset($_POST['add_product'])){

        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $id_kategori = $_POST['id_kategori'];
        $deskripsi = $_POST['deskripsi'];

        $gambar = $_FILES['gambar']['name'];
        $gambar_size = $_FILES['gambar']['size'];
        $gambar_tmp_name = $_FILES['gambar']['tmp_name'];
        $gambar_folder = 'product_image/'.$gambar;

        $select_products = mysqli_query($koneksi, "SELECT * FROM products WHERE nama = '$nama'");

        if($select_products = mysqli_num_rows($select_products) > 0){
            $message[] = 'nama produk sudah ada!';
        }else{

            $insert_products = mysqli_query($koneksi, "INSERT INTO products(gambar, nama, harga, stok, deskripsi, id_kategori) VALUES('$gambar', '$nama', '$harga', '$stok', '$deskripsi', '$id_kategori')");

            if($insert_products){
                if($gambar_size > 2000000){
                    $message[] = 'ukuran gambar terlalu besar!';
                }else{
                    move_uploaded_file($gambar_tmp_name, $gambar_folder);
                    $message[] = 'produk baru ditambahkan!';
                }

            }

            }
        }


    if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_gambar = mysqli_query($koneksi, "SELECT * FROM products WHERE id_product = '$delete_id'");
   $fetch_delete_image = mysqli_fetch_assoc($delete_product_gambar);
   unlink('product_image/'.$fetch_delete_image['gambar']);
   $delete_product = mysqli_query($koneksi, "DELETE FROM products WHERE id_product = '$delete_id'");
   $delete_cart =  mysqli_query($koneksi, "DELETE FROM products WHERE id_product = '$delete_id'");
    $delete_wishlist = mysqli_query($koneksi, "DELETE FROM wishlist WHERE id_product = '$delete_id'");;
   header('location:admin_product.php');
}

include "message_alert.php";
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
    <link rel="stylesheet" href="dekstop20.css">
    <title>Document</title>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Dashboard</h2>
        </div>
        <div class="sidebar-menu">
            <a href="#dashboard" class="menu-item">
                <img src="c:\Users\ASUS\Downloads\key-square (2).svg" alt="" class="key-square">
                <span class="menu-item-text">Dashboard</span>
            </a>
            <a href="dekstop20.html" class="menu-item">
                <img src="c:\Users\ASUS\Downloads\3d-cube-scan (1).svg" alt="" class="cube">
                <span class="menu-item-text">Produk</span>
                <i class="fas fa-chevron-right arrow"></i>
            </a>
            <a href="dekstop19,2.html" class="menu-item active">
                <i class="far fa-user"></i>
                <span class="menu-item-text">Pelanggan</span>
                <i class="fas fa-chevron-right arrow"></i>
            </a>
            <a href="dekstop23.html" class="menu-item">
                <img src="c:\Users\ASUS\Downloads\wallet-money (1).svg" alt="" class="wallet-money">
                <span class="menu-item-text">Pesanan</span>
                <i class="fas fa-chevron-right arrow"></i>
            </a>
            <a href="#review" class="menu-item">
                <span class="menu-item-text">Review</span>
                <i class="fas fa-chevron-right arrow"></i>
            </a>
            <a href="dekstop24.html" class="menu-item">
                <span class="menu-item-text">Pesan</span>
                <i class="fas fa-chevron-right arrow"></i>
            </a>
        </div>
        <div class="sidebar-footer">
            <div class="admin-profile">
                <div class="admin-avatar"></div>
                <div class="admin-info">
                    <div class="admin-name">Aisyah</div>
                    <div class="admin-role">Admin</div>
                </div>
                <i class="fas fa-chevron-down arrow"></i>
            </div>
        </div>
    </div>

    <div class="content">
        <!-- Content goes here -->
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <div class="greeting">
                Hello Aisyah <span>👋</span>
            </div>
            <div class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search">
            </div>
        </div>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">
                    <span class="material-symbols-outlined">
                        clock_loader_40
                        </span>
                </div>
                <div class="stat-info">
                    <div class="stat-title">Total Pelanggan</div>
                    <div class="stat-value">208</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <span class="material-symbols-outlined">
                        clock_loader_80
                        </span>
                </div>
                <div class="stat-info">
                    <div class="stat-title">Produk</div>
                    <div class="stat-value">23</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <span class="material-symbols-outlined">
                        clock_loader_60
                        </span>
                </div>
                <div class="stat-info">
                    <div class="stat-title">Pesanan</div>
                    <div class="stat-value">189</div>
                </div>
            </div>
        </div>

        <a href="admin_product.php#add_products"><button class="add-button" id="addProductBtn">
             Tambah Produk
        </button></a>

        <!-- Placeholder for additional content that will come later -->
        <div id="additional-content-area"></div>
    
        

    <!-- Customer Table Section -->
    <div class="customers-sectionpes">
        <div class="customers-header">
            <h2 class="customers-title">Produk</h2>
            <div class="customers-search-sort">
                <div class="customers-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
                <div class="sort-dropdown">
                    <span>Short by:</span>
                    <select id="sort-select">
                        <option value="newest">Newest</option>
                        <option value="oldest">Oldest</option>
                        <option value="name-asc">Name (A-Z)</option>
                        <option value="name-desc">Name (Z-A)</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="customers-table">
            <thead>
                <tr>
                    <th>gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>kategori</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $select_products = mysqli_query($koneksi, "SELECT id_product, nama, gambar, harga, deskripsi, stok, kategori from products join kategori on products.id_kategori = kategori.id_kategori");
                    while($product = mysqli_fetch_assoc($select_products)){ 
                ?>
                <form action="" method="post">
                <tr>
                    <input type="hidden" values="<?= $product['id_product'] ?>" name="id_product">
                    <td><img src="product_image/<?= $product['gambar']; ?>" name="gambar" class="gambar" alt=""></td>
                    <td><?= $product['nama'] ?></td>
                    <td><?= $product['kategori'] ?></td>
                    <td><?= $product['deskripsi'] ?></td>
                    <td><?= $product['harga'] ?></td>
                    <td><?= $product['stok'] ?></td>
                    <td><div class="flex-btn">
                        <a href="update_product.php?update=<?= $product['id_product']; ?>" class="option-btn">Perbarui</a>
                        <a href="admin_product.php?delete=<?= $product['id_product']; ?>" class="delete-btn" onclick="return confirm('hapus produk ini?');">Hapus</a>
                    </div></td
                </tr>
                <?php }  ?>
                </form>
            </tbody>
        </table>
    </div>


    <section class="add-products" id="add_products">

   <h1 class="heading">tambahkan produk</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>nama produk (wajib)</span>
            <input type="text" class="box" required maxlength="100" placeholder="masukkan nama produk" name="nama">
         </div>
         <div class="inputBox">
            <span>harga produk (wajib)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="masukkan harga produk" onkeypress="if(this.value.length == 10) return false;" name="harga">
         </div>
         <div class="inputBox">
            <span>stok produk (wajib)</span>
            <input type="number" class="box" required maxlength="100" placeholder="masukkan stok produk" name="stok">
         </div>
         <div class="inputBox">
            <span>deskripsi (wajib)</span>
            <textarea name="deskripsi" id=""></textarea>
         </div>
         <label for="">kategori</label>
         <select name="id_kategori" id="cars">
            <?php
                $select_kategori = mysqli_query($koneksi, "SELECT * from kategori");
                while($kategori = mysqli_fetch_assoc($select_kategori)){ 
            ?>
            <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['kategori']; ?></option>
            <?php } ?>
         </select>
        <div class="inputBox">
            <span>gambar (wajib)</span>
            <input type="file" name="gambar" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
      </div>
      
      <input type="submit" value="Tambahkan Produk" class="btn" name="add_product">
   </form>

</div>



    
    
        <script src="dekstop20.js"></script>
</body>
</html>