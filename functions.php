<?php
	$conn=mysqli_connect("localhost:3306","root","","barang_kelompok");

	function query($query){
		global $conn;
		$result=mysqli_query($conn,$query);
		$rows=[];
		while($row=mysqli_fetch_assoc($result)){
			$rows[]=$row;
		}
		return $rows;
	}

	function tambah($data){
		global $conn;
		$nis    = htmlspecialchars($data["nis"]);
		$nm     = htmlspecialchars($data["nama"]);
		$jk     = htmlspecialchars($data["gender"]);
		$ttl    = htmlspecialchars($data["tgl_lahir"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$telp   = htmlspecialchars($data["no_telepon"]);

		//query tambah
		$query="insert into siswa values('$nis', '$nm', '$jk', '$ttl', '$alamat', '$telp')";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
	
	function hapus($nis){
		global $conn;
		mysqli_query($conn,"delete from siswa where siswa.nis='$nis'");
		return mysqli_affected_rows($conn);
	}

	function ubah($data){
		global $conn;

		$nis    = htmlspecialchars($data["nis"]);
		$nm     = htmlspecialchars($data["nama"]);
		$jk     = htmlspecialchars($data["gender"]);
		$ttl    = htmlspecialchars($data["tgl_lahir"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$telp   = htmlspecialchars($data["no_telepon"]);

		//query ubah
		$query="update siswa set nis='$nis', nama='$nm', gender='$jk', tgl_lahir='$ttl', alamat='$alamat', no_telepon='$telp' where nis='$nis'";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

	function cari($cari){
		$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nis LIKE '%$keyword%' OR no_telepon LIKE '%$keyword%'";
	}


	function registrasi($data){
		global $conn;
	
		$username = strtolower(stripcslashes($data["username"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);
		$email   = strtolower(stripcslashes($data["email"]));
	
		//cek leberadaan username
		$result = mysqli_query($conn, "select username from user where username = '$username'");
	
		if(mysqli_fetch_assoc($result)) {
			echo"<script>
					alert('Username sudah ada !');
				</script>";
				return false;
		}
	
		//cek leberadaan eemail
		$result = mysqli_query($conn, "select username from user where email = '$email'");
	
		if(mysqli_fetch_assoc($result)) {
			echo"<script>
					alert('Email sudah ada !');
				</script>";
				return false;
		}
	
		//konfirmasi
		if ($password !== $password2) {
			echo"<script>
				alert('Password Tidak Sama !');
			</script>";
			return false;
		} 
			
		//enkripsi
		$password = password_hash($password, PASSWORD_DEFAULT);
	
		//insert database
		mysqli_query($conn, "insert into user values('', '$username', '$password', '$email')");
		return mysqli_affected_rows($conn);
	}

?>

