<?php
// Hubungkan ke database
include('backend/connect.php');
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs\lost_and_finded');

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
    </head>
    <body>
        <h1>Detail Barang</h1>
        <p>Nama: <?php echo $row['brand']; ?></p>
        <p>Deskripsi: <?php echo $row['deskripsi']; ?></p>
        <p>Tanggal Ditemukan: <?php echo $row['tgl_brg_ditemukan']; ?></p>
        <p>Lokasi Ditemukan: <?php echo $row['lokasi_brg_ditemukan']; ?></p>
        <p>Status: <?php echo $row['status_barang']; ?></p>

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
