<?php
// Hubungkan ke database
include('connect.php');

// Periksa koneksi database

// Periksa apakah parameter "id" ada dalam URL
if (isset($_GET['id_brg_hilang'])) {
    $id = $_GET['id_brg_hilang'];

    // Query untuk mengambil detail barang berdasarkan "id"
    $query = "SELECT * FROM barang_hilang WHERE id_brg_hilang = $id ORDER BY id_brg_hilang ASC";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($connection));
        
    }

    // Ambil data barang
    $row = mysqli_fetch_assoc($result);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Detail Barang</title>
        <link rel="stylesheet" href="./style1.css"/>
        <link rel="stylesheet" href="./styles/desktop-1.css"/>
    </head>
    <div class="desktop-1">
        <div class="bar-navigasi">
        <img class="lost-and-finded-logo" src="./assets/lost-and-finded-logo-1.png"/>
        </div>
    </div>
    <body>
        <h1>Detail Barang</h1>
        <div class="container-form">
        <div class="detil-barang">
        <div class="form-group">
                <label for="foto_barang">Foto Barang</label>
                <img src="<?php echo 'berkas/' . $row['foto_barang'];?> "alt="" style="width:290px;height:350px"/>
            </div>
        <div class="form-group">
                <label for="nm_barang">Nama Barang</label>
                <input type="text" class="form-control" value="<?php echo $row['brand'];?>" name="nm_barang" readonly />
            </div>
        <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" value="<?php echo $row['deskripsi']; ?>" name="deskripsi" readonly />
            </div>
        <div class="form-group">
                <label for="tgl_brg_ditemukan">Tanggal Ditemukan</label>
                <input type="text" class="form-control" value="<?php echo $row['tgl_brg_ditemukan']; ?>" name="tgl_brg_ditemukan" readonly />
            </div>
        <p>Lokasi Ditemukan : <?php echo $row['lokasi_brg_ditemukan']; ?></p>
        <p>Status : <?php echo $row['status_barang']; ?></p>
        </div>
        </div>

        <!-- Tambahkan tautan atau elemen lain sesuai kebutuhan Anda -->

    </body>
    </html>
    <?php
} else {
    echo "Parameter 'id' tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($connection);
?>
