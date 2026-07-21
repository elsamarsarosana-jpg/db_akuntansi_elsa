<?php

include "koneksi.php";


// Menghitung Pendapatan
$pendapatan = mysqli_query($conn,

"SELECT SUM(kredit) AS total 
FROM jurnal"

);

$p=mysqli_fetch_array($pendapatan);

$total_pendapatan=$p['total'];



// Menghitung Beban
$beban = mysqli_query($conn,

"SELECT SUM(debit) AS total
FROM jurnal
WHERE keterangan != 'Modal Awal'"

);


$b=mysqli_fetch_array($beban);

$total_beban=$b['total'];



// Menghitung laba rugi

$laba=$total_pendapatan-$total_beban;



?>


<!DOCTYPE html>
<html>


<head>

<title>Laporan Laba Rugi</title>


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

LAPORAN LABA RUGI

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

PERHITUNGAN LABA RUGI

</th>

</tr>



<tr>


<td>

Pendapatan

</td>


<td>

Rp <?=number_format($total_pendapatan,0,',','.')?>

</td>


</tr>




<tr>


<td>

Beban

</td>


<td>

Rp <?=number_format($total_beban,0,',','.')?>

</td>


</tr>




<tr>


<th>

Laba / Rugi

</th>


<th>

Rp <?=number_format($laba,0,',','.')?>

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