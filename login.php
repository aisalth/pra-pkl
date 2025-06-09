<?php
  session_start();
  include "koneksi.php";

  if(isset($_POST['sign_in'])){
    $username = $_POST['username']; 
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if($cek = mysqli_num_rows($query) > 0){
      $data = mysqli_fetch_assoc($query);
      if($data['role'] == "cust"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "cust";
        $_SESSION['id_user'] = $data['id_user'];
        header('location:index.php');
        exit();
      }else if($data['role'] == "admin"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        $_SESSION['id_user'] = $data['id_user'];
        header('location:admin_product.php');
        exit();
      } 
   } else {
      $message[] = 'incorrect username or password!';
   }
  }

  if(isset($_POST['sign_up'])){
    $nama = $_POST['nama'];    
    $email = $_POST['email'];   
    $password = $_POST['password']; 
    
    // Query tanpa sanitasi - rentan SQL injection
    $check_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$email' OR email = '$email'");
    
    if(mysqli_num_rows($check_user) > 0){
      $message[] = 'User already exists!';
    } else {
      $insert_query = mysqli_query($koneksi, "INSERT INTO user (nama, email, username, password, role) VALUES ('$nama', '$email', '$email', '$password', 'cust')");
      
      if($insert_query){
        $message[] = 'Account created successfully!';
      } else {
        $message[] = 'Failed to create account!';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <title>Login Page</title>
</head>
<body>
    <?php
    if(isset($message)){
      foreach($message as $msg){
        echo '<div class="message" onclick="this.remove();">'.$msg.'</div>';
      }
    }
    ?>

    <div class="container" id="container">
        <img src="image\Group 92.png" alt="">
        <div class="sign-up">
          <form action=""  method="post">
            <h1>Buat Akun</h1>
            <label class="nam">Nama</label>
            <input type="text" id="signup-nama" class="typewriter" name="nama" required />
            <label class="ema">Email</label>
            <input type="email" id="signup-email" class="typewriter" name="email" required />
            <label class="pas">Password</label>
            <input type="password" id="signup-password" class="typewriter" name="password" required />
    
            <button name="sign_up" type="submit">Sign Up</button>
          </form>
        </div>

        
        <div class="sign-in">
          <form action=""  method="post">
            <h1>Masuk</h1>
            <label class="ema">Username</label>
            <input type="text" id="signin-email" class="typewriter" name="username" required />
            <label class="pas">Password</label>
            <input type="password" id="signin-password" class="typewriter" name="password" required />
            <a href="login.html" class="link">Forgot password</a>
            <button name="sign_in" type="submit">Sign In</button>
          </form>
        </div>
        

        <div class="toogle-container">
          <div class="toogle">
            

            <div class="toogle-panel toogle-left">
              <h1>Selamat Datang di <br> Pastry Corner!</h1>
              <p>Silahkan membuat akun untuk bisa mengakses penuh fitur website kami. <br> Jika anda sudah memiliki akun silahkan untuk masuk.</p>
              <button class="hidden" id="login" type="button">Masuk</button>
              <img src="" alt="">
            </div>
          
            <div class="toogle-panel toogle-right">
                <h1>Selamat Datang di <br> Pastry Corner!</h1>
              <p>Silahkan masuk untuk dapat mengakses penuh fitur website kami. <br> Jika anda belum memiliki akun silahkan untuk daftar terlebih dahulu</p>
              <button class="hidden" id="register" type="button">Daftar</button>
              <img src="image\lingkaran.png" alt="">
            </div>
          </div>
        </div>

      </div>
      <script src="login.js"></script>
</body>
</html>