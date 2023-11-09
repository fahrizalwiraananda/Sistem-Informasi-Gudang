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

	$idb = htmlspecialchars($data["idb"]);
	$idp = htmlspecialchars($data["idp"]);
    $tgl = htmlspecialchars($data["tgl"]);
    $bk = htmlspecialchars($data["bk"]);
    $jml = htmlspecialchars($data["jml"]);
    $sisa = htmlspecialchars($data["sisa"]);
    $gambar=upload();
    if(!$gambar){
    	return false;
    }

    //query tambah data
    $query="insert into keluar values('$idb','$idp','$tgl','$bk','$jml','$sisa','$gambar')";

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

function hapus($idb){
	global $conn;
	mysqli_query($conn, "delete from keluar where idb=$idb");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	$idb = htmlspecialchars($data["idb"]);
	$idp = htmlspecialchars($data["idp"]);
    $tgl = htmlspecialchars($data["tgl"]);
    $bk = htmlspecialchars($data["bk"]);
    $jml = htmlspecialchars($data["jml"]);
    $sisa = htmlspecialchars($data["sisa"]);
	$fotoLama=$data["fotoLama"];

    //cek ganti gambar/tidak
    if($_FILES['foto']['error'] === 4){
    	$gambar=$fotoLama;
    }else{
    	$gambar=upload();	
    }
    
    //query ubah data
    $query="update keluar set idb='$idb', idp='$idp', tgl='$tgl', bk='$bk', jml='$jml', sisa='$sisa', foto='$gambar' where idb='$idb'";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($kunci){
	$query="select * from keluar where idb like '%$kunci%'
			or tgl like '%$kunci%' or bk like '%$kunci%' or jml like '%$kunci%' or sisa like '%$kunci%'";
	return query($query);
}

?>