<?php
    session_start();
    include "koneksi.php";

    $id_user = $_SESSION['id_user'];

    if (!isset($id_user)) {
        header('location:login.php');
        exit();
    }

    $id_pesanan = $_GET['id_pesanan'];

    if(isset($_POST['unggah'])){;
        $bukti = $_FILES['bukti']['name'];
        $bukti_size = $_FILES['bukti']['size'];
        $bukti_tmp_name = $_FILES['bukti']['tmp_name'];
        $bukti_folder = 'bukti_payment/'. $bukti;
        
        if($bukti_size > 2000000){
            $message[] = 'ukuran gambar terlalu besar!';
        }else{
            $update_bukti = mysqli_query($koneksi, "UPDATE payment SET bukti = '$bukti' WHERE id_pesanan = '$id_pesanan'");
            move_uploaded_file($bukti_tmp_name, $bukti_folder);
            $message[] = 'berhasil mengunggah bukti pembayaran';
            header("location:confirm_order.php?id_pesanan=" . $id_pesanan);
            exit();
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
    <link rel="stylesheet" href="dekstop28.css">
    <title>Konfirmasi Pembayaran</title>
</head>
<body>
    <?php include "user_header.php"; ?>

    <h1 class="page-title">Menunggu Pembayaran - Order #<?= $id_pesanan; ?></h1>
    
    
    <form method="post" style="margin-top: 20px;">
    <div class="container">
        <div class="cards-container">
            <div class="cardon">
                <div class="payment-info">
                    <div class="deadline-title">Selesaikan Pembayaran Sebelum</div>
                    <div class="deadline-time">
                        <?php
                            // Hitung deadline pembayaran (24 jam dari waktu pemesanan)
                            $select_deadline = mysqli_query($koneksi, "SELECT DATE_ADD(tanggal_order, INTERVAL 24 HOUR) as deadline FROM pesanan WHERE id_pesanan = '$id_pesanan' AND id_user = '$id_user'");
                            $deadline_data = mysqli_fetch_assoc($select_deadline);
                            if ($deadline_data) {
                                echo date('d F Y, H:i', strtotime($deadline_data['deadline'])) . ' WIB';
                            } else {
                                // Fallback jika tidak ada data
                                echo date('d F Y, H:i', strtotime('+24 hours')) . ' WIB';
                            }
                        ?>
                    </div>
                </div>
                
                <div class="box">
                    <div class="one">
                        <?php
                             $select_order = mysqli_query($koneksi, "
                                SELECT total_harga, metode, gambar, nomor_rekening 
                                FROM pesanan 
                                JOIN payment ON pesanan.id_pesanan = payment.id_pesanan 
                                JOIN payment_method ON payment.id_method = payment_method.id_method 
                                WHERE pesanan.id_pesanan = '$id_pesanan' AND pesanan.id_user = '$id_user'
                            ");
                            
                            while($order = mysqli_fetch_assoc($select_order)) {
                        ?>
                        <img src="image/<?= $order['gambar']; ?>" alt="Bank Logo" class="bank-logo">
                        <div class="price">Rp <?= number_format($order['total_harga'], 0, ',', '.'); ?></div>
                    </div>

                    <div class="order-details">
                        <div class="detail-row">
                            <div class="detail-label">Nomor Pesanan</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label"><?= $order['metode'] ?? 'Transfer Bank'; ?></div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="detail-value" id="account-number"><?= $order['nomor_rekening'] ?? '70012579951752570'; ?></div>
                                <button type="button" class="copy-btn" onclick="copyAccountNumber()">Salin</button>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
                </form>
                
                <a href="dekstop18.html"><button class="check-status-btn">Cek Status Pesanan</button></a>
                
                <div class="warning-text">
                    Pesanan akan dibatalkan otomatis apabila pembayaran belum diselesaikan sesuai dengan batas yang berlaku
                </div>
            </div>

             
            <div class="cards-container">
                <div class="cardon">
                    <div class="guide-title">Unggah Bukti Pembayaran</div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php
                            $select_payment = mysqli_query($koneksi, "SELECT * FROM payment");
                            while($payment = mysqli_fetch_assoc($select_payment)){
                        ?>
                        <input type="hidden" name="id_payment" value="<?= $payment['id_payment']; ?>">
                        <?php } ?>
                        <input type="file" name="bukti" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>

                        <input type="submit" name="unggah" value="Unggah" class="check-status-btn">
                        </form>
                        
                    
                </div>
            </div>
            
            <div class="cardtw">
                <details open>
                    <summary>
                        <div class="guide-title">Panduan Pembayaran</div>
                    </summary>
                    <div class="guide-content">
                        <h4>Melalui <b>Transfer ATM</b></h4>
                        <ol class="guide-steps">
                            <li>Masukkan kartu ATM dan PIN Anda</li>
                            <li>Pilih menu Transfer</li>
                            <li>Pilih ke Bank lain</li>
                            <li>Masukkan nomor rekening tujuan</li>
                            <li>Masukkan nominal transfer</li>
                            <li>Konfirmasi transaksi</li>
                            <li>Simpan struk sebagai bukti pembayaran</li>
                        </ol>
                        
                        <h4>Melalui <b>Mobile Banking</b></h4>
                        <ol class="guide-steps">
                            <li>Login ke aplikasi mobile banking</li>
                            <li>Pilih menu Transfer</li>
                            <li>Pilih Transfer ke Bank lain</li>
                            <li>Masukkan nomor rekening dan nominal</li>
                            <li>Konfirmasi dengan PIN/fingerprint</li>
                            <li>Screenshot bukti transfer</li>
                        </ol>
                        
                        <h4>Melalui <b>Internet Banking</b></h4>
                        <ol class="guide-steps">
                            <li>Login ke website internet banking</li>
                            <li>Pilih menu Transfer Dana</li>
                            <li>Pilih Transfer ke Bank lain</li>
                            <li>Isi form transfer dengan lengkap</li>
                            <li>Konfirmasi dengan token/SMS</li>
                            <li>Cetak atau screenshot bukti transfer</li>
                        </ol>
                    </div>
                </details>
            </div>
        </div>
    </div>

    <script>
        function copyAccountNumber() {
            const accountNumber = document.getElementById('account-number').textContent;
            navigator.clipboard.writeText(accountNumber).then(function() {
                alert('Nomor rekening berhasil disalin!');
            }, function(err) {
                console.error('Gagal menyalin: ', err);
            });
        }
    </script>
</body>
</html>