<?php
require 'functions_bk.php';

$idb=$_GET["idb"];

if(hapus($idb) > 0){
		echo "
			<script>
				alert('Data berhasil dihapus!');
				document.location.href='barang_keluar.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Data gagal dihapus!');
			</script>
		";
	}
?>