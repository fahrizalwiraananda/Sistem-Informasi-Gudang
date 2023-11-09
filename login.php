<?php 
	
	session_start();

	require 'functions.php';

	//cek cookie
	if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		//ambil username dari id
		$result = mysqli_query($conn, "select * from user where id = '$id'");
		$row = mysqli_fetch_assoc($result);

		//cek cookie dan username
		if ($key === hash('sha256', $row['username'])) {
			$_SESSION['login'] = true;
		}
	}


	if (isset($_SESSION["login"])) {
		header("Location: index.php");
		exit;
	}


	if( isset($_POST["login"]) ) {

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "select * from user where username = '$username'");

		//cek username
		if (mysqli_num_rows($result) === 1 ) {
			
			//cek password
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"])) {
				//set session 
				$_SESSION["login"] = true;

				//cek rememeber me
				if (isset($_POST['remember'])) {
					//buat cookie
					setcookie('id', $row['id'], time() + (60 * 60 * 24 * 5), '/');
					setcookie('key', hash('sha256', $row['username']), time() + (60 * 60 * 24 * 5), '/');
				}

				header("Location: index.php");
				exit;
			}
		}

		$error = true;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="stylelogin.css">
	<link rel="shortcut icon" href="assets/img/logo1.png">
</head>
<body>
    <div class="container">
		<div class="wrapper fadeInDown">
		    <div class="formContent">
			     <!-- Tabs Titles -->
			     <h2 class="active sign"> Sign In </h2>
			     <h2 class="inactive sign"><a href="registrasi.php">Sign Up</a></h2>

				<!-- Icon -->
				<div class="fadeIn first">
			    	<img src="assets/img/back.png" id="icon" alt="User Icon" />
				</div>

		      	<!-- Login Form -->
			      	<!--Warning -->
			      	<?php if(isset($error)) : ?>
						<p style="color: red; font-style: intalisc;">Username atau Password salah !</p>
					<?php endif; ?>
			    <form action="" method="post">
			        <input type="text" name="username" id="username"  class="fadeIn second input" placeholder="Username" required autocomplete="off">
			        <input type="password" name="password" id="password"  class="fadeIn third input" placeholder="Password" required><br>
			        <input type="checkbox" name="remember" id="remember" class="click"><label for="remember">Ingat Saya !</label><br>
			        <input type="submit" name="login" class="fadeIn fourth click" value="Log In">
			    </form>

			    <!-- Remind Passowrd -->
			    <div id="formFooter">
			        <a class="underlineHover" href="registrasi.php">Tambah Akun</a>
			    </div>
			</div>
		</div>
	</div>
</body>
