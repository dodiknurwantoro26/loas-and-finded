<html>
    <head>
        <title>Buat Laporan Kehilangan</title>
    </head>
<body>
        <h2>
            Laporan Kehilangan
        </h2>
        <form action="kehilangan.php" method="post" name="form1">
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        ID Member :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="id_member">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Jenis Barang :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="id_jns_brg">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Brand :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="brand">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Deskripsi :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="deskripsi">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Tgl Hilang :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="tgl_brg_ditemukan">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Lokasi :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="lokasi_brg_ditemukan">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        status_barang :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="status_barang">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Foto Barang :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="foto_barang">
            </div>
            <div>
                <input type="submit" name="Submit" style="background: blue; border-radius: 5px; padding: 5px; border: 2px solid blue; color: white;" value="Tambahkan">
                <a href='index.php' style="border: 2px solid red; padding: 5px; border-radius: 5px; color: white; background-color: red; text-decoration: none;">Cancel</a>
            </div>
        </form>
        <?php
        // Chek apalah form sudah tersubmit, insert data dari tabel mtor
        if(isset($_POST['Submit']))
        {
            $id_member = $_POST['id_member'];
            $id_jns_brg = $_POST['id_jns_brg'];
            $brand = $_POST['brand'];
            $deskripsi = $_POST['deskripsi'];
            $tgl_brg_ditemukan = $_POST['tgl_brg_ditemukan'];
            $lokasi_brg_ditemukan = $_POST['lokasi_brg_ditemukan'];
            $status_barang = $_POST['status_barang'];
            $foto_barang = $_POST['foto_barang'];
// Masukan file koneksi database
            include("connect.php");
// insert motor data ke tabel
            $hasil = mysqli_query($connection, "INSERT INTO barang_hilang 
            (id_member,id_jns_brg,brand,deskripsi,tgl_brg_ditemukan,lokasi_brg_ditemukan,status_barang,foto_barang) 
            VALUES
            ('$id_member', '$id_jns_brg', '$brand', '$deskripsi','$tgl_brg_ditemukan','$lokasi_brg_ditemukan','$status_barang','$foto_barang') ");
            echo "Data Barang Hilang Berhasil DiTambahkan. <a href='index.php'>Data Barang HIlang</a>";
        }
        ?>


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
                include("connect.php");
                $hasil = mysqli_query($connection, "SELECT * FROM barang_hilang ORDER by id_brg_hilang DESC");
                while($barang_hilang = mysqli_fetch_array($hasil))
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
                    <a href='edit_kehilangan.php?id=$barang_hilang[id_brg_hilang]'>Edit</a> | <a href='delete_kehilangan.php?id=$barang_hilang[id_brg_hilang]'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </body>
</html>