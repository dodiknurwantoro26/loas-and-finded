<?php
// buat koneksi database dengan connect file
include("connect.php");
// fetch semua data motor dari database
$hasil = mysqli_query($connection, "SELECT * FROM barang_hilang ORDER by id_brg_hilang DESC");
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
                Tambah Data Barang Hilang
            </a>
        </div>
        <table style="width: 100%;" border="1">
            <thead>
                <tr>
                    <th>id_member</th>
                    <th>id_jns_brg</th>
                    <th>brand</th>
                    <th>deskripsi</th>
                    <th>tgl_brg_ditemukan</th>
                    <th>lokasi_brg_ditemukan</th>
                    <th>status_barang</th>
                    <th>foto_barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($motor = mysqli_fetch_array($hasil))
                {
                    echo "<tr>";
                    echo "<td>".$barang_hilang['id_member']."</td>";
                    echo "<td>".$barang_hilang['id_jns_brg']."</td>";
                    echo "<td>".$barang_hilang['brand']."</td>";
                    echo "<td>".$barang_hilang['deskripsi']."</td>";
                    echo "<td>".$barang_hilang['tgl_brg_ditemukan']."</td>";
                    echo "<td>".$barang_hilang['lokasi_brg_ditemukan']."</td>";
                    echo "<td>".$barang_hilang['status_barang']."</td>";
                    echo "<td>".$barang_hilang['foto_barang']."</td>";
                    echo "<td>
                    <a href='edit.php?id=$barang_hilang[id_brg_hilang]'>Edit</a> | <a href='delete.php?id=$barang_hilang[id_brg_hilang]'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css"/>

    <title>WELCOME</title>
</head>
<body>
    

<div class="page1">
       <p class="apa-yang-kamu-butuhkan">APA YANG KAMU BUTUHKAN?</p>
    

    <div class="group1"> 
            <div class="gambar1" onclick="menemukan_barang()"></div>
            <div class="gambar2" onclick="kehilangan_barang()"> </div>
    </div>


    <div class="group2">
        
            <p class="menemukan-barang" onclick="menemukan_barang()">Saya Menemukan Barang</p>
            <p class="kehilangan-barang" onclick="kehilangan_barang()"> Saya Kehilangan Barang</p>
        
    </div>
    
</div>

<script src="script.js"></script>


</body>

</html>
*/

?> -->