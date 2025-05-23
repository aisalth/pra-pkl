<?php
    include "koneksi.php";

    if(isset($_POST['add_product'])){

   $name = $_POST['nama'];
   $name = filter_var($nama, FILTER_SANITIZE_STRING);
   $price = $_POST['harga'];
   $price = filter_var($harga, FILTER_SANITIZE_STRING);
   $details = $_POST['deskripsi'];
   $details = filter_var($deskripsi, FILTER_SANITIZE_STRING);

   $gambar = $_FILES['gambar']['name'];
   $gambar = filter_var($gambar, FILTER_SANITIZE_STRING);
   $gambar_size = $_FILES['gambar']['size'];
   $gambar_tmp_name = $_FILES['gambar']['tmp_name'];
   $gambar_folder = '../product_image/'.$gambar;

   $select_products = mysqli_query($koneksi, "SELECT * FROM products WHERE name = '$nama'");

   if($select_products->rowCount() > 0){
      $message[] = 'nama produk sudah ada!';
   }else{

      $insert_products = mysqli_query($koneksi, "INSERT INTO products(name, details, price, image_01, image_02, image_03) VALUES(?,?,?,?,?,?)");

      if($insert_products){
         if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
            $message[] = 'ukuran gambar terlalu besar!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            $message[] = 'produk baru ditambahkan!';
         }

      }

   }  

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="add-products">

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
            <span>gambar 01 (wajib)</span>
            <input type="file" name="gambar" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
      </div>
      
      <input type="submit" value="Tambahkan Produk" class="btn" name="add_product">
   </form>

</section>
</body>
</html>