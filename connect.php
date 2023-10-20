<?php
/**
 * file connect ini berisi tentang pengaturan database
 * mysqli_connect ini digunakan untuk membuat koneksi
 */
$host = "47.88.62.202";
$user = "admin1";
$password = "rahasia";
$database = "db_kehilangan";
$connection = mysqli_connect($host,$user,$password,$database);
/**
 * tambahkan fungsi ini untuk mengecek kesalahan pada koneksi
 */
if($connection->connect_error)
{
    die("Koneksi Gagal");
}
echo"berhasil"
?>