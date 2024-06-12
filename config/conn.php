<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko-online";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die('Koneksi Gagal');
}
