<?php
// masukan file koneksi database
include("connect.php");

// cek jika apakah form dikirimkan untuk update, lalu arahkan ke index setelah berhasil di update
if(isset($_POST['update']))
{
    $id = $_POST['id_brg_hilang'];
    $id_member = $_POST['id_member'];
    $id_jns_brg = $_POST['id_jns_brg'];
    $brand = $_POST['brand'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_brg_ditemukan = $_POST['tgl_brg_ditemukan'];
    $lokasi_brg_ditemukan = $_POST['lokasi_brg_ditemukan'];
    $status_barang = $_POST['status_barang'];
    $foto_barang = $_POST['foto_barang'];

    // update org_hilang data
    $query = "UPDATE barang_hilang SET 
                                id_brg_hilang='$id', 
                                id_member='$id_member', 
                                id_jns_brg='$id_jns_brg', 
                                brand='$brand', 
                                deskripsi='$deskripsi', 
                                tgl_brg_ditemukan='$tgl_brg_ditemukan', 
                                lokasi_brg_ditemukan='$lokasi_brg_ditemukan', 
                                status_barang='$status_barang',
                                foto_barang='$foto_barang' 
                                WHERE id_brg_hilang=$id";
    $hasil = mysqli_query($connection, $query);
    
    // lakukan redirect ke index untuk melihat hasil dari update data
    header("Location: kehilangan.php");
}

// GET id dari url
$id = $_GET['id'];

// Fetch org_hilang data berdasarkan id
$hasil = mysqli_query($connection, "SELECT * FROM barang_hilang WHERE id_brg_hilang=$id");
//$hasil_test = mysqli_fetch_array($hasil);
//var_dump($hasil_test);

while($data = mysqli_fetch_array($hasil))
{   
    $id_member = $data['id_member'];
    $id_jns_brg = $data['id_jns_brg'];
    $brand = $data['brand'];
    $deskripsi = $data['deskripsi'];
    $tgl_brg_ditemukan = $data['tgl_brg_ditemukan'];
    $lokasi_brg_ditemukan = $data['lokasi_brg_ditemukan'];
    $status_barang = $data['status_barang'];
    $foto_barang = $data['foto_barang'];

}
?>

<html>
    <head>
        <title>Edit</title>
    </head>
    <body>
        <h2>
            Edit Data Orang Hilang
        </h2>
        <form method="post" action="edit_kehilangan.php" name="formupdate">
            <input type="hidden" name="id_brg_hilang" value="<?php echo $_GET['id']; ?>"/>
            
            <div>
                <label>ID Member:</label>
                <input type="text" name="id_member" value="<?php echo $id_member; ?>">
            </div>

            <div>
                <label>ID Jenis Barang:</label>
                <input type="text" name="id_jns_brg" value="<?php echo $id_jns_brg; ?>">
            </div>

            <div>
                <label>Brand:</label>
                <input type="text" name="brand" value="<?php echo $brand; ?>">
            </div>

            <div>
                <label>Deskripsi:</label>
                <input type="text" name="deskripsi" value="<?php echo $deskripsi; ?>">
            </div>

            <div>
                <label>Tanggal Barang Ditemukan:</label>
                <input type="date" name="tgl_brg_ditemukan" value="<?php echo $tgl_brg_ditemukan; ?>">
            </div>

            <div>
                <label>Lokasi Barang Ditemukan:</label>
                <input type="text" name="lokasi_brg_ditemukan" value="<?php echo $lokasi_brg_ditemukan; ?>">
            </div>

            <div>
                <label>Status Barang:</label>
                <input type="text" name="status_barang" value="<?php echo $status_barang; ?>">
            </div>

            <div>
                <label>Foto Barang:</label>
                <input type="file" name="foto_barang" value="<?php echo $foto_barang; ?>">
            </div>

            <div>
                <input type="submit" name="update" value="Edit">
                <a href='index.php'>Cancel</a>
            </div>
        </form>
    </body>
</html>
