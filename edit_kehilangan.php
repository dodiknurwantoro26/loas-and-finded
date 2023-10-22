<?php
// masukan file koneksi database
include("connect.php");
// cek jika apakah form dikirimkan untuk update barang_hilang, lalu arahkan ke index setelah berhasil di update
if(isset($_POST['update']))
{
    $id_member = $_POST['id_member'];
    $id_jns_brg = $_POST['id_jns_brg'];
    $brand = $_POST['brand'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_brg_ditemukan = $_POST['tgl_brg_ditemukan'];
    $lokasi_brg_ditemukan = $_POST['lokasi_brg_ditemukan'];
    $status_barang = $_POST['status_barang'];
    $foto_barang = $_POST['foto_barang'];
// update barang_hilang data
    $hasil = mysqli_query($connection, "UPDATE barang_hilang SET id_member='$id_member', id_jns_brg='$id_jns_brg', brand='$brand', 
    deskripsi='$deskripsi', tgl_brg_ditemukan='$tgl_brg_ditemukan', lokasi_brg_ditemukan='$lokasi_brg_ditemukan', 
    status_barang='$status_barang', foto_barang='$foto_barang' WHERE id_brg_hilang=$id_brg_hilang");
    // lakukan redirect ke index untuk melihat hasil dari update data
    header("Location: index.php");
}
?>
<?php
// GET id dari url
$id = $_GET['id'];
// Fetch barang_hilang data berdasarkan id
$hasil = mysqli_query($connection, "SELECT * FROM
 barang_hilang WHERE id_brg_hilang=$id");
while($data = mysqli_fetch_array($hasil))
 {
    $id_member = ['id_member'];
    $id_jns_brg = ['id_jns_brg'];
    $brand = ['brand'];
    $deskripsi = ['deskripsi'];
    $tgl_brg_ditemukan = ['tgl_brg_ditemukan'];
    $lokasi_brg_ditemukan = ['lokasi_brg_ditemukan'];
    $status_barang = ['status_barang'];
    $foto_barang = ['foto_barang'];
 }
?>
<html>
    <head>
        <title>Edit</title>
    </head>
    <body>
        <h2>
            Edit Data Pengguna
        </h2>
        <form method="post" action="edit.php" name="formupload">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Nama :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="id_member" value="<?php echo $id_member; ?>">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Merk :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="merk" value="<?php echo $merk; ?>">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Plat :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="plat" value="<?php echo $plat; ?>">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Telp :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="telp" value="<?php echo $telp; ?>">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Email :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="email" value="<?php echo $email; ?>">
            </div>
            <div>
                <input type="submit" name="update" style="background: blue; border-radius: 5px; padding: 5px; border: 2px solid blue; color: white;" value="Edit">
                <a href='index.php' style="border: 2px solid red; padding: 5px; border-radius: 5px; color: white; background-color: red; text-decoration: none;">Cancel</a>
            </div>
        </form>
    </body>
</html>