<?php

include "koneksi.php";


// Ambil Modal Awal

$modal = mysqli_query($conn,

"SELECT SUM(debit) AS total
FROM jurnal
WHERE keterangan='Modal Awal'"

);


$m=mysqli_fetch_array($modal);


$modal_awal=$m['total'];




// Hitung Pendapatan

$pendapatan = mysqli_query($conn,

"SELECT SUM(kredit) AS total
FROM jurnal"

);


$p=mysqli_fetch_array($pendapatan);

$total_pendapatan=$p['total'];




// Hitung Beban

$beban = mysqli_query($conn,

"SELECT SUM(debit) AS total
FROM jurnal
WHERE keterangan!='Modal Awal'"

);


$b=mysqli_fetch_array($beban);

$total_beban=$b['total'];




// Laba/Rugi

$laba=$total_pendapatan-$total_beban;



// Modal Akhir

$modal_akhir=$modal_awal+$laba;


?>



<!DOCTYPE html>
<html>


<head>

<title>Laporan Perubahan Modal</title>


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

LAPORAN PERUBAHAN MODAL

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

PERUBAHAN MODAL

</th>


</tr>



<tr>


<td>

Modal Awal

</td>


<td>

Rp <?=number_format($modal_awal,0,',','.')?>

</td>


</tr>



<tr>


<td>

Laba / Rugi

</td>


<td>

Rp <?=number_format($laba,0,',','.')?>

</td>


</tr>



<tr>


<th>

Modal Akhir

</th>


<th>

Rp <?=number_format($modal_akhir,0,',','.')?>

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