<?php
// buat koneksi database dengan connect file
include("connect.php");
// fetch semua data motor dari database
$hasil = mysqli_query($connection, "SELECT * FROM orang_hilang ORDER by id_osrg_hilang DESC");
?>
<html>
    <head>
        <title>Lost and Finded</title>
    </head>
    <body>
        <div style="
        margin-top: 10px;
        margin-bottom: 10px;
        border: 2px solid black;
        width: 30%;
        text-align: center;
        color: black;
        padding: 5px;
        float: right;">
            <a href="kehilangan.php" style="text-decoration: none; color: black;">
                Tambah Data Orang Hilang
            </a>
        </div>
        <table style="width: 100%;" border="1">
            <thead>
                <tr>
                    <th>id_org_hilang</th>
                    <th>id_member</th>
                    <th>id_jns_kelamin</th>
                    <th>nama_orang_hilang</th>
                    <th>tgl_lahir</th>
                    <th>deskripsi_fisik</th>
                    <th>tgl_ditemukan</th>
                    <th>lokasi_org_ditemukan</th>
                    <th>status_orang</th>
                    <th>foto_orang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($barang_hilang = mysqli_fetch_array($hasil))
                {
                    echo "<tr>";
                    echo "<td>".$barang_hilang['id_org_hilang']."</td>";
                    echo "<td>".$barang_hilang['id_member']."</td>";
                    echo "<td>".$barang_hilang['id_jns_kelamin']."</td>";
                    echo "<td>".$barang_hilang['nama_orang_hilang']."</td>";
                    echo "<td>".$barang_hilang['tgl_lahir']."</td>";
                    echo "<td>".$barang_hilang['deskripsi_fisik']."</td>";
                    echo "<td>".$barang_hilang['tgl_ditemukan']."</td>";
                    echo "<td>".$barang_hilang['lokasi_org_ditemukan']."</td>";
                    echo "<td>".$barang_hilang['status_orang']."</td>";
                    echo "<td>".$barang_hilang['foto_orang']."</td>";
                    echo "<td>
                    <a href='edit_kehilangan.php?id=$barang_hilang[id_brg_hilang]'>Edit</a> | <a href='delete_kehilangan.php?id=$barang_hilang[id_brg_hilang]'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
