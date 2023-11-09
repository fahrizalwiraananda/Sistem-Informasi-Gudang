<?php

session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

require 'functions_penerima.php';

//ambil data dari url
$idp=$_GET["idp"];

//query data siswa base nis
$sw=query("select * from penerima where idp=$idp")[0];

if(isset($_POST["ubah"])){
	//cek berhasil diubah/tidak
	if(ubah($_POST) > 0){
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href='penerima.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Data gagal diubah!');
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html> 
  <head>
    <title>Ubah Data Penerima</title>
    <link rel="shortcut icon" href="logo1.png">
    <style type="text/css">
      *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Poppins', sans-serif;
      }
      body {
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
        /* === BAGIAN UPLOAD NOTA === */
      .user-details .input-box .upload-box{
        font-size: 18px;
        padding: 0px;
        outline: none;
      }

      
      .user-details .input-box .upload-box{
        font-size: 18px;
        padding: 0px;
        outline: none;
      }

      ::-webkit-file-upload-button{
        height: 45px;
        color: #fff;
        background-color: #A9A9A9;
        outline: none;
        border: none;
      }

      ::-webkit-file-upload-button:hover{
        background: gray;
        cursor: pointer;
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
            font-size: 20px;
            line-height: 1.4;
            border-radius: .35rem;
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

        <div class="title">Ubah Data Penerima</div>
      <div class="content">
			<ul>
        <div class="user-details">
        <div class="input-box">
				<li>
					<label for="idp" class="details">ID Penerima :</label>
          <input type="text" name="idp" id="idp" required value="<?= $sw["idp"]; ?>">
				</li>
        </div>

        <div class="input-box">
        <li>
          <label for="nama_barang" class="details">Nama Barang :</label>
          <input type="text" name="nama_barang" id="nama_barang" value="<?= $sw["nama_barang"]; ?>">
        </li>
        </div>

        <div class="input-box">
				<li>
					<label for="nama" class="details">Penerima :</label>
					<input type="text" name="nama" id="nama" value="<?= $sw["nama"]; ?>">
				</li>
        </div>

        <div class="input-box">
				<li>
					<label for="alamat" class="details">Alamat :</label>
					<input type="text" name="alamat" id="alamat" value="<?= $sw["alamat"]; ?>">
				</li>
        </div>

        <div class="input-box">
				<li>
					<label for="tgl_terima" class="details">Tanggal Terima :</label>
					<input type="text" name="tgl_terima" id="tgl_terima" value="<?= $sw["tgl_terima"]; ?>">
				</li>
        </div>


        <div class="input-box">
				<li>
					<label for="jumlah" class="details">Jumlah :</label>
					<input type="text" name="jumlah" id="jumlah" value="<?= $sw["jumlah"]; ?>">
				</li>
        </div>

        
        <div class="input-box">
              <li>
               <label for="foto">Foto :</label><br>
          <input type="hidden" name="fotoLama" id="fotoLama" value="<?= $sw["foto"]; ?>">
          <input type="file" name="foto" id="foto" class="upload-box" accept="images/*">
          <label style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</label>
              </li>
        </div>

				
      </div>
      <div class="button">
        <li>
          <input type="submit" name="ubah" class="tamb-primary" value="Ubah">
        </li>
        </div>
      </ul>
    </form>
    </div>
  </div>
</body> 
</html>