<?php
    include "koneksi.php";

    session_start();

    $id_user = $_SESSION['id_user'];

    if(!isset($id_user)){
        header('location:login.php');
        exit();
    }

    // Proses upload gambar
    if(isset($_POST['upload_image'])){
        $old_gambar = $_POST['old_gambar'];
        $gambar = $_FILES['gambar']['name'];
        $gambar_size = $_FILES['gambar']['size'];
        $gambar_tmp_name = $_FILES['gambar']['tmp_name'];
        $gambar_folder = 'profile/'.$gambar;

        if(!empty($gambar)){
            if($gambar_size > 2000000){
                $message[] = 'Ukuran gambar terlalu besar! Maksimal 2MB';
            }else{
                // Validasi tipe file
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                $file_extension = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
                
                if(in_array($file_extension, $allowed_types)){
                    $update_gambar = mysqli_query($koneksi, "UPDATE user SET foto = '$gambar' WHERE id_user = '$id_user'");
                    
                    if($update_gambar){
                        move_uploaded_file($gambar_tmp_name, $gambar_folder);
                        
                        // Hapus gambar lama jika ada
                        if(!empty($old_gambar) && file_exists('profile/'.$old_gambar)){
                            unlink('profile/'.$old_gambar);
                        }
                        
                        $message[] = 'Foto profil berhasil diperbarui!';
                    }else{
                        $message[] = 'Gagal memperbarui foto profil!';
                    }
                }else{
                    $message[] = 'Format file tidak didukung! Gunakan JPG, JPEG, PNG, atau GIF';
                }
            } 
        }
    }

    // Proses update profile
    if(isset($_POST['save_button'])){
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $telepon = mysqli_real_escape_string($koneksi, $_POST['telepon']);

        $update_profile = mysqli_query($koneksi, "UPDATE user SET nama = '$nama', username = '$username', email = '$email', no_telp = '$telepon' WHERE id_user = '$id_user'");

        if($update_profile){
            $message[] = 'Profile berhasil diperbarui!';
        }else{
            $message[] = 'Gagal memperbarui profile!';
        }
    }

    // Ambil data user
    $select_profile = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
    $user = mysqli_fetch_assoc($select_profile);
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
    <link rel="stylesheet" href="dekstop12.css">
    <title>Profile - Pastry Corner</title>
</head>
<body>

    <?php include "user_header.php"; ?>

    <!-- Tampilkan pesan jika ada -->
    <?php if(isset($message)): ?>
        <div class="message-container">
            <?php foreach($message as $msg): ?>
                <div class="message"><?= $msg ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="upload-container">
        <div class="upload-profile">
            <form action="" method="POST" enctype="multipart/form-data" id="profile-form">
                <div class="profile-info">
                    <div class="avatar" id="avatar">
                        <?php if(empty($user['foto'])): ?>
                            <i class="fa-regular fa-circle-user"></i>
                        <?php else: ?>
                            <img src="profile/<?= $user['foto']; ?>" alt="Profile Picture" class="profile-img">
                        <?php endif; ?>
                    </div>
                    <div class="profile-content">
                        <div class="profile-text">Unggah Foto Profil Baru</div>
                        <input type="hidden" name="old_gambar" value="<?= $user['foto']; ?>">
                        <input type="file" name="gambar" id="image" class="gambar" accept="image/*" style="display: none;">
                        <label for="image" class="upload-btn">Pilih File</label>
                        <input type="hidden" name="upload_image" value="1">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="profile-card">
        <h2 class="card-title">Detail Profile</h2>
        <form action="" method="POST">
            <input type="hidden" name="id_user" value="<?= $id_user; ?>">
            
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" value="<?= htmlspecialchars($user['nama']); ?>" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" value="<?= htmlspecialchars($user['username']); ?>" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="<?= htmlspecialchars($user['email']); ?>" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="tel" id="telepon" value="+62<?= $user['no_telp']; ?>" name="telepon" required>
            </div>
            
            <div class="button-container">
                <button type="submit" name="save_button" class="save-button">Simpan</button>
            </div>
        </form>
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

    <script>
        document.getElementById("image").onchange = function(){
            if(this.files && this.files[0]) {
                // Validasi ukuran file di client-side
                if(this.files[0].size > 2000000) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB');
                    this.value = '';
                    return;
                }
                
                // Submit form
                document.getElementById("profile-form").submit();
            }
        };
    </script>
</body>
</html>