<?php 

	require 'functions.php';

	if( isset($_POST["registrasi"]) ) {

		if(registrasi($_POST) > 0 ) {
			echo"<script>
					alert('Selamat ! Anda berhasil menambahkan user baru');
				</script>";
		} else {

			echo mysqli_error($conn);

		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="stylelogin.css">
	<link rel="shortcut icon" href="assets/img/logo1.png">
</head>
<body>
		<div class="container">		
			<div class="wrapper fadeInDown">
				<div class="formContent">
					<!-- Judul -->
					<h2 class="inactive sign"><a href="login.php">Sign In</a></h2>
					<h2 class="active sign">Sign Up</h2>

					<!-- Icon -->
					<div class="fadeIn first">
						<img src="assets/img/back.png" id="icon" alt="User Icon" />
					</div>

					<!-- Form  login -->
					<form action="" method="post">
						<input type="text" name="username" id="username" class="fadeIn second input" placeholder="Username" required autocomplete="off">
						<input type="email" name="email" id="email" class="fadeIn second input" placeholder="E-mail" required autocomplete="off">
						<input type="password" name="password" id="password" class="fadeIn third input" placeholder="Password" required>
						<input type="password" name="password2" id="password2" class="fadeIn third input" placeholder="Konfirmasi Password" required><br>
						<input type="submit" name="registrasi" class="fadeIn fourth click" value="Sign Up">
					</form>
				</div>
			</div>
		</div>
</body>
