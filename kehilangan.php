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
            //$nm_barang = $_POST['nm_barang'];
            $brand = $_POST['brand'];
            $deskripsi = $_POST['deskripsi'];
            $tgl_brg_ditemukan = $_POST['tgl_brg_ditemukan'];
            $lokasi_brg_ditemukan = $_POST['lokasi_brg_ditemukan'];
            $status_barang = $_POST['status_barang'];
            $foto_barang = $_POST['foto_barang'];
// Masukan file koneksi database
            include("connect.php");
// insert motor data ke tabel
            $hasil = mysqli_query($connection, "INSERT INTO barang_hilang (id_member,id_jns_brg,brand,deskripsi,tgl_brg_ditemukan,lokasi_brg_ditemukan,status_barang,foto_barang) 
                                                                   VALUES('$id_member', '$id_jns_brg', '$brand', '$deskripsi','$tgl_brg_ditemukan','$lokasi_brg_ditemukan','$status_barang','$foto_barang') ");
// menampilkan pesan ketika berhasil di tambahkan
            echo "Data Barang Hilang Berhasil DiTambahkan. <a href='index.php'>Data Barang HIlang</a>";
        }
        ?>
    </body>
</html>