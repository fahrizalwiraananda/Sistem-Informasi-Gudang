<?php 
session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    
  include 'functions_masuk.php';
    $data= query("select * from masuk");

    if(isset($_POST["cari"])){
  $data = cari($_POST["kunci"]);
    }

 ?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<style>

   /*===== GOOGLE FONTS =====*/
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

/*===== VARIABLES CSS =====*/
:root{
  --header-height: 3rem;
  --nav-width: 68px;

  /*===== Colors =====*/
  --first-color: #177ca7;
  --first-color-light: #8cadcc;
  --white-color: #F7F6FB;
  
  /*===== Font and typography =====*/
  --body-font: 'Nunito', sans-serif;
  --normal-font-size: 1rem;
  
  /*===== z index =====*/
  --z-fixed: 100;
}

/*===== BASE =====*/
*,::before,::after{
  box-sizing: border-box;
}

body{

    background-image:url('bg4.jpg');
    position: relative;
    margin: var(--header-height) 0 0 0;
    padding: 0 1rem;
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
     transition: .5s;
}

a{
  text-decoration: none;
}

/*===== HEADER =====*/
.header{
  width: 100%;
  height: var(--header-height);
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 1rem;
  background-color: var(--white-color);
  z-index: var(--z-fixed);
  transition: .5s;
}

.header__toggle{
  color: var(--first-color);
  font-size: 1.5rem;
  cursor: pointer;
}

.header__img{
  width: 35px;
  height: 35px;
  display: flex;
  justify-content: center;
  border-radius: 50%;
  overflow: hidden;
}

.header__img img{
  width: 40px;
}

/*===== NAV =====*/
.l-navbar{
  position: fixed;
  top: 0;
  left: -30%;
  width: var(--nav-width);
  height: 100vh;
  background-color: var(--first-color);
  padding: .5rem 1rem 0 0;
  transition: .5s;
  z-index: var(--z-fixed);
}

.nav{
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden;
}

.nav__logo, .nav__link{
  display: grid;
  grid-template-columns: max-content max-content;
  align-items: center;
  column-gap: 1rem;
  padding: .5rem 0 .5rem 1.5rem;
}

.nav__logo{
  margin-bottom: 2rem;
}

.nav__logo-icon{
  font-size: 1.25rem;
  color: var(--white-color);
}

.nav__logo-name{
  color: var(--white-color);
  font-weight: 700;
}

.nav__link{
  position: relative;
  color: var(--first-color-light);
  margin-bottom: 1.5rem;
  transition: .3s;
}

.nav__link:hover{
  color: var(--white-color);
}

.nav__icon{
  font-size: 1.25rem;
}

/*Show navbar movil*/
.show{
  left: 0;
}

/*Add padding body movil*/
.body-pd{
  padding-left: calc(var(--nav-width) + 1rem);
}

/*Active links*/
.active{
  color: var(--white-color);
}

.active::before{
  content: '';
  position: absolute;
  left: 0;
  width: 2px;
  height: 32px;
  background-color: var(--white-color);
}

/* ===== MEDIA QUERIES=====*/
@media screen and (min-width: 768px){
  body{
    margin: calc(var(--header-height) + 1rem) 0 0 0;
    padding-left: calc(var(--nav-width) + 2rem);
  }

  .header{
    height: calc(var(--header-height) + 1rem);
    padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
  }

  .header__img{
    width: 40px;
    height: 40px;
  }

  .header__img img{
    width: 45px;
  }

  .l-navbar{
    left: 0;
    padding: 1rem 1rem 0 0;
  }
  
  /*Show navbar desktop*/
  .show{
    width: calc(var(--nav-width) + 156px);
  }

  /*Add padding body desktop*/
  .body-pd{
    padding-left: calc(var(--nav-width) + 188px);
  }
}

/* =====DATABASE===== */

body{
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-size: cover;
}
.table1{
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
    opacity: .9;
}

.table1 tr th{
    background: #35a9db;
    color: #fff;
    font-weight: normal; 
}

.table1, th, td{
    padding: 8px 20px;
    text-align: justify;
}

.table1 tr{
    background-color: #bdbdbd;
}

.table1 tr:hover{
    background-color: #f5f5f5;
}

.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}

#lg{
    text-decoration: none;
    color: white;
    font-size: 18px;
    padding: 10px;
    background: #00b0fc;
    border-radius: 5px; 
}

#up{
    text-decoration: none;
    color: white;
    background: rgb(93, 238, 74);
    border-radius: 3px;
    padding: 2px;
}
#del{
    text-decoration: none;
    color: white;
    background: red;
    border-radius: 3px;
    padding: 2px;
}
#add{
    text-decoration: none;
    line-height: 12px;
    color: white;
    background: orange;
    border-radius: 3px;
    padding: .375rem .75rem;
    text-align: left;
    opacity: .9;
}
#print{
    text-decoration: none;
    line-height: 12px;
    color: white;
    background: #DC1313;
    border-radius: 3px;
    padding: .375rem .75rem;
    text-align: left;
    opacity: .9;
}

