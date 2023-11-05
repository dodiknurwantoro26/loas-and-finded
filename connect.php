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
echo"berhasil";


$table="SHOW TABLES";
$select="SELECT * FROM tb_user";

$view = mysqli_query($connection, $select );
$view_ok = mysqli_fetch_assoc($view);
var_dump($view_ok);
while($test=mysqli_fetch_row($view)){
    $save[]=$test;
    var_dump($save);  
};
*/

?>