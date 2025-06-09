<?php

    include "koneksi.php";
    if(isset($_POST['update'])){

   $id_product = $_POST['id_product'];
   $nama = $_POST['nama'];
   $harga = $_POST['harga'];
   $stok = $_POST['stok'];
   $deskripsi = $_POST['deskripsi'];

   $update_product = mysqli_query($koneksi, "UPDATE `products` SET nama = '$nama', harga = '$harga', stok = '$stok', deskripsi = '$deskripsi' WHERE id_product = '$id_product'");;

   $message[] = 'produk berhasil diperbarui!';

   $old_gambar = $_POST['old_gambar'];
   $gambar = $_FILES['gambar']['name'];
   $gambar_size = $_FILES['gambar']['size'];
   $gambar_tmp_name= $_FILES['gambar']['tmp_name'];
   $gambar_folder = 'product_image/'.$gambar;

   if(!empty($gambar)){
      if($gambar_size > 2000000){
         $message[] = 'ukuran gambar terlalu besar!';
      }else{
         $update_gambar = mysqli_query($koneksi, "UPDATE products SET gambar = '$gambar' WHERE id_product = '$id_product'");
         move_uploaded_file($gambar_tmp_name, $gambar_folder);
         unlink('product_image/'.$old_gambar);
         $message[] = 'gambar 01 berhasil diperbarui!';
      } 
   }

   
         header("location:admin_product.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $update_id = $_GET['update'];
        $select_product = mysqli_query($koneksi, "SELECT * FROM products WHERE id_product = '$update_id'");
        while($product = mysqli_fetch_assoc($select_product)){
    ?>
 
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_product" value="<?= $product['id_product']; ?>">
      <input type="hidden" name="old_gambar" value="<?= $product['gambar']; ?>">
      <div class="image-container">
         <div class="main-image">
            <img src="product_image/<?= $product['gambar']; ?>" alt="">
         </div>
      </div>
      <span>perbarui nama</span>
      <input type="text" name="nama" required class="box" maxlength="100" placeholder="masukkan nama produk" value="<?= $product['nama']; ?>">
      <span>perbarui harga</span>
      <input type="number" name="harga" required class="box" min="0" max="9999999999" placeholder="masukkan harga produk" onkeypress="if(this.value.length == 10) return false;" value="<?= $product['harga']; ?>">
      <span>perbarui stok</span>
      <input type="number" name="stok" required class="box" min="0" max="9999999999" placeholder="masukkan stok produk" onkeypress="if(this.value.length == 10) return false;" value="<?= $product['stok']; ?>">
      <span>perbarui detail</span>
      <textarea name="deskripsi" class="box" required cols="30" rows="10"><?= $product['deskripsi']; ?></textarea>
      <span>perbarui gambar 01</span>
      <input type="file" name="gambar" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <div class="flex-btn">
         <input type="submit" name="update" class="btn" value="perbarui">
         <a href="admin_product.php" class="option-btn">kembali</a>
      </div>
   </form>

    <?php } ?>
</body>
</html>