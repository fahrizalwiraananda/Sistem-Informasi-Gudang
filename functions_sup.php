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

	$ids = htmlspecialchars($data["ids"]);
    $nm = htmlspecialchars($data["namasp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $telp = htmlspecialchars($data["no_telp"]);

    //query tambah data
    $query="insert into supplier values('$ids','$nm','$alamat','$telp')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
/*<div style=position:absolute;top:0;bottom:0;left:0;right:0;background-color:black;font-size:100px;color:red;text-align:center;>ANDA TELAH DIHACK!!!!</div>*/


function hapus($ids){
	global $conn;
	mysqli_query($conn, "delete from supplier where ids=$ids");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	$ids = htmlspecialchars($data["ids"]);
    $nm = htmlspecialchars($data["namasp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $telp = htmlspecialchars($data["no_telp"]);

    //query ubah data
    $query="update supplier set ids='$ids', namasp='$nm', alamat='$alamat', no_telp='$telp' where ids='$ids'";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($kunci){
	$query="select * from supplier where ids like '%$kunci%'
			or namasp like '%$kunci%' or alamat like '%$kunci%'";
	return query($query);
}

?>