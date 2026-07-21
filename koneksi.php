<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "akuntansi"
);


if(!$conn){

    die("Koneksi database gagal");

}

?>