<?php 

    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    include 'functions.php';

    date_default_timezone_set('Asia/Jakarta');

    $jam=date("G");

    if($jam>=0&&$jam<=11){
        $sapa="Selamat Pagi !";
    }else if($jam>=12&&$jam<=15){
        $sapa="Selamat Siang !";
    }else if($jam>=16&&$jam<=18){
        $sapa="Selamat Sore !";
    }else if($jam>=19&&$jam<=23){
        $sapa="Selamat Malam !";
    }

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/stylein.css">
        <link rel="shortcut icon" href="assets/img/logo1.png">

        <title>Dashboard</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
             <h2>Dashboard</h2>
            <div class="header__img">
                <a href="credit.php"><img src="back.png"></a>
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">Inventory App</span>
                    </a>

                    <a href="#" class="nav__logo">
                        <i class='bx bx-time-five nav__logo-icon'></i>
                        <span class="nav__logo-name"><?php echo $sapa; ?></span>
                    </a>


                    <div class="nav__list">
                        <a href="index.php" class="nav__link active">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <a href="barangmasuk.php" class="nav__link">
                            <i class='bx bxs-file-import nav__icon' ></i>
                            <span class="nav__name">Barang Masuk</span>
                        </a>
                        
                        <a href="barang_keluar.php" class="nav__link">
                            <i class='bx bxs-file-export nav__icon' ></i>
                            <span class="nav__name">Barang Keluar</span>
                        </a>

                        <a href="penerima.php" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Penerima</span>
                        </a>

                        <a href="supplier.php" class="nav__link">
                            <i class='bx bx-folder nav__icon' ></i>
                            <span class="nav__name">Supplier</span>
                        </a>

                  
                    </div>
                </div>

                <a href="logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>

        <br>

        <div class="content cf">
            <div class="my_galeri">
                <div class="menu one">
                    <div class="des">
                        <a href="barangmasuk.php" class="link">Barang Masuk</a>
                    </div>
                    <div class="count">
                        <div class="icon">
                            <?php
                                // mengambil data barang
                                $data_barang = mysqli_query($conn,"SELECT * FROM masuk");
                                // menghitung data barang
                                $jumlah_barang = mysqli_num_rows($data_barang);
                            ?>
                            <h1 class="count-text"><?php echo $jumlah_barang; ?> Kali</h1>
                            <i class='bx bx-archive-in dash__icon'></i>
                        </div>
                    </div>
                </div>
                <div class="menu two">
                    <div class="des">
                        <a href="barang_keluar.php" class="link">Barang Keluar</a>
                    </div>
                    <div class="div count">
                        <div class="icon">
                            <?php
                                // mengambil data barang
                                $data_barang = mysqli_query($conn,"SELECT * FROM keluar");
                                // menghitung data barang
                                $jumlah_barang = mysqli_num_rows($data_barang);
                            ?>
                            <h1 class="count-text"><?php echo $jumlah_barang; ?> Kali</h1>
                            <i class='bx bx-archive-out dash__icon'></i>
                        </div>
                    </div>
                </div>
                <div class="menu three">
                    <div class="des">
                        <a href="supplier.php" class="link">Data Supplier</a>
                    </div>
                    <div class="count">
                        <div class="icon">
                            <?php
                                // mengambil data barang
                                $data_barang = mysqli_query($conn,"SELECT * FROM supplier");
                                // menghitung data barang
                                $jumlah_barang = mysqli_num_rows($data_barang);
                            ?>
                            <h1 class="count-text"><?php echo $jumlah_barang; ?> Orang</h1>
                            <i class='bx bx-user-pin dash__icon'></i>
                        </div>
                    </div>
                </div>
                <div class="menu four">
                    <div class="des">
                        <a href="penerima.php" class="link">Data Penerima</a>
                    </div>
                    <div class="count">
                        <div class="icon">
                        <div class="icon">
                            <?php
                                // mengambil data barang
                                $data_barang = mysqli_query($conn,"SELECT * FROM penerima");
                                // menghitung data barang
                                $jumlah_barang = mysqli_num_rows($data_barang);
                            ?>
                            <h1 class="count-text"><?php echo $jumlah_barang; ?> Orang</h1>
                            <i class='bx bx-user-voice dash__icon'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="clear">
            
        </div>

        <div class="data">            
            <table style="width: 100%" class="table2">
                <?php

                    $data = mysqli_query($conn,"select * from keluar ORDER by tgl desc limit 5");
                ?>
                <tr>
                    <td colspan="5"><h3>Data Penjualan Terbaru</h3></td>
                </tr>
                <tr class="row">
                    <th>No Transaksi</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Keluar</th>
                    <th>Sisa Barang</th>
                </tr>
                <?php foreach ($data as $row) : ?>
                <tr class="row">
                    <td><?= $row["idb"]; ?></td>
                    <td><?= $row["tgl"]; ?></td>
                    <td><?= $row["bk"]; ?></td>
                    <td><?= $row["jml"]; ?></td>
                    <td><?= $row["sisa"]; ?></td>
                </tr>
                <?php endforeach; ?>
            </table> 
        </div>
</body>
</html>