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
    <div class="container">
        <h1>Daftar User</h1>
        <!--form action="backend/proses_crud.php?act=inuser" method="post" enctype="multipart/form-data"-->
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input name="nama" type="text" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label for="telp">No Telepon</label>
                <input name="telp" type="text" placeholder="No Telepon" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Kelamin</label>
                <select name="jenis" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="text" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="file">Upload Gambar</label>
                <input name="file" id="file_gambar" type="file" accept="image/*" required>
                <img class="img-thumbnail" src="" alt="" id="prev_foto" width="70">
            </div>
            <div class="form-group">
                <button type="button" onclick="goBack()">Cancel</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
