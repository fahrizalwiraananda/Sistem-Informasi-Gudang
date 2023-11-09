<?php
require 'functions_sup.php';

$ids=$_GET["ids"];

if(hapus($ids) > 0){
    echo "
      <script>
        alert('Data berhasil dihapus!');
        document.location.href='supplier.php';
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