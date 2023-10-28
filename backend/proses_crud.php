<?php
// memanggil file koneksi.php untuk melakukan koneksi database
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs\lost_and_finded');
include('backend/connect.php');
session_start();

$aksi=$_GET['act'];

if($aksi=="inuser"){ 
    // membuat variabel untuk menampung data dari form
    $nama   = $_POST['nama'];
    $email     = $_POST['email'];
    $telp    = $_POST['telp'];
    $jenis    = $_POST['jenis'];
    $area     = $_POST['area'];
    $level     = $_POST['level'];
    $username    = $_POST['username'];
    $password = md5($_POST['password']) ;

    $ekstensi_diperbolehkan	= array('png','jpg');
    $foto_barang = $_FILES['file']['name'];
    $x = explode('.', $foto_barang);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto_barang; //menggabungkan angka acak dengan nama file sebenarnya

    if($foto_barang!=""){
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){			
            move_uploaded_file($file_tmp, 'C:\xampp\htdocs\newcmt\berkas/'.$nama_gambar_baru);
            $rst = "INSERT INTO tb_user (nama,email,telp,jenis,area,level,username,password,gbr_user) VALUE ('$nama','$email','$telp','$jenis','$area','$level','$username','$password','$nama_gambar_baru')"; 
            $result_rst = mysqli_query($koneksi, $rst);
            if($result_rst){
                echo 'FILE BERHASIL DI UPLOAD';
                echo "<script>alert('Data berhasil ditambah.');javascript:window.history.go(-1);</script>";
            }else{
                echo 'GAGAL MENGUPLOAD GAMBAR';
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
    }
    else{
        $rst = "INSERT INTO tb_user (nama,email,telp,jenis,area,level,username,password) VALUE ('$nama','$email','$telp','$jenis','$area','$level','$username','$password')"; 
        $result_rst = mysqli_query($koneksi, $rst); 
        echo "<script>alert('Data berhasil ditambah.');javascript:window.history.go(-1);</script>";
    } }
elseif($aksi=="edituser"){ 
    // membuat variabel untuk menampung data dari form
    $iduser   = $_POST['iduser'];
    $nama   = $_POST['nama'];
    $email     = $_POST['email'];
    $telp    = $_POST['telp'];
    $jenis    = $_POST['jenis'];
    $area     = $_POST['area'];
    $level     = $_POST['level'];
    $username    = $_POST['username'];
    $password = md5($_POST['password']) ;
    if($_POST['password']!=""){ $res=",password='$password'"; }else{ $res=""; }

    $ekstensi_diperbolehkan	= array('png','jpg');
    $foto_barang = $_FILES['file']['name'];
    $x = explode('.', $foto_barang);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto_barang; //menggabungkan angka acak dengan nama file sebenarnya

    if($foto_barang!=""){
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 5044070){			
            move_uploaded_file($file_tmp, 'C:\xampp\htdocs\newcmt\berkas/'.$nama_gambar_baru);
            $rst = "INSERT INTO tb_user (nama,email,telp,jenis,area,level,username,gbr_user) VALUE ('$nama','$email','$telp','$jenis','$area','$level','$username','$password','$nama_gambar_baru')"; 
            $result_rst = mysqli_query($koneksi, $rst);
            if($result_rst){
                echo 'FILE BERHASIL DI UPLOAD';
                echo "<script>alert('Data berhasil ditambah.');javascript:window.history.go(-1);</script>";
            }else{
                echo 'GAGAL MENGUPLOAD GAMBAR';
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
    }
    else{
        $rst = "UPDATE tb_user SET nama='$nama',email='$email',telp='$telp',jenis='$jenis',area='$area',level='$level' $res,username='$username' WHERE id='$iduser'"; 
        $result_rst = mysqli_query($koneksi, $rst); 
        if(!$result_rst){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
        } else {
        echo "<script>alert('Data berhasil diubah.');javascript:window.history.go(-1);</script>";
        }
    } }
    elseif ($aksi == "inper") {
        $id_member = $_POST['id_member'];
        $nm_barang = $_POST['nm_barang'];
        $brand = $_POST['brand'];
        $deskripsi = $_POST['deskripsi'];
        $tgl_brg_ditemukan = $_POST['tgl_brg_ditemukan'];
        $lokasi_brg_ditemukan = $_POST['lokasi_brg_ditemukan'];
        $status_barang = $_POST['status_barang'];
    
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $foto_barang = $_FILES['foto_barang']['name'];
        $x = explode('.', $foto_barang);
        $ekstensi = strtolower(end($x));
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $foto_barang;
    
        if ($foto_barang != "") {
            if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
                move_uploaded_file($_FILES['foto_barang']['tmp_name'], 'C:\xampp\htdocs\lost_and_finded\berkas/' . $nama_gambar_baru);
                $query = "INSERT INTO barang_hilang (id_member, brand, deskripsi, tgl_brg_ditemukan, lokasi_brg_ditemukan, status_barang, foto_barang)
                          VALUES('$id_member', '$brand', '$deskripsi', '$tgl_brg_ditemukan', '$lokasi_brg_ditemukan', '$status_barang', '$nama_gambar_baru') ";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    echo 'FILE BERHASIL DI UPLOAD';
                    echo "<script>alert('Data berhasil ditambah.');javascript:window.history.go(-1);</script>";
                } else {
                    echo 'GAGAL MENGUPLOAD GAMBAR';
                }
            } else {
                echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            }
        } else {
            $query = "INSERT INTO barang_hilang (id_member, brand, deskripsi, tgl_brg_ditemukan, lokasi_brg_ditemukan, status_barang, foto_barang)
                      VALUES('$id_member', '$brand', '$deskripsi', '$tgl_brg_ditemukan', '$lokasi_brg_ditemukan', '$status_barang', '') ";
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo "<script>alert('Data berhasil ditambah.');javascript:window.history.go(-1);</script>";
            } else {
                echo 'GAGAL MENYIMPAN DATA';
            }
        }
    }
    