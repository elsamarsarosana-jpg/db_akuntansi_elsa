<?php

include "koneksi.php";


$query = mysqli_query($conn,

"SELECT 
keterangan,
SUM(debit) AS debit,
SUM(kredit) AS kredit

FROM jurnal

GROUP BY keterangan

ORDER BY keterangan ASC"

);


?>


<!DOCTYPE html>
<html>

<head>

<title>Laporan Neraca Saldo</title>


<style>

body{

font-family:Arial, sans-serif;
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
LAPORAN NERACA SALDO
</h2>



<div class="info">


Periode :

01 Juni 2026 - 30 Juni 2026


<br><br>


Tanggal Cetak :

<?=date('d-m-Y')?>


</div>



<button onclick="window.print()">

Cetak PDF

</button>


<br><br>



<table>


<tr>


<th>
No
</th>


<th>
Nama Akun
</th>


<th>
Debit
</th>


<th>
Kredit
</th>


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


<th colspan="2">

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