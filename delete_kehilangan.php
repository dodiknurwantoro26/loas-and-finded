<?php
// masukan file database koneksi
include("connect.php");
// Ambil id dari url untuk mendelet data barang hilang
$id = $_GET['id'];
// Delete baris barang hilang dari table berdasarkan id
$hasil = mysqli_query($connection, "DELETE FROM barang_hilang WHERE id_brg_hilang=$id");
// Setelah menghapus redirect kembali ke index untuk melihat hasilnya
echo "<script>alert('Data berhasil dihapus');window.location='index.php'</script>";
header("Location:index.php");
?>