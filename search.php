<?php
include "koneksi.php";

// Handle wishlist addition
if(isset($_POST['add_to_wishlist'])) {
    // Add wishlist logic here
    // Example: INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)
    echo "<script>alert('Produk ditambahkan ke wishlist!');</script>";
}

// Handle cart addition
if(isset($_POST['add_to_cart'])) {
    // Add cart logic here
    // Example: INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)
    echo "<script>alert('Produk ditambahkan ke keranjang!');</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Halaman Pencarian Produk</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <style>
   :root {
       --main-color: #2c3e50;
       --secondary-color: #3498db;
       --accent-color: #e74c3c;
       --success-color: #27ae60;
       --black: #2c3e50;
       --white: #fff;
       --light-gray: #f8f9fa;
       --border-color: #dee2e6;
       --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
       --hover-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
   }

   * {
       margin: 0;
       padding: 0;
       box-sizing: border-box;
   }

   body {
       font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
       min-height: 100vh;
       padding: 20px;
   }

   /* Search Form Styling */
   .search-form {
       max-width: 800px;
       margin: 0 auto 40px;
       padding: 30px;
       background: var(--white);
       border-radius: 15px;
       box-shadow: var(--shadow);
   }

   .search-form h2 {
       text-align: center;
       color: var(--black);
       margin-bottom: 20px;
       font-size: 2.2rem;
   }

   .search-form form {
       display: flex;
       gap: 15px;
       align-items: center;
   }

   .search-form form input {
       flex: 1;
       border: 2px solid var(--border-color);
       border-radius: 10px;
       background-color: var(--white);
       box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
       padding: 15px 20px;
       font-size: 1.1rem;
       color: var(--black);
       transition: all 0.3s ease;
   }

   .search-form form input:focus {
       outline: none;
       border-color: var(--main-color);
       box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
   }

   .search-form form button {
       font-size: 1.2rem;
       height: 50px;
       width: 60px;
       background: #5E5344;
       cursor: pointer;
       color: var(--white);
       border: none;
       border-radius: 10px;
       transition: all 0.3s ease;
       display: flex;
       align-items: center;
       justify-content: center;
   }

   .search-form form button:hover {
       transform: translateY(-2px);
       box-shadow: var(--hover-shadow);
   }

   /* Search Results Header */
   .search-results-wrapper {
       max-width: 1200px;
       margin: 0 auto;
   }

   .results-header {
       background: var(--white);
       padding: 20px 30px;
       border-radius: 10px;
       margin-bottom: 30px;
       box-shadow: var(--shadow);
       display: flex;
       align-items: center;
       gap: 15px;
       font-size: 1.3rem;
       color: var(--black);
       font-weight: 600;
   }

   .results-header i {
       color: var(--main-color);
       font-size: 1.5rem;
   }

   /* Products Container */
   .products-container {
       display: grid;
       grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
       gap: 25px;
       padding: 20px 0;
   }

   /* Product Box Styling */
   .box {
       background: var(--white);
       border-radius: 15px;
       box-shadow: var(--shadow);
       overflow: hidden;
       transition: all 0.3s ease;
       position: relative;
       border: none;
       padding: 0;
   }

   .box:hover {
       transform: translateY(-8px);
       box-shadow: var(--hover-shadow);
   }

   /* Product Actions */
   .product-actions {
       position: absolute;
       top: 15px;
       right: 15px;
       display: flex;
       flex-direction: column;
       gap: 8px;
       z-index: 10;
   }

   .product-actions button,
   .product-actions a {
       width: 40px;
       height: 40px;
       border-radius: 50%;
       display: flex;
       align-items: center;
       justify-content: center;
       font-size: 16px;
       text-decoration: none;
       transition: all 0.3s ease;
       border: none;
       cursor: pointer;
   }

   .product-actions .fa-heart {
       background: rgba(231, 76, 60, 0.9);
       color: var(--white);
   }

   .product-actions .fa-heart:hover {
       background: var(--accent-color);
       transform: scale(1.1);
   }

   .product-actions .fa-eye {
       background: rgba(52, 152, 219, 0.9);
       color: var(--white);
   }

   .product-actions .fa-eye:hover {
       background: var(--secondary-color);
       transform: scale(1.1);
   }

   /* Product Image */
   .product-image {
       width: 100%;
       height: 220px;
       overflow: hidden;
       position: relative;
   }

   .product-image img {
       width: 100%;
       height: 100%;
       object-fit: cover;
       transition: transform 0.3s ease;
   }

   .box:hover .product-image img {
       transform: scale(1.05);
   }

   /* Product Info */
   .product-info {
       padding: 20px;
   }

   .nama {
       font-size: 1.1rem;
       font-weight: 600;
       color: var(--black);
       margin-bottom: 15px;
       line-height: 1.4;
       display: -webkit-box;
       -webkit-line-clamp: 2;
       -webkit-box-orient: vertical;
       overflow: hidden;
   }

   /* Price and Quantity */
   .flex {
       display: flex;
       justify-content: space-between;
       align-items: center;
       margin-bottom: 20px;
       gap: 15px;
   }

   .harga {
       font-size: 1.3rem;
       font-weight: 700;
       color: var(--accent-color);
   }

   .harga span {
       font-size: 0.9rem;
       font-weight: 500;
   }

   .qty {
       width: 60px;
       height: 35px;
       border: 2px solid var(--border-color);
       border-radius: 8px;
       text-align: center;
       font-size: 1rem;
       font-weight: 600;
       background: var(--light-gray);
   }

   .qty:focus {
       outline: none;
       border-color: var(--main-color);
   }

   /* Add to Cart Button */
   .btn {
       width: 100%;
       padding: 12px;
       background: #5E5344;
       color: var(--white);
       border: none;
       border-radius: 8px;
       font-size: 1rem;
       font-weight: 600;
       cursor: pointer;
       transition: all 0.3s ease;
       text-transform: uppercase;
       letter-spacing: 0.5px;
   }

   .btn:hover {
       background: linear-gradient(135deg, #5E5344, #5E5347);
       transform: translateY(-2px);
       box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
   }

   /* Empty State */
   .empty {
       text-align: center;
       padding: 60px 20px;
       background: var(--white);
       border-radius: 15px;
       box-shadow: var(--shadow);
       font-size: 1.2rem;
       color: #666;
   }

   .empty i {
       font-size: 3rem;
       color: var(--border-color);
       margin-bottom: 20px;
       display: block;
   }

   /* Responsive Design */
   @media (max-width: 768px) {
       body {
           padding: 10px;
       }

       .search-form {
           padding: 20px;
       }

       .search-form h2 {
           font-size: 1.8rem;
       }

       .search-form form {
           flex-direction: column;
           gap: 10px;
       }

       .search-form form button {
           width: 100%;
           height: 45px;
       }

       .products-container {
           grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
           gap: 15px;
       }

       .results-header {
           padding: 15px 20px;
           font-size: 1.1rem;
       }
   }

   @media (max-width: 480px) {
       .products-container {
           grid-template-columns: 1fr;
       }
       
       .flex {
           flex-direction: column;
           align-items: flex-start;
           gap: 10px;
       }
   }
   </style>

</head>
<body>

<section class="search-form">
   <h2><i class="fas fa-search"></i> Cari Produk</h2>
   <form action="" method="post">
      <input type="text" name="input" placeholder="Masukkan nama produk yang dicari..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>

<?php if(isset($_POST['input'])): ?>
    <div class="search-results-wrapper">
        <div class="results-header">
            <i class="fas fa-search"></i> 
            Hasil Pencarian untuk "<strong><?= htmlspecialchars($_POST['input']); ?></strong>"
        </div>
        
        <div class="products-container">
            <?php
            $input = mysqli_real_escape_string($koneksi, $_POST['input']);
            $select_products = mysqli_query($koneksi, "SELECT * FROM `products` WHERE nama LIKE '%{$input}%' ORDER BY nama ASC"); 
            
            if(mysqli_num_rows($select_products) > 0){
                while($product = mysqli_fetch_assoc($select_products)){
            ?>
                    <form action="" method="post" class="box">
                        <input type="hidden" name="id_product" value="<?= $product['id_product']; ?>">
                        <input type="hidden" name="nama" value="<?= $product['nama']; ?>">
                        <input type="hidden" name="harga" value="<?= $product['harga']; ?>">
                        <input type="hidden" name="gambar" value="<?= $product['gambar']; ?>">
                        
                        <div class="product-actions">
                            <button class="fas fa-heart" type="submit" name="add_to_wishlist" title="Tambah ke Wishlist"></button>
                            <a href="detail_product.php?detail=<?= $product['id_product']; ?>" class="fas fa-eye" title="Lihat Detail"></a>
                        </div>
                        
                        <div class="product-image">
                            <img src="product_image/<?= $product['gambar']; ?>" alt="<?= htmlspecialchars($product['nama']); ?>">
                        </div>
                        
                        <div class="product-info">
                            <div class="nama" title="<?= htmlspecialchars($product['nama']); ?>">
                                <?= htmlspecialchars($product['nama']); ?>
                            </div>
                            
                            <div class="flex">
                                <div class="harga">
                                    <span>Rp </span><?= number_format($product['harga'], 0, ',', '.'); ?>
                                </div>
                                <input type="number" name="quantity" class="qty" min="1" max="99" 
                                       onkeypress="if(this.value.length == 2) return false;" 
                                       value="1" title="Jumlah">
                            </div>
                            
                            <input type="submit" value="Masukkan ke Keranjang" class="btn" name="add_to_cart">
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<div class="empty">
                        <i class="fas fa-search"></i>
                        <p>Tidak ada produk yang ditemukan untuk "<strong>' . htmlspecialchars($input) . '</strong>"</p>
                        <p style="margin-top: 10px; font-size: 1rem; color: #999;">Coba gunakan kata kunci yang berbeda</p>
                      </div>';
            }
            ?>
        </div>
    </div>
<?php endif; ?>

</body>
</html>