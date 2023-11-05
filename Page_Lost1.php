<?php
//  set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs\lost_and_finded');
include('connect.php'); //agar index terhubung dengan database, maka connection sebagai penghubung harus di include
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--<link rel="icon" href="/favicon.ico" />-->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Desktop - 1</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inria+Serif%3A400"/>
  <link rel="stylesheet" href="./styles/desktop-1.css"/>
  <link rel="stylesheet" href="./style1.css"/>
</head>
<body>

<div class="desktop-1">

  <div class="bar-navigasi">
    <img class="lost-and-finded-logo" src="./assets/lost-and-finded-logo-1.png"/>
    <div class="search-nav">
      <div class="search-box">


        <div class="search-banner">
          
          <img class="group-1-zo2" src="./assets/search-icon.png"/>
        </div>
        <input type="text" style="height: 50px; width: 800px; font-size: 25px;" placeholder=" Temukan apa saja, contoh dompet, tas, dll.">
        
      </div>
      
      <p class="login-daftar"><a href="daftar-user.php"> login/daftar</p> </button>
        
      <div class= "tambah-barang"> 
        <img class="icon-tambah" src="./assets/plus.png"/>

        <p class="barang-hilang"><a href="form_crud.php?act=inper"> barang-hilang</p> </button>
      </div>

    </div>
  </div>

<!-- ========================================================================================================================== -->


            <p class="baru-baru-di-temukan"><a href="baru-ditemukan.php">Baru - baru di temukan</p>

              <div class="container">
                  <?php
                  $query = "SELECT * FROM barang_hilang ORDER BY id_brg_hilang ASC";
                  $result = mysqli_query($connection, $query);

                  if (!$result) {
                    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
                  }

                  while ($row = mysqli_fetch_assoc($result)) {
                    if (!empty($row['foto_barang'])) {
                      $gbr_barang = 'berkas/' . $row['foto_barang'];
                    } else {
                      $gbr_barang = 'berkas/default.jpg';
                    } 
                    ?>
                    <div class="data-item">
                      <div class="student-img">
                        <img src="<?php echo $gbr_barang; ?>" alt="" style="width:290px;height:350px"/>
                      </div>
                      <div class="student-dtl">
                        <a href="detail_barang.php?id_brg_hilang=<?php echo $row['id_brg_hilang']; ?>">
                        <h2><?php echo $row['brand']; ?></h2></a>
                        <p><?php echo $row['deskripsi']; ?></p>
                        <p><?php echo $row['tgl_brg_ditemukan']; ?></p>
                        <p><?php echo $row['lokasi_brg_ditemukan']; ?></p>
                        <p><?php echo $row['status_barang']; ?></p>
                      </div>
                    </div><br>
                    <?php
                  }
                  ?>
              </div>





  <div class="group1">

    <img class="rectangle-4-jT6" src="<?php echo $row["id_brg_hilang"] . $gbr_barang; ?>"/>
    <img class="rectangle-5-fbe" src="<?php echo $row["id_brg_hilang"] . $gbr_barang; ?>"/>
    <img class="rectangle-6-CrU" src="./assets/rectangle-6.png"/>
  </div>

  <div class="auto-group-pgac-jrQ">
    <div class="auto-group-vnty-rg8">
      <p class="jam-tangan-ditemukan-jam-tangan-di-jl-serdang-baru-warna-putih-masih-nyala-ac8">
      JAM TANGAN : Ditemukan jam tangan di Jl.
      <br/>
      serdang baru, warna putih, masih nyala.
      </p>
      <div class="rectangle-10-D9J">
      </div>
    </div>
    <div class="auto-group-cinc-8XA">
      <p class="tas-wanita-ditemkan-tas-wanita-warna-biru-donker-tas-selampang-di-jlpanca-raya-3u2">
      TAS WANITA : Ditemkan tas wanita warna 
      <br/>
      biru donker, tas selampang, di jl.panca raya..,
      </p>
      <div class="rectangle-11-6cQ">
      </div>
    </div>
    <div class="auto-group-75mr-qK6">
      <p class="tas-wanita-tas-cewe-gendong-warna-pink-ditemukan-di-jalan-raya-dekat-alfamart-Bdr">
      TAS WANITA : tas cewe gendong, warna pink,
      <br/>
      ditemukan di jalan raya dekat alfamart...
      </p>
      <div class="rectangle-12-zbJ">
      </div>
    </div>
  </div>
       ========================================================================================================================== -->

 <!-- <div class="group2">
    <img class="rectangle-7-SCQ" src="./assets/rectangle-7.png"/>
    <img class="rectangle-8-n1N" src="./assets/rectangle-8.png"/>
    <img class="rectangle-9-uLt" src="./assets/rectangle-9.png"/>
  </div>
  <div class="auto-group-sdsn-DMa">
    <div class="auto-group-zkfw-8zL">
      <p class="dompet-ditemukan-hitam-ada-ktp-dan-uang-nemu-di-jlpademangan-timur-dekat-fjN">
      DOMPET : Ditemukan hitam, ada ktp, dan 
      <br/>
      uang nemu di jl.pademangan timur, dekat...
      </p>
      <div class="rectangle-13-9uS">
      </div>
    </div>
    <div class="auto-group-vh6y-EAC">
      <p class="buku-buku-pelajaran-nemu-di-dekat-smpn-270-jakarta-ZyA">
      BUKU : Buku pelajaran, nemu di dekat smpn
      <br/>
      270 Jakarta.
      </p>
      <div class="rectangle-14-RkU">
      </div>
    </div>
    <div class="auto-group-vqdr-LcY">
      <p class="handphone-hp-jadul-nokia-ditemukan-di-dekat-indomart-sunter-pom-bensin-kontak-rqn">
      HANDPHONE : hp jadul nokia, ditemukan di  
      <br/>
      dekat indomart sunter pom bensin, kontak..
      </p>
      <div class="rectangle-15-KDa">
      </div>
    </div>
  </div>
 <!-- ========================================================================================================================== -->

</div>
</body>