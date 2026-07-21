<?php

include "koneksi.php";


$tanggal_awal = "";
$tanggal_akhir = "";


if(isset($_POST['cari'])){

    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];


    $query = mysqli_query($conn,

    "SELECT * FROM jurnal 
    WHERE tanggal BETWEEN '$tanggal_awal' 
    AND '$tanggal_akhir'
    ORDER BY tanggal ASC"

    );


}else{


    $query = mysqli_query($conn,

    "SELECT * FROM jurnal
    ORDER BY tanggal ASC"

    );


}


?>


<!DOCTYPE html>
<html>

<head>

<title>Laporan Jurnal Umum</title>


<style>

body{

    font-family: Arial, sans-serif;
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

    width:100%;
    border-collapse:collapse;

}


table,th,td{

    border:1px solid black;

}


th{

    background:#007bff;
    color:white;

}


th,td{

    padding:10px;
    text-align:center;

}


button{

    padding:8px 15px;
    cursor:pointer;

}


input{

    padding:7px;

}


.menu{

    margin-bottom:20px;

}



@media print{


button,
form,
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
LAPORAN JURNAL UMUM
</h2>


<div class="info">


Periode :

<?php


if($tanggal_awal!=""){


echo date('d-m-Y',strtotime($tanggal_awal))
." s/d ".
date('d-m-Y',strtotime($tanggal_akhir));


}else{


echo "01 Juni 2026 - 30 Juni 2026";


}


?>


<br><br>


Tanggal Cetak :

<?=date('d-m-Y')?>


</div>



<form method="POST">


Tanggal Awal :

<input type="date" name="tanggal_awal">


Tanggal Akhir :

<input type="date" name="tanggal_akhir">



<button name="cari">

Cari

</button>



<button type="button" onclick="window.print()">

Cetak PDF

</button>



</form>


<br>



<table>


<tr>

<th>No</th>

<th>Tanggal</th>

<th>Keterangan</th>

<th>Debit</th>

<th>Kredit</th>


</tr>



<?php


$no=1;

$total_debit=0;

$total_kredit=0;



while($data=mysqli_fetch_array($query)){



?>


<tr>


<td>

<?=$no++?>

</td>



<td>

<?=date('d-m-Y',strtotime($data['tanggal']))?>

</td>



<td>

<?=$data['keterangan']?>

</td>



<td>

Rp <?=number_format($data['debit'],0,',','.')?>

</td>



<td>

Rp <?=number_format($data['kredit'],0,',','.')?>

</td>



</tr>



<?php


$total_debit += $data['debit'];

$total_kredit += $data['kredit'];


}



?>



<tr>


<th colspan="3">

TOTAL

</th>



<th>

Rp <?=number_format($total_debit,0,',','.')?>

</th>



<th>

Rp <?=number_format($total_kredit,0,',','.')?>

</th>



</tr>



</table>


<br>


<a href="index.php">

← Kembali

</a>



</body>

</html>