<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                        <a type="button" href="form_crud.php?act=inuser" class="btn btn-info">User Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contacts-area mg-b-15">
            <div class="container-fluid">
              <?php
                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                  $query = "SELECT * FROM tb_user LEFT JOIN area ON tb_user.area=area.id_area";
                  $result = mysqli_query($koneksi, $query);
                  //mengecek apakah ada error ketika menjalankan query
                  if(!$result){
                      die ("Query Error: ".mysqli_errno($koneksi).
                      " - ".mysqli_error($koneksi));
                  }
                  while($row = mysqli_fetch_assoc($result))
                  {
                    if($row['gbr_user']!=0){
                      $gbr_user='berkas/'.$row['gbr_user'];
                    } elseif($row['jenis']=='Laki-laki'){
                      $gbr_user='img/student/male.png';
                    } else {
                      $gbr_user='img/student/female.png';
                    }
              ?>
          
              <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                  <div class="student-inner-std res-mg-b-30">
                      <div class="student-img">
                          <img src="<?php echo $gbr_user; ?>" alt="" style="width:290px;height:350px"/>
                      </div>
                      <div class="student-dtl">
                  <?php if($row['id']==$_SESSION['id_user']){?> <a type="button" href="form_crud.php?act=edituser&iduser=<?php echo $row['id']; ?>"><h2><?php echo $row['nama']; ?></h2></a><?php } else {?><a type="button" href="form_crud.php?act=edituser&iduser=<?php echo $row['id']; ?>&view=readonly"><h2><?php echo $row['nama']; ?></h2></a><?php } ?>
                  
                      <p><?php echo $row['email']; ?></p>
                      <p><?php echo $row['telp']; ?></p>
                      <p><?php echo $row['nama_area']; ?></p>
                      <p><?php if($_SESSION['level']==1||$_SESSION['level']==3){?> <a type="button" href="form_crud.php?act=edituser&iduser=<?php echo $row['id']; ?>">edit</a><?php } ?></p>
                      </div>
                  </div><br>
              </div>
              <?php
              }
              ?>  
            </div>
        </div>