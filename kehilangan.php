<html>
<head>
    <title>Buat Laporan Kehilangan</title>
    <style>
        .input-container, .submit-container {
            width: 100%;
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .input-field {
            width: 100%;
            border: 2px solid black;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Laporan Kehilangan</h2>

    <form action="kehilangan.php" method="post" name="form1" enctype="multipart/form-data">
        <div class="input-container">
            <label>ID Orang Hilang:</label>
            <input type="text" class="input-field" name="id_org_hilang">
        </div>

        <div class="input-container">
            <label>ID Member:</label>
            <input type="text" class="input-field" name="id_member">
        </div>

        <div class="input-container">
    <label>Jenis Kelamin:</label>
    <select class="input-field" name="id_jns_kelamin">
    <option value="Pilih Jenis Kelamin Anda">Pilih Jenis Kelamin Anda</option>
        <option value="Laki-laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
</div>

        <div class="input-container">
            <label>Nama Orang Hilang:</label>
            <input type="text" class="input-field" name="nama_orang_hilang">
        </div>

        <div class="input-container">
            <label>Tanggal Lahir:</label>
            <input type="date" class="input-field" name="tgl_lahir">
        </div>

        <div class="input-container">
            <label>Deskripsi Fisik:</label>
            <input type="text" class="input-field" name="deskripsi_fisik">
        </div>

        <div class="input-container">
            <label>Tanggal Ditemukan:</label>
            <input type="date" class="input-field" name="tgl_ditemukan">
        </div>

        <div class="input-container">
            <label>Lokasi Orang Ditemukan:</label>
            <input type="text" class="input-field" name="lokasi_org_ditemukan">
        </div>

        <div class="input-container">
            <label>Status Orang:</label>
            <input type="text" class="input-field" name="status_orang">
        </div>

        <div class="input-container">
            <label>Foto Orang:</label>
            <input type="file" class="input-field" name="foto_orang">
        </div>

        <div class="submit-container">
            <input type="submit" name="Submit" style="background: blue; border-radius: 5px; padding: 5px; border: 2px solid blue; color: white;" value="Tambahkan">
            <a href='index.php' style="border: 2px solid red; padding: 5px; border-radius: 5px; color: white; background-color: red; text-decoration: none;">Cancel</a>
        </div>
    </form>

    <?php
    if(isset($_POST['Submit'])) {
        // Retrieve POST data
        $id_org_hilang = $_POST['id_org_hilang'];
        $id_member = $_POST['id_member'];
        $id_jns_kelamin = $_POST['id_jns_kelamin'];
        $nama_orang_hilang = $_POST['nama_orang_hilang'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $deskripsi_fisik = $_POST['deskripsi_fisik'];
        $tgl_ditemukan = $_POST['tgl_ditemukan'];
        $lokasi_org_ditemukan = $_POST['lokasi_org_ditemukan'];
        $status_orang = $_POST['status_orang'];
        $foto_orang = $_POST['foto_orang'];

        // Connect to database
        include("connect.php");

        // Insert data into database
        $hasil = mysqli_query($connection, "INSERT INTO org_hilang (id_org_hilang, id_member, id_jns_kelamin, nama_orang_hilang, tgl_lahir, deskripsi_fisik, tgl_ditemukan, lokasi_org_ditemukan, status_orang, foto_orang) VALUES('$id_org_hilang', '$id_member', '$id_jns_kelamin', '$nama_orang_hilang', '$tgl_lahir', '$deskripsi_fisik', '$tgl_ditemukan', '$lokasi_org_ditemukan', '$status_orang', '$foto_orang')");

        // Display success message
        echo "Data Orang Hilang Berhasil DiTambahkan. <a href='index.php'>Lihat Data Orang Hilang</a>";
    }
    ?>
</body>
</html>