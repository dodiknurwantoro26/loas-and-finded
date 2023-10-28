
<?php   
//KONEKSI KE DATABASE
//$koneksi = mysqli_connect("47.88.62.202","admin1","rahasia","db_kehilangan");
///$koneksi = mysqli_connect("localhost","root","","db_test");
$koneksi = mysqli_connect("47.88.62.202","admin1","rahasia","db_kehilangan");
//TEST KONEKSI
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
  }
  echo "Connected successfully <br><br>";
 
//INPUT dan UPLOAD Gambar
if(isset($_POST["upload"])){
  if(inputan($_POST) > 0){
    //echo "data berhasil ditambahkan"; => gnt pakai java script ||document.location.href = 'index.php';
        echo "<script>
                alert('data berhasil diinput')
            </script>";    
        } else {
            //echo "data gagal ditambahkan";||document.location.href = 'index.php';
            echo "<script>
            alert('data tidak berhasil diinput')
          </script>";    
          }
        }
function inputan($data) {
          //stripslashes menghapus karakter backslashes dari string
        // mengubah semua huruf dalam sebuah string menjadi huruf kecil (lowercase)
        global $koneksi ;
        //$id_brg_hilang = htmlspecialchars($data["id_brg_hilang"]);
        $id_member = htmlspecialchars($data["id_member"]);
        $id_jns_brg = htmlspecialchars($data["id_jns_brg"]);
        $brand = htmlspecialchars($data["brand"]);
        $deskripsi = htmlspecialchars($data["deskripsi"]);
        $tgl_brg_ditemukan = htmlspecialchars($data["tgl_brg_ditemukan"]);
        $lokasi_brg_ditemukan = htmlspecialchars($data["lokasi_brg_ditemukan"]);
        $status_barang = htmlspecialchars($data["status_barang"]);
        $foto_barang = upload();
        if(!$foto_barang){
          return false;
      }
    //query insert data (masukan data ke database)
    $query = "INSERT INTO barang_hilang VALUES ('','$id_member', '$id_jns_brg', '$brand', '$deskripsi','$tgl_brg_ditemukan','$lokasi_brg_ditemukan','$status_barang','$foto_barang')";
    mysqli_query( $koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function upload(){
    $namafile = $_FILES["image"]["name"];
    $ukuranfile = $_FILES["image"]["size"];
    $error = $_FILES["image"]["error"];
    $tmpname = $_FILES["image"]["tmp_name"];
    //1. cek apakah tidak ada gambar yg diupload
  /*UPLOAD_ERR_NO_FILE (4): Tidak ada file yang diunggah */
  if ( $error === 4){
  echo "
  <script>
   alert('pilih gambar terlebih dahulu');
  </script>";
  return false; // ketika tampil upload gagal hentikan proses function.   
  }
  //2. cek apakah yg diupload adalah gambar
  $formatimagevalid = ['jpg','jpeg','png'];
  //explode untuk memisahkan sebuah string jadi array. memisahkan menggunakan delimiter =>explode('delimiter','string')
      $formatimage = explode('.', $namafile);//hasilnya sasuke1.jpg = ['sasuke1','jpg']
      //end($ekstensiGambar)=mengambil data paling akhir jika ketemu file "do.dik.jpg" .jpg berhasil di ambil
      //mengubah semua ekstensi menjadi huruf kecil pada data end($ekstensiGambar). Contoh DDK jadi ddk
      $formatimage = strtolower (end($formatimage));
     //cek apakah yg di opload ada di format ini ['jpg','jpeg','png']
      //in_array adakah data STRING di sebuah array
      //if( in_array(,)) mencari data $ekstensiGambar(yg diupload user) di dalam ['jpg','jpeg','png']
      //if( in_array($ekstensiGambar, $ekstensiGambarValid))= hasilnya true
      if( !in_array($formatimage, $formatimagevalid)){
          echo "<script>
          alert('yang anda upload format tidak sesuai');
          </script>";
          return false;
      }
    //3. cek jika ukurannya terlalu besar, hitungnnya menggunakan format byte.
    //batasnya adalah 5.000.000 byte, yang setara dengan 5 Megabyte (MB).
    if($ukuranfile > 5000000){
        echo"
        <script>
            alert('ukuran gambar terlalu besar');
        </script>
        ";
        return false;
    }
  // lolos 3 cek, gambar siap di upload
  //generate nama gambar baru
  //$namafilebaru = uniqid(); //membuat kode unik
  //$namafilebaru .= '.'; //data digabung dengan .= jadi $namaFilebaru.
  //$namafilebaru .= $formatimage; ////data digabung dengan .= jadi $namaFilebaru.$ekstensiGambar=>unik.jpgg
  $namafilebaru = uniqid() . "." . $formatimage;
  //$tmpName => file yg sudah di upload
  //'imgtmp/' => tujuan simpan
  //.$namaFile => nama file, nama yg di upload sma seperti yg di upload
  move_uploaded_file($tmpname, 'imgtmp/' . $namafilebaru);
  return $namafilebaru;
  }

//Menampilkan Data di Database
//Membuat tampungan hasil query
function query($query){
  global $koneksi;
  $result=mysqli_query($koneksi, $query);
  $save_query=[]; // wadah kosong untuk menampung hasil query
    while($querys=mysqli_fetch_assoc($result)){
      $save_query[]=$querys;//setiap query di simpan di $save_query
    }
    //var_dump($save_query);
  return $save_query;
}
  $view=query("SELECT * FROM barang_hilang");

//FITUR SEARCH
if(isset($_POST["cari"])){
  $view = cari($_POST["keyword"]); //function cari
}
function cari($keyword){
$query= "SELECT * FROM barang_hilang WHERE
  id_brg_hilang LIKE '%$keyword%' OR
  id_member LIKE '%$keyword%' OR
  id_jns_brg LIKE '%$keyword%' OR
  brand LIKE '%$keyword%' OR
  deskripsi LIKE '%$keyword%' OR
  tgl_brg_ditemukan LIKE '%$keyword%' OR
  lokasi_brg_ditemukan LIKE '%$keyword%' OR
  status_barang LIKE '%$keyword%' OR
  foto_barang LIKE '%$keyword%'
  ";
  return query($query); // masuk ke function query
}

?>