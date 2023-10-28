<?php
  include('backend/connect.php'); 
  if(isset($_GET['act'])){
  $aksi=$_GET['act'];}else{$aksi="";}
  ?>
  <!DOCTYPE html>
<html>
<head>
    <title>Tambahkan Barang Hilang</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            height: 150px;
        }

        .img-thumbnail {
            max-width: 80px;
            max-height: 80px;
        }

        .form-group button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<?if($aksi=="inper")?>
    <div class="container">
        <h1>Laporan kehilangan</h1>
        <form method="POST" action="backend/proses_crud.php?act=inper" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_member">ID Member</label>
                <input type="text" class="form-control" name="id_member" autofocus required />
            </div>
            <!--div class="form-group">
                <label for="jns_brg">Jenis Barang</label>
                <select class="form-control" name="jns_brg" required>
                    <option value=""></option>
                    <option> Kendaraan</option>
                    <option> Elektronik</option>
                    <option> Aksessoris</option>
                </select>
            </div-->
            <div class="form-group">
                <label for="nm_barang">Nama Barang</label>
                <input type="text" class="form-control" name="nm_barang" required />
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" name="brand" />
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" autocomplete></textarea>
            </div>
            <div class="form-group">
                <label for="tgl_brg_ditemukan">Tgl Hilang</label>
                <textarea name="tgl_brg_ditemukan" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="lokasi_brg_ditemukan">Lokasi</label>
                <textarea name="lokasi_brg_ditemukan" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="status_barang">status_barang</label>
                <textarea name="status_barang" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="foto_barang">Foto Barang</label>
                <input type="file" class="form-control" name="foto_barang" required />
                <img src="gambar/80x80.png" id="preview" class="img-thumbnail">
            </div>
            <div class="form-group">
                <button onclick="goBack()" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-primary" type="submit" name="Submit">Save Change</button>
            </div>
        </form>
    </div>
</body>
</html>
<script>
        function goBack() {
            window.history.back();
        }
        function readURL(input){
            if (input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prev_foto').attr('src', e.target.result);           
            }
            reader.readAsDataURL(input.files[0]);
            }

        }
        $(document).ready(function(){
                $('#file_gambar').change(function(){
                    readURL(this);
                });
            });
    </script>