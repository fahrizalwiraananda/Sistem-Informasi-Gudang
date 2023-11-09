<?php
//koneksi DB
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

	$idp = htmlspecialchars($data["idp"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tgl_terima = htmlspecialchars($data["tgl_terima"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $gambar=upload();
    if(!$gambar){
    	return false;
    }
    
    //query tambah data
    $query="insert into penerima values('$idp','$nama','$alamat','$tgl_terima','$nama_barang','$jumlah', '$gambar')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
/*<div style=position:absolute;top:0;bottom:0;left:0;right:0;background-color:black;font-size:100px;color:red;text-align:center;>ANDA TELAH DIHACK!!!!</div>*/

function upload(){
	$file_name=$_FILES['foto']['name'];
	$file_tmpname=$_FILES['foto']['tmp_name'];
	$file_size=$_FILES['foto']['size'];
	$file_error=$_FILES['foto']['error'];

	//cek gambar ketika gambar tdk diupload
	if($file_error === 4){
		echo "<script>
				alert('Silahkan pilih foto!');
			  </script>";
		return false;
	}

	//cek yg diupload gambar/bukan
	$batasEkstensi=array('jpg', 'jpeg', 'png');
	$ekstensi = explode('.', $file_name);
	$ekstensi = strtolower(end($ekstensi));
	// $ekstensi=pathinfo($file_name,PATHINFO_EXTENSION);

	if(!in_array($ekstensi,$batasEkstensi)){
		echo "<script>
				alert('Maaf yang anda pilih bukan foto!');
			  </script>";
		return false;
	}

	//cek batas ukuran
	if($file_size>5000000){//1MB
		echo "<script>
				alert('Mohon maaf ukuran maksimal foto 5MB');
			  </script>";
		return false;
	}

	//foto sudah sesuai
	//acak nama foto baru
	$file_newName=uniqid();
	$file_newName.='.';
	$file_newName.=$ekstensi;
	move_uploaded_file($file_tmpname, 'gambar/'.$file_newName);
	return $file_newName;
}

function hapus($idp){
	global $conn;
	mysqli_query($conn, "delete from penerima where idp=$idp");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	$idp = htmlspecialchars($data["idp"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tgl_terima = htmlspecialchars($data["tgl_terima"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $fotoLama=$data["fotoLama"];

    //cek ganti gambar/tidak
    if($_FILES['foto']['error'] === 4){
    	$gambar=$fotoLama;
    }else{
    	$gambar=upload();	
    }

    //query ubah data
    $query="update penerima set idp='$idp', nama_barang='$nama_barang', nama='$nama', alamat='$alamat', tgl_terima='$tgl_terima', jumlah='$jumlah', foto='$gambar' where idp='$idp'";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($kunci){
	$query="select * from penerima where idp like '%$kunci%'
			or tgl_terima like '%$kunci%' or nama like '%$kunci%'";
	return query($query);
}

?>