<?php
include "test4.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Welcome</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="id_brg_hilang">ID Barang Hilang:</label>
        <input type="number" name="id_brg_hilang" id="id_brg_hilang">
        <br><br>
        <label for="id_member">ID Member:</label>
        <input type="text" name="id_member" id="id_member">
        <br><br>
        <label for="id_jns_brg">ID Jenis Barang:</label>
        <input type="text" name="id_jns_brg" id="id_jns_brg">
        <br><br>
        <label for="brand">Brand:</label>
        <input type="text" name="brand" id="brand">
        <br><br>
        <label for="dekripsi">Deskripsi:</label>
        <input type="text" name="deskripsi" id="deskripsi">
        <br><br>
        <label for="tgl_brg_ditemukan">TGL Barang Ditemukan:</label>
        <input type="text" name="tgl_brg_ditemukan" id="tgl_brg_ditemukan">
        <br><br>
        <label for="lokasi_brg_ditemukan">Lokasi Barang Ditemukan:</label>
        <input type="text" name="lokasi_brg_ditemukan" id="lokasi_brg_ditemukan">
        <br><br>
        <label for="status_barang">Status Barang:</label>
        <input type="text" name="status_barang" id="status_barang">
        <br><br>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <br><br>
        <button type="submit" name="upload">Upload</button>
    </form>

    <form action="" method="post">
    <input type="text" name="keyword" size="50px" autofocus placeholder="cari..............">
        <button type="submit" name="cari">Cari</button>
    </form>

    <table border="1px" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Image</th>
        </tr>
        <?php $no_urut=1;?>
        <?php foreach ($view as $tampil):?>
            <tr>
                <td><?= $no_urut;?></td>
                <td><?= $tampil["id_brg_hilang"]?></td>
                <td><?= $tampil["id_member"]?></td>
                <td><?= $tampil["id_jns_brg"]?></td>
                <td><?= $tampil["brand"]?></td>
                <td><?= $tampil["deskripsi"]?></td>
                <td><?= $tampil["tgl_brg_ditemukan"]?></td>
                <td><?= $tampil["lokasi_brg_ditemukan"]?></td>
                <td><?= $tampil["status_barang"]?></td>
                <td><img style="height: 80px; width: 60px;" src="imgtmp/<?= $tampil["foto_barang"]?>"></td>
                <td> <a href="">Delete</a> | <a href="">Edit</a></td>
            </tr>
        <?php $no_urut++; ?>    
        <?php endforeach; ?>
    </table>
</body>
</html>

