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
        <h1>Tambahkan Barang Hilang</h1>
        <form method="POST" action="backend/proses_crud.php?act=inper" enctype="multipart/form-data">
            <div class="form-group">
                <label for="serial_number">Waktu Kehilangan</label>
                <input type="text" class="form-control" name="waktu_kehilangan" autofocus required />
            </div>
            <div class="form-group">
                <label for="part_number">Lokasi</label>
                <input type="text" class="form-control" name="lokasi" required />
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" name="kategori" required>
                    <option value=""></option>
                    <option> Kendaraan</option>
                    <option> Elektronik</option>
                    <option> Aksessoris</option>
                </select>
            </div>
            <div class="form-group">
                <label for="merek">Merek</label>
                <input type="text" class="form-control" name="merek" />
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" autocomplete></textarea>
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="gbrper">Foto</label>
                <input type="file" class="form-control" name="gbrper" required />
                <img src="gambar/80x80.png" id="preview" class="img-thumbnail">
            </div>
            <div class="form-group">
                <button onclick="goBack()" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-primary" type="submit">Save Change</button>
            </div>
        </form>
    </div>
</body>
</html>
