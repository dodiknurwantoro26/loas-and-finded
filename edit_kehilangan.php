<?php
// masukan file koneksi database
include("connect.php");

// cek jika apakah form dikirimkan untuk update, lalu arahkan ke index setelah berhasil di update
if(isset($_POST['update']))
{
    $id = $_POST['id_org_hilang'];
    $id_member = $_POST['id_member'];
    $id_jns_kelamin = $_POST['id_jns_kelamin'];
    $nama_orang_hilang = $_POST['nama_orang_hilang'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $deskripsi_fisik = $_POST['deskripsi_fisik'];
    $tgl_ditemukan = $_POST['tgl_ditemukan'];
    $lokasi_org_ditemukan = $_POST['lokasi_org_ditemukan'];
    $status_orang = $_POST['status_orang'];
    $foto_orang = $_POST['foto_orang'];

    // update org_hilang data
    $query = "UPDATE org_hilang SET id_member='$id_member', id_jns_kelamin='$id_jns_kelamin', nama_orang_hilang='$nama_orang_hilang', tgl_lahir='$tgl_lahir', deskripsi_fisik='$deskripsi_fisik', tgl_ditemukan='$tgl_ditemukan', lokasi_org_ditemukan='$lokasi_org_ditemukan', status_orang='$status_orang', foto_orang='$foto_orang' WHERE id_org_hilang=$id";
    $hasil = mysqli_query($connection, $query);
    
    // lakukan redirect ke index untuk melihat hasil dari update data
    header("Location: index.php");
}

// GET id dari url
$id = $_GET['id'];

// Fetch org_hilang data berdasarkan id
$hasil = mysqli_query($connection, "SELECT * FROM org_hilang WHERE id_org_hilang=$id");

while($data = mysqli_fetch_array($hasil))
{
    $id_member = $data['id_member'];
    $id_jns_kelamin = $data['id_jns_kelamin'];
    $nama_orang_hilang = $data['nama_orang_hilang'];
    $tgl_lahir = $data['tgl_lahir'];
    $deskripsi_fisik = $data['deskripsi_fisik'];
    $tgl_ditemukan = $data['tgl_ditemukan'];
    $lokasi_org_ditemukan = $data['lokasi_org_ditemukan'];
    $status_orang = $data['status_orang'];
    $foto_orang = $data['foto_orang'];
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
            <input type="hidden" name="id_org_hilang" value="<?php echo $_GET['id']; ?>"/>
            
            <div>
                <label>ID Member:</label>
                <input type="text" name="id_member" value="<?php echo $id_member; ?>">
            </div>

            <div>
                <label>ID Jenis Kelamin:</label>
                <input type="text" name="id_jns_kelamin" value="<?php echo $id_jns_kelamin; ?>">
            </div>

            <div>
                <label>Nama Orang Hilang:</label>
                <input type="text" name="nama_orang_hilang" value="<?php echo $nama_orang_hilang; ?>">
            </div>

            <div>
                <label>Tanggal Lahir:</label>
                <input type="date" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>">
            </div>

            <div>
                <label>Deskripsi Fisik:</label>
                <input type="text" name="deskripsi_fisik" value="<?php echo $deskripsi_fisik; ?>">
            </div>

            <div>
                <label>Tanggal Ditemukan:</label>
                <input type="date" name="tgl_ditemukan" value="<?php echo $tgl_ditemukan; ?>">
            </div>

            <div>
                <label>Lokasi Orang Ditemukan:</label>
                <input type="text" name="lokasi_org_ditemukan" value="<?php echo $lokasi_org_ditemukan; ?>">
            </div>

            <div>
                <label>Status Orang:</label>
                <input type="text" name="status_orang" value="<?php echo $status_orang; ?>">
            </div>

            <div>
                <label>Foto Orang:</label>
                <input type="file" name="foto_orang" value="<?php echo $foto_orang; ?>">
            </div>

            <div>
                <input type="submit" name="update" value="Edit">
                <a href='index.php'>Cancel</a>
            </div>
        </form>
    </body>
</html>