/*==== MENU ====*/
.content .menu{
  padding: 15px;
}

.content .one{
  height: 150px;
  width: 300px;
  background-color: #2d99c7;
  margin: 15px;
  border-radius: 10px;
  float: left;
  transition: ease-out .5s;
}

.content .two{
  height: 150px;
  width: 300px;
  background-color: #2dc72d;
  margin: 15px;
  border-radius: 10px;
  float: left;
  transition: ease-out .5s;
}

.content .three{
  height: 150px;
  width: 300px;
  background-color: #fd9800;
  margin: 15px;
  border-radius: 10px;
  float: left;
  transition: ease-out .5s;
}

.content .four{
  height: 150px;
  width: 300px;
  background-color: #ee1a1a;
  margin: 15px;
  border-radius: 10px;
  float: left;
  transition: ease-out .5s;
}

.link{
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
  text-transform: uppercase;
  color: #ffffff;
}

.content iframe{
  margin: 5px 300px;
  border-radius: 10px;
}

.content .galeri img{
  width: 351px;
  height: 180px;
  margin: 0px auto;
  border-radius: 10px;
}

.content .galeri a:hover{
  color: rgb(0, 143, 161);
}

.content .my_galeri .galeri{
  transition: ease-out .5s;
} 

.content .my_galeri img{
  border-radius: 0px;
}
.cari-primary {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.4;
    border-radius: 5px;
    color: #fff;
    background-color:#177ca7;
    opacity: .9;

}
  .cari-primary:hover {
    opacity: 1;
    text-decoration: none;
    cursor: pointer;
  }

.box {
    border: none;
    display: inline-block;
    margin-bottom: .5rem;
    height: calc(1.7em + .5rem + 2px);
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 12px;
    border-radius: .2rem;
    margin-left: 38em;
    opacity: 0.7;

}
.box:focus{
    border-bottom: 2px solid gray;
    border border-radius: .2rem;
    outline: none;
}

</style>
        <link rel="shortcut icon" href="logo1.png">
        <title>Halaman Data Barang Masuk</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
             <h2>Halaman Data Barang Masuk</h2>
            <div class="header__img">
                <a href="credit.php"><img src="back.png"></a>
            </div>
        </header>
        <br><br>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">Inventory App</span>
                    </a>

                    <div class="nav__list">
                        <a href="index.php" class="nav__link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <a href="barangmasuk.php" class="nav__link active">
                            <i class='bx bxs-file-import'></i>
                            <span class="nav__name">Barang Masuk</span>
                        </a>
                        
                        <a href="barang_keluar.php" class="nav__link">
                            <i class='bx bxs-file-export'></i>
                            <span class="nav__name">Barang Keluar</span>
                        </a>

                        <a href="supplier.php" class="nav__link">
                            <i class='bx bx-folder nav__icon'></i>
                            <span class="nav__name">Data Supplier</span>
                        </a>

                        <a href="penerima.php" class="nav__link">
                            <i class='bx bx-user nav__icon'></i>
                            <span class="nav__name">Data Penerima</span>
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

        <!--<a href="logout.php" style="text-align: left;" id="lg">Logout</a>-->
            
<form action="" method="POST">
    <a href="tambah_masuk.php" id="add"> <i class='bx bxs-plus-square'></i>
      Tambah Data Barang Masuk</a>
    <a href="cetak_masuk.php" id="print"><i class='bx bx-printer'></i> Cetak Data</a>
   <input type="text" name="kunci" size="40" autofocus 
   placeholder="Masukkan kata kunci pencarian" autocomplete="off" class="box">
   <button type="submit" name="cari" class="cari-primary">Cari</button>
 </form>
           <table style="width: 100%" class="table1">
  <tr>
    <th>ID Transaksi</th>
    <th>Nama Barang</th>
      <th>Supplier</th>
      <th>Tanggal Masuk</th>
      <th>Jumlah Masuk</th>
      <th>Total keseluruhan</th>
      <th>Aksi</th>
  </tr>
  
  <?php foreach ($data as $row) : ?>
  <tr>
     <td><?= $row["idm"]; ?></td>
     <td><?= $row["barang"]; ?></td>
     <td><?= $row["supplier"]; ?></td>
     <td><?= $row["tgl_masuk"]; ?></td>
     <td><?= $row["jumlah"]; ?></td>
     <td><?= $row["total"]; ?></td>
     <td>
       <a href="ubah_masuk.php?idm=<?= $row['idm']; ?>" id="up" class='bx bx-pen nav__icon'></a>
       <a href="hapus_masuk.php?idm=<?= $row['idm']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?');" id="del" class='bx bx-trash nav__icon'></a>
     </td>
  </tr>
  <?php endforeach; ?>
 </table> 
</body>
</html>