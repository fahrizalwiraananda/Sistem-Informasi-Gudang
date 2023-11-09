<?php

session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    
require 'functions_masuk.php';

if(isset($_POST["tambah"])){
	//cek berhasil ditambah/tidak
	if(tambah($_POST) > 0){
		echo "
			<script>
				alert('Data berhasil ditambahkan!');
				document.location.href='barangmasuk.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Data gagal ditambahkan!');
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html> 
  <head>
    <link rel="shortcut icon" href="logo1.png">
    <title>Tambah Data Barang Masuk</title>
    <style type="text/css">
      *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    background-image: url(bg.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}

.body-w{
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #177ca78a;
}

    .container{
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  }

    .container .title{
    font-size: 25px;
    font-weight: 500;
    position: relative;
  }
  .container .title::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: #177ca7;
  }

        .content .user-details{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
  }

        .user-details .input-box{
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
  }

    .input-box label.details{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
  }

    .user-details .input-box input{
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
  }
  .user-details .input-box input:focus{
    border-color: #5fbae9;
  }

      label{
        display: block;
      }
      ul{
        list-style: none;
        padding-left: 15px;
      }
      button{
        margin-top: 10px;
      }
      
       .tamb-primary {
            display: inline-block;
            width: 625px;
            font-weight: 400;
            text-align: center;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.4;
            border-radius: .35rem;
            /*transition: all 0.5s ease;*/
            color: #fff;
            text-decoration: none;
            background-color: #56baed;
        }
        .tamb-primary:hover {
            background: #00BFFF;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
  </head> 
  <body> 
<div class="body-w">
<div class="container">
    <form method="POST" action="" enctype="multipart/form-data">

        <div class="title">Tambah Data Barang Masuk</div>
      <div class="content">
      <ul>
        <div class="user-details">
        <div class="input-box">
        <li>
          <label for="idm" class="details">ID Transaksi :</label>
          <input type="text" name="idm" id="idm" required>
        </li>
        </div>
        <div class="input-box">
        <li>
          <label for="tgl_masuk" class="details">Tanggal Masuk :</label>
          <input type="text" name="tgl_masuk" id="tgl_masuk" required>
        </li>
        </div>
        <div class="input-box">
        <li>
          <label for="supplier" class="details">Supplier :</label>
          <input type="text" name="supplier" id="supplier" required>
        </li>
        </div>
        <div class="input-box">
        <li>
          <label for="barang" class="details">Nama Barang :</label>
          <input type="text" name="barang" id="barang" required>
        </li>
        </div>
        <div class="input-box">
        <li>
          <label for="jumlah" class="details">Jumlah Barang :</label>
          <input type="text" name="jumlah" id="jumlah" required>
        </li>
        </div>
        <div class="input-box">
        <li>
          <label for="total" class="details">Total :</label>
          <input type="text" name="total" id="total" required>
        </li>
        </div>

        <li>
          <button type="submit" name="tambah" class="tamb-primary">Tambah</button>
        </li>
        </div>
      </ul>
      </div>
    </form> 
    </div>
  </div>
  </body> 
</html>