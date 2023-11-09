<?php 
  session_start();

  include 'functions_penerima.php';
  $data= query("select * from penerima");

  if(isset($_POST["cari"])){
    $data = cari($_POST["kunci"]);
  }

?>

<html>
<head>
    <title>Cetak Data Penerima</title>
    <link rel="shortcut icon" href="logo1.png">
    <!--untuk menyambungkan ke datatables-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<!--link ke css boostrap yang ada pada datatables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<style>
   .table1 {
      font-family: sans-serif;
      color: #444;
      border-collapse: collapse;
      width: 50%;
      border: 1px solid #f2f5f7;
   }

   .table1 tr th{
      background: #35A9DB;
      color: #fff;
      font-weight: normal;
   }

   .table1, th, td {
      padding: 8px 20px;
      text-align: left;
   }

   .table1 tr:hover {
      background-color: #f5f5f5;
   }

   .table1 tr:nth-child(even) {
      background-color: #f2f2f2; 
   }
   table, h1{
      text-align: center;
   }
 </style>

</head>
<body>
<h1>Cetak Data Penerima</h1>
<br>
<table id="penerima" style="width: 100%" class="table1">
<thead>
  <tr>
     <th>ID Penerima</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Tanggal Terima</th>
      <th>Nama Barang</th>
      <th>Jumlah</th>
  </tr>
        </thead>
        <tbody>
             <?php foreach ($data as $row) : ?>
        <tr>
     <td><?= $row["idp"]; ?></td>
     <td><?= $row["nama"]; ?></td>
     <td><?= $row["alamat"]; ?></td>
     <td><?= $row["tgl_terima"]; ?></td>
     <td><?= $row["nama_barang"]; ?></td>
     <td><?= $row["jumlah"]; ?></td>
         </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    <script type="text/javascript"> 
    $(document).ready(function () {
        $('#penerima').DataTable({
            dom: 'Bfrtip',
            buttons: [
        {
            extend :'pdf',
            orientation : 'portrait',
            pageSize : 'Legal',
            title : 'Data Penerima',
           //download : 'open'
        },
            
                        'copy', 'csv', 'excel', 'print'
                    ]
                })
            });
</script>
</body>
</html>