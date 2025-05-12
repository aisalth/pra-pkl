<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "pastrycorner_db";

$koneksi = mysqli_connect($server, $user, $pass, $database);

// if($koneksi){
//     echo "berhasil";
//     exit;
// }