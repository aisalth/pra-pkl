<?php
    include "koneksi.php";

    if(isset($_POST['update_payment'])){
        $id_pesanan = $_POST['id_pesanan'];
        $payment_status = $_POST['payment_status'];
        $update_payment = mysqli_query($koneksi, "UPDATE pesanan SET status = '$payment_status' WHERE id_pesanan = '$id_pesanan'");
        if($update_payment){
            $message[] = 'Status pembayaran berhasil diperbarui!';
        } else {
            $message[] = 'Gagal memperbarui status pembayaran!';
        }
    }

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_order = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan = '$delete_id'");
        header('location:placed_orders.php');
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
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    
    <link rel="stylesheet" href="dekstop23.css">
    <title>Document</title>
</head>
<body>
    
    <?php
    if(isset($message)){
        foreach($message as $msg){
            echo '<div class="message"><span>'.$msg.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
        }
    }
    ?>

    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Dashboard</h2>
        </div>
        <div class="sidebar-menu">
            <div class="dashboard">
                <img src="c:\Users\ASUS\Downloads\key-square (2).svg" alt="" class="key-square">
                <span class="dashboard-text">Dashboard</span>
            </div>
            <a href="dekstop20,1.html" class="menu-item">
                <img src="c:\Users\ASUS\Downloads\3d-cube-scan (1).svg" alt="" class="cube">
                <span class="menu-item-text">Produk</span>
                <i class="fas fa-chevron-right arrow"></i>
            </a>
            <a href="dekstop19,3.html" class="menu-item">
                <i class="far fa-user"></i>
                <span class="menu-item-text">Pelanggan</span>
                <i class="fas fa-chevron-right arrow"></i>
            </a>
            <a href="dekstop23,1.html" class="menu-item">
                <img src="c:\Users\ASUS\Downloads\wallet-money (1).svg" alt="" class="wallet-money">
                <span class="menu-item-text">Pesanan</span>
                <i class="fas fa-chevron-right arrow"></i>
            </a>
            <a href="dekstop25,4.html" class="menu-item">
                <span class="menu-item-text">Review</span>
                <i class="fas fa-chevron-right arrow"></i>
            </a>
            <a href="dekstop24,1.html" class="menu-item">
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

        <!-- Placeholder for additional content that will come later -->
        <div id="additional-content-area"></div>
    

    <!-- Customer Table Section -->
    <div class="customers-section">
        <div class="customers-header">
            <h2 class="customers-title">Pesanan</h2>
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
                    <th>Tanggal</th>
                    <th>Informasi Pelanggan</th>
                    <th>Produk</th>
                    <th>Alamat</th>
                    <th>Total</th>
                    <th>Tipe Pesanan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $select_order = mysqli_query($koneksi, "SELECT * FROM pesanan");
                    while($order = mysqli_fetch_assoc($select_order)){
                ?>
                <tr>
                    <td><?= $order['tanggal_order']; ?></td>
                    <td><?= $order['customer']; ?></td>
                    <td><?= $order['total_product'] ?></td>
                    <td><?= $order['alamat'] ?></td>
                    <td><?= $order['total_harga'] ?>0</td>
                    <td><?= $order['tipe_pesanan'] ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="update_payment" value="1">
                            <input type="hidden" name="id_pesanan" value="<?= $order['id_pesanan']; ?>">
                            <select name="payment_status" class="select" onchange="this.form.submit()">
                                <option selected disabled><?= $order['status']; ?></option>
                                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Menunggu Diambil">Menunggu Diambil</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                    </td>
                    <td><a href="admin_order.php?delete=<?= $order['id_pesanan']; ?>" class="delete-btn" onclick="return confirm('Hapus pesanan ini?');">Hapus</a></td>
                    </form>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

    <script src="dekstop23.js"></script>
</body>
</html>