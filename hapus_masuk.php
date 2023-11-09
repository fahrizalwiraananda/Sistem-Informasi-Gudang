<?php
require 'functions_masuk.php';

$idm=$_GET["idm"];

if(hapus($idm) > 0){
		echo "
			<script>
				alert('Data berhasil dihapus!');
				document.location.href='barangmasuk.php';
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