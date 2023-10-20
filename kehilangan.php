<html>
    <head>
        <title>Buat Laporan Kehilangan</title>
    </head>
<body>
        <h2>
            Laporan Kehilangan
        </h2>
        <form action="tambahdata.php" method="post" name="form1">
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
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="jns_brg">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Nama Barang :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="nm_barang">
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
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="email">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Tgl Hilang :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="tgl_hilang">
            </div>
            <div style="width: 100%; display: block; margin-top: 10px; margin-bottom: 10px;">
                <div style="margin-bottom: 5px;">
                    <label>
                        Lokasi :
                    </label>
                </div>
                <input type="text" style="width: 100%; border: 2px solid black; border-radius: 5px;" name="lokasi_hilang">
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
            $nama = $_POST['nama'];
            $merk = $_POST['merk'];
            $plat = $_POST['plat'];
            $telp = $_POST['telp'];
            $email = $_POST['email'];
// Masukan file koneksi database
            include("connect.php");
// insert motor data ke tabel
            $hasil = mysqli_query($connection, "INSERT INTO motor (nama,merk,plat,telp,email) VALUES('$nama', '$merk', '$plat', '$telp', '$email') ");
// menampilkan pesan ketika berhasil di tambahkan
            echo "Data Motor Berhasil DiTambahkan. <a href='index.php'>Data Motor</a>";
        }
        ?>
    </body>
</html>