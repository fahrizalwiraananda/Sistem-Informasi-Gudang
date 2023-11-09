<?php 
    include 'functions_sup.php';
      $data= query("select * from supplier");

    if(isset($_POST["cari"])){
      $data = cari($_POST["kunci"]);
    }

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Halaman Data Supplier</title>
        <link rel="shortcut icon" href="logo1.png">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<style type="text/css">
.table1{
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
    opacity: .9;
}

.table1 tr th{
    background: #35a9db;
    color: #fff;
    font-weight: normal; 
}

.table1, th, td{
    padding: 8px 20px;
    text-align: justify;
}

.table1 tr{
    background-color: #bdbdbd;
}

.table1 tr:hover{
    background-color: #f5f5f5;
}

.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}

h1{
      text-align: center;
   }
</style>
    </head>
    <body>
    <h1>Cetak Data Supplier</h1>
    <br>
<table style="width: 100%" class="table1" id="supp">
<thead>
  <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Nomor Telepon</th>
      <th>Alamat</th>
  </tr>
 </thead> 
 <tbody>
  <?php foreach ($data as $row) : ?>
  <tr>
     <td><?= $row["ids"]; ?></td>
     <td><?= $row["namasp"]; ?></td>
     <td><?= $row["no_telp"]; ?></td>
     <td><?= $row["alamat"]; ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
 </table>  
<script type="text/javascript"> 
    $(document).ready(function () {
        $('#supp').DataTable({
            dom: 'Bfrtip',
            buttons: [
        {
            extend :'pdf',
            orientation : 'portrait',
            pageSize : 'Legal',
            title : 'Data Supplier',
           //download : 'open'
        },
            
                        'copy', 'csv', 'excel', 'print'
                    ]
                })
            });
</script>
    </body>
</html>