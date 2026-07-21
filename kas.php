<?php

include "koneksi.php";


// Kas Masuk

$masuk = mysqli_query($conn,

"SELECT SUM(kredit) AS total
FROM jurnal"

);


$m=mysqli_fetch_array($masuk);


$kas_masuk=$m['total'];




// Kas Keluar

$keluar = mysqli_query($conn,

"SELECT SUM(debit) AS total
FROM jurnal
WHERE keterangan!='Modal Awal'"

);


$k=mysqli_fetch_array($keluar);


$kas_keluar=$k['total'];




// Saldo Kas

$saldo_kas=$kas_masuk-$kas_keluar;


?>



<!DOCTYPE html>
<html>


<head>

<title>Laporan Arus Kas</title>


<style>


body{

font-family:Arial,sans-serif;
margin:30px;

}



h2,h3{

text-align:center;

}



.info{

text-align:center;
margin-bottom:20px;

}



table{

width:60%;
margin:auto;
border-collapse:collapse;

}



table,td,th{

border:1px solid black;

}



td,th{

padding:12px;

}



th{

background:#007bff;
color:white;

}



button{

padding:8px 15px;

}



@media print{


button,
a{

display:none;

}


body{

margin:0;

}


}



</style>


</head>



<body>




<h3>

TOKO CONTOH AKUNTANSI

</h3>



<h2>

LAPORAN ARUS KAS

</h2>



<div class="info">


Periode :

01 Juni 2026 - 30 Juni 2026


<br><br>


Tanggal Cetak :

<?=date('d-m-Y')?>


</div>




<center>


<button onclick="window.print()">

Cetak PDF

</button>


</center>



<br>




<table>



<tr>


<th colspan="2">

LAPORAN ARUS KAS

</th>


</tr>




<tr>


<td>

Kas Masuk

</td>


<td>

Rp <?=number_format($kas_masuk,0,',','.')?>

</td>


</tr>




<tr>


<td>

Kas Keluar

</td>


<td>

Rp <?=number_format($kas_keluar,0,',','.')?>

</td>


</tr>




<tr>


<th>

Saldo Kas Akhir

</th>


<th>

Rp <?=number_format($saldo_kas,0,',','.')?>

</th>


</tr>



</table>




<br>


<center>


<a href="index.php">

← Kembali

</a>


</center>



</body>


</html>