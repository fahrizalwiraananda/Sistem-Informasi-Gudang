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

	$idm = htmlspecialchars($data["idm"]);
    $tgl_masuk = htmlspecialchars($data["tgl_masuk"]);
    $supplier = htmlspecialchars($data["supplier"]);
    $barang = htmlspecialchars($data["barang"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $total = htmlspecialchars($data["total"]);

    //query tambah data
    $query="insert into masuk values('$idm','$tgl_masuk','$supplier','$barang','$jumlah','$total')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
/*<div style=position:absolute;top:0;bottom:0;left:0;right:0;background-color:black;font-size:100px;color:red;text-align:center;>ANDA TELAH DIHACK!!!!</div>*/



function hapus($idm){
	global $conn;
	mysqli_query($conn, "delete from masuk where idm=$idm");
	return mysqli_affected_rows($conn);
}



function ubah($data){
	global $conn;

	$idm = htmlspecialchars($data["idm"]);
	$barang = htmlspecialchars($data["barang"]);
	$supplier = htmlspecialchars($data["supplier"]);
    $tgl_masuk = htmlspecialchars($data["tgl_masuk"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $total = htmlspecialchars($data["total"]);

    //query ubah data
    $query="update masuk set idm='$idm', barang='$barang', supplier='$supplier', tgl_masuk='$tgl_masuk', tgl_masuk='$tgl_masuk', jumlah='$jumlah', total='$total' where idm='$idm'";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


function cari($kunci){
	$query="select * from masuk where idm like '%$kunci%'
			or tgl_masuk like '%$kunci%' or supplier like '%$kunci%'";
	return query($query);
}

?>