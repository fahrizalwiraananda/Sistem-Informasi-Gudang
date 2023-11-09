<?php
require 'functions_penerima.php';

$idp=$_GET["idp"];

if(hapus($idp) > 0){
		echo "
			<script>
				alert('Data berhasil dihapus!');
				document.location.href='penerima.php';
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